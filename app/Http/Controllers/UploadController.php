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

        $image = array();

        foreach($data as $val => $file) {

            $nome = $file['nome'];
            $immagine = $file['immagine'];

            $formato = $immagine->getClientOriginalExtension();

            if ($formato === 'jpg' || $formato === 'png' || $formato === 'jpeg' || $formato === 'gif') {

                $img = Image::make($immagine);

                $size = $img ->filesize();

                if ($size <= 1000000) {

                    $image[$val]['nome'] = $nome . '_' . time() . '_' . $val . '.' . $formato;

                    $img->save(public_path('/uploads/original/' . $image[$val]['nome']));

                    $width = $img->width();
                    $height = $img->height();

                    if ($width >= $height) {

                        if ($width > 1200) {
                            $img->resize(1200, null, function ($constraint) {
                                    $constraint->aspectRatio();
                                })
                                ->save(public_path('/uploads/big/' . $image[$val]['nome']))
                                ->resize(600, null, function ($constraint) {
                                    $constraint->aspectRatio();
                                })
                                ->save(public_path('/uploads/small/' . $image[$val]['nome']))
                                ->resize(null, 150, function ($constraint) {
                                    $constraint->aspectRatio();
                                })
                                ->crop(150, 150)
                                ->save(public_path('/uploads/thumb/' . $image[$val]['nome']));
                        } else {
                            $img->save(public_path('/uploads/big/' . $image[$val]['nome']))
                                ->resize(600, null, function ($constraint) {
                                    $constraint->aspectRatio();
                                })
                                ->save(public_path('/uploads/small/' . $image[$val]['nome']))
                                ->resize(null, 150, function ($constraint) {
                                    $constraint->aspectRatio();
                                })
                                ->crop(150, 150)
                                ->save(public_path('/uploads/thumb/' . $image[$val]['nome']));
                        }

                    } else {

                        if ($height > 900) {
                            $img->resize(null, 900, function ($constraint) {
                                    $constraint->aspectRatio();
                                })
                                ->save(public_path('/uploads/big/' . $image[$val]['nome']))
                                ->resize(null, 400, function ($constraint) {
                                    $constraint->aspectRatio();
                                })
                                ->save(public_path('/uploads/small/' . $image[$val]['nome']))
                                ->resize(150, null, function ($constraint) {
                                    $constraint->aspectRatio();
                                })
                                ->crop(150, 150)
                                ->save(public_path('/uploads/thumb/' . $image[$val]['nome']));

                        } else {
                            $img->save(public_path('/uploads/big/' . $image[$val]['nome']))
                                ->resize(null, 400, function ($constraint) {
                                    $constraint->aspectRatio();
                                })
                                ->save(public_path('/uploads/small/' . $image[$val]['nome']))
                                ->resize(150, null, function ($constraint) {
                                    $constraint->aspectRatio();
                                })
                                ->crop(150, 150)
                                ->save(public_path('/uploads/thumb/' . $image[$val]['nome']));
                        }

                    }

                    $image[$val]['upload'] = true;
                    $image[$val]['errore'] = '';

                } else {
                    $image[$val]['nome'] = $immagine->getClientOriginalName();
                    $image[$val]['upload'] = false;
                    $image[$val]['errore'] = 'Immagine troppo grande (dimensioni superiori a 1mb)';
                }

            } else {
                $image[$val]['nome'] = $immagine->getClientOriginalName();
                $image[$val]['upload'] = false;
                $image[$val]['errore'] = 'Formato dell\'immagine non supportato (caricare un file jpg, png o gif)';
            }

        }

        return (['image' => $image]);

    }

}
