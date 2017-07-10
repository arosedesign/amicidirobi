<?php

namespace App\Http\Controllers;

require_once '../vendor/autoload.php';


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class UploadController extends Controller
{
    public function store($data)
    {

        $nome = $data['nome'];
        $immagine = $data['immagine'];

        $fotoNome = $nome.'_'.time().'.'.$immagine->getClientOriginalExtension();

        $immagine->move(public_path('/uploads/original'), $fotoNome);

        $imgurl = public_path('/uploads/original/'.$fotoNome);

        $img = Image::make($imgurl);

        $width = $img->width();
        $height = $img->height();

        if ($width >= $height) {

            $img->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })
                ->save(public_path('/uploads/big/'.$fotoNome))
                ->resize(150, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('/uploads/thumb/'.$fotoNome));

        } else {

            $img->resize(null, 900, function ($constraint) {
                $constraint->aspectRatio();
            })
                ->save(public_path('/uploads/big/'.$fotoNome))
                ->resize(null, 150, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('/uploads/thumb/'.$fotoNome));

        }

        return $fotoNome;

    }
}
