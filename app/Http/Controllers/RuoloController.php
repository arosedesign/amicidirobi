<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class RuoloController extends Controller
{
    public function control()
    {
        $id = Auth::id();

        $selectruolo = DB::table('users')
            ->select()
            ->where('id' , '=', $id)
            ->first();

        return $selectruolo->ruolo;
    }
}
