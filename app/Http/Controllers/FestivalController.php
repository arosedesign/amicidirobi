<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FestivalController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {

            $ruoloUtente= new RuoloController();
            $ruolo = $ruoloUtente->control();

            if ($ruolo === 'admin' || $ruolo === 'festival') {

                $update = $request->get('update');

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

                $errore = $request->get('errore');

                return view('admin.festival')->with([
                    'data' => $data,
                    'errore' => $errore,
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
        $data = array();
        $data['immagine'] = $request->immagine;
        $data['nome'] = 'tanta-robba-free-music-festival_' . $campo;

        $uploadImage= new UploadController();
        $image = $uploadImage->store($data);

        if ($image['upload'] === true) {

            $checkriga = DB::table('festival')
                ->select()
                ->where('campo', $campo)
                ->first();

            if (!(empty($checkriga))){

                DB::table('festival')
                    ->where('campo', $campo)
                    ->update([
                        'valore' => $image['foto']
                    ]);
            } else {
                DB::table('festival')->insert(
                    [
                        'campo' => $campo,
                        'valore' => $image['foto'],
                        'tipo' => 'immagine'
                    ]
                );
            }

            return redirect('/festival?update=true');

        } else {
            $errore = urlencode($image['errore']);
            return redirect('/festival?update=error&errore='.$errore);
        }

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
            return redirect('/festival?update=false');
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
            return redirect('/festival?update=false');
        }
    }
}
