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

        $img = Image::make($immagine);

        $fotoNome = $nome.'_'.time().'.'.$immagine->getClientOriginalExtension();

        $size = $img->filesize();

        if ($size <= 1000000) {

            $img->save(public_path('/uploads/original/'.$fotoNome));


            var_dump($size);
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

            return ([
                'upload' => true,
                'foto' => $fotoNome
            ]);

        } else {
            return ([
                'upload' => false,
                'errore' => 'Immagine troppo grande (dimensioni superiori a 1mb)'
            ]);
        }

    }
}
