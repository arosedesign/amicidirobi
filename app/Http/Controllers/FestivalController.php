<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class FestivalController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {

            $ruoloUtente= new RuoloController();
            $ruolo = $ruoloUtente->control();

            if ($ruolo === 'admin' || $ruolo === 'festival') {

                $update = $request->get('update');
                $esito = $request->session()->pull('esito');

                $campi = DB::table('festival')->pluck('festival.campo');

                $data = array();
                foreach ($campi as $key => $campo) {

                    $data[$campo]['campo'] = $campo;
                    $query = DB::table('festival')
                        ->select()
                        ->where('campo', $campo)
                        ->first();

                    $data[$campo]['valore'] = $query->valore;
                    $data[$campo]['tipo'] = $query->tipo;
                    $data[$campo]['id'] = $query->id;


                }

                $querygallery = DB::table('festival_yearsago')
                    ->select()
                    ->where('tipo', 'imgallery')
                    ->where('colonna', 'homepage')
                    ->get();

                $hpgallery = array();
                foreach ($querygallery as $key => $imgallery) {
                    $hpgallery[$key]['id'] = $imgallery->id;
                    $hpgallery[$key]['valore'] = $imgallery->valore;
                }

                $errore = $request->get('errore');

                return view('admin.festival')->with([
                    'data' => $data,
                    'errore' => $errore,
                    'esito' => $esito,
                    'gallery' => $hpgallery,
                    'update' => $update
                ]);
            } else {
                return redirect('/');
            }

        } else {
            return redirect('/');
        }

    }

    public function UpdateImg(Request $request)
    {
        $campo = $request->get('nome');

        $files = Input::file('immagine');
        $data = array();

        if (!empty($files)) {

            foreach($files as $element => $file) {

                $data[$element]['immagine'] = $file;
                $data[$element]['nome'] = 'tanta-robba-free-music-festival_' . $campo;;

            }

            $uploadImage= new UploadController();
            $image = $uploadImage->store($data);

        } else {
            $errore = urlencode('Non è stato selezionato nessun file');
            return redirect('/festival?update=error&errore='.$errore);
        }

        var_dump($image['image'][0]);

        if ($image['image'][0]['upload'] === true) {

            $checkriga = DB::table('festival')
                ->select()
                ->where('campo', $campo)
                ->first();

            if (!(empty($checkriga))){

                DB::table('festival')
                    ->where('campo', $campo)
                    ->update([
                        'valore' => $image['image'][0]['nome']
                    ]);
            } else {
                DB::table('festival')->insert(
                    [
                        'campo' => $campo,
                        'valore' => $image['image'][0]['nome'],
                        'tipo' => 'immagine'
                    ]
                );
            }

            return redirect('/festival?update=true');

        } else {
            $errore = urlencode($image['image'][0]['errore']);
            return redirect('/festival?update=error&errore='.$errore);
        }

    }

    public function UpdateGallery(Request $request)
    {
        $titolo = $request->get('nome');
        $colonna = strtolower(preg_replace('/\s*/', '', $titolo));

        $files = Input::file('immagine');
        $data = array();

        if (!empty($files)) {

            foreach($files as $element => $file) {

                $data[$element]['immagine'] = $file;
                $data[$element]['nome'] = 'tanta-robba-free-music-festival_' . $colonna;

            }

            $uploadImage= new UploadController();
            $image = $uploadImage->store($data);


        } else {
            $errore = urlencode('Non è stato selezionato nessun file');
            return redirect('/festival?update=error&errore='.$errore);
        }

        $results = array();

        $successi = 0;

        foreach ($image['image'] as $key => $img) {

            if ($img['upload'] === true) {

                $successi = $successi + 1;

                DB::table('festival_yearsago')->insert(
                    [
                        'colonna' => $colonna,
                        'titolo' => $titolo,
                        'tipo' => 'imgallery',
                        'valore' => $img['nome']
                    ]
                );

                $results['img'][$key]['upload'] = true;
                $results['img'][$key]['nome'] = $img['nome'];
                $results['img'][$key]['errore'] = '';

            } else {
                $results['img'][$key]['upload'] = false;
                $results['img'][$key]['nome'] = $img['nome'];
                $results['img'][$key]['errore'] = $img['errore'];
            }

        }

        $results['successi'] = $successi;

        $request->session()->put('esito', $results);

        return redirect('/festival');
    }

    public function PulisciValore(Request $request)
    {
        $id = $request->get('numero');

        if (!empty($id) ) {

        DB::table('festival')
            ->where('id', $id)
            ->update([
                'valore' => null
            ]);

        return redirect('/festival?update=true');

        } else {
            $errore = urlencode('Attenzione! Non è stato possibile effettuare la modifica');
            return redirect('/festival?update=error&errore='.$errore);
        }
    }

    public function UpdateTesto(Request $request)
    {
        $campo = $request->get('nome');
        $testo = $request->get('testo');

        if (!empty($campo) && !empty($testo) ) {



            DB::table('festival')
                ->where('campo', $campo)
                ->update([
                    'valore' => $testo
                ]);

            return redirect('/festival?update=true');

        } else {
            $errore = urlencode('Attenzione! Non è stato possibile effettuare la modifica');
            return redirect('/festival?update=error&errore='.$errore);
        }
    }
}
