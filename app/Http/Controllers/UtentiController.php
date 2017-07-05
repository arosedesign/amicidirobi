<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UtentiController extends Controller
{
    public function index(Request $request)
    {

        if (Auth::check()) {

            $ruoloUtente= new RuoloController();
            $ruolo = $ruoloUtente->control();

            if ($ruolo === 'admin') {

                $tableutenti = DB::table('users')->get();

                $data = array();

                $update = $request->get('update');

                foreach ($tableutenti as $key => $utente) {
                    $data[$key]['nome'] = $utente->name;
                    $data[$key]['email'] =  $utente->email;
                    $data[$key]['ruolo'] = $utente->ruolo;
                    $data[$key]['id'] = $utente->id;
                }

                $nuovo_ruolo = $request->get('ruolo');
                $id = $request->get('userid');

                if(!empty($id) && !empty($nuovo_ruolo)) {

                    DB::table('users')
                        ->where('id', $id)
                        ->update(['ruolo' => $nuovo_ruolo]);

                    $selectruolo = DB::table('users')
                        ->select()
                        ->where('id', $id)
                        ->first();

                    $checkruolo = $selectruolo->ruolo;

                    if ($nuovo_ruolo === $checkruolo) {
                        return redirect('/utenti?update=true');
                    } else {
                        return redirect('/utenti');
                    }

                }

                return view('admin.utenti')->with([
                    'data' => $data,
                    'update' => $update
                ]);

            }


            else {
                return redirect('/');
            }

        } else {
            return redirect('/');
        }


    }

    public function profilo(Request $request)
    {

        if (Auth::check()) {

            $id = Auth::id();

            $utente = DB::table('users')
                ->select()
                ->where('id', $id)
                ->first();

            $info = array();
            $info['nome'] = $utente->name;
            $info['email'] =  $utente->email;
            $info['password'] =  $utente->password;
            $info['id'] = $id;

            $errore = $request->get('errore');
            $nome = $request->get('nome');
            $email = $request->get('email');
            $newpass = $request->get('newpass');
            $confermapass = $request->get('confermapass');
            $oldpass = $request->get('oldpass');

            if(!empty($oldpass) ) {

                if (Hash::check($oldpass, $info['password'])) {

                    if(!empty($nome) ) {
                        DB::table('users')
                            ->where('id', $id)
                            ->update(['name' => $nome]);
                    }

                    if(!empty($email) ) {
                        DB::table('users')
                            ->where('id', $id)
                            ->update(['email' => $email]);
                    }

                    if(!empty($newpass) && !empty($confermapass) ) {

                        if($newpass === $confermapass) {
                            $hashedpass = Hash::make($newpass);

                            DB::table('users')
                                ->where('id', $id)
                                ->update(['password' => $hashedpass]);

                        } else {
                            return redirect('/profilo?errore=noncoincidono');
                        }

                    }

                    return redirect('/profilo?errore=false');

                } else {
                    return redirect('/profilo?errore=errata');
                }

            }

            return view('admin.profilo')->with([
                'info' => $info,
                'errore' => $errore
            ]);


        } else {
            return redirect('/');
        }


    }

}
