<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\RuoloController;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ruoloUtente= new RuoloController();
        $ruolo = $ruoloUtente->control();


        if ($ruolo === 'in_attesa') {
            return view('admin.validazione');
        } elseif ($ruolo === 'admin') {
            return view('admin.index');
        } elseif ($ruolo === 'festival') {
            return redirect('/festival');
        }


    }
}
