<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UploadController extends Controller
{
    public function store($data)
    {
        $nome = $data['nome'];
        $immagine = $data['immagine'];

        $fotoNome = $nome.'_'.time().'.'.$immagine->getClientOriginalExtension();

        $immagine->move(public_path('uploads'), $fotoNome);

        return $fotoNome;

    }
}
