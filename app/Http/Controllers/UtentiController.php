<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UtentiController extends Controller
{
    public function index()
    {
        $ruoloUtente= new RuoloController();
        $ruolo = $ruoloUtente->control();

        if ($ruolo === 'admin') {

            $tableutenti = DB::table('users')->get();

            $data = array();

            foreach ($tableutenti as $key => $utente) {
                $data[$key]['nome'] = $utente->name;
                $data[$key]['email'] =  $utente->email;
                $data[$key]['ruolo'] = $utente->ruolo;
                $data[$key]['id'] = $utente->id;
            }

            return view('admin.utenti')->with([
                'data' => $data
            ]);

        }


        else {
            return redirect('/');
        }


    }

    public function cambiaRuolo(Request $request)
    {


    }
}
