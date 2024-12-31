<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

//tener en cuenta que tengo el paquete intervention/image-laravel

class CkeditorController extends Controller
{

    /**
     * En este codigo se utiliza intervention image para comprimir la imagen
     * 
     * Esta linea de codigo lee la imagen desde la ruta y la captura:
     * $img = Image::read($image->getRealPath());
     * 
     * Esta linea de codigo guarda la imagen comprimida en la ruta especificada
     * $img->save('uploads/' . $file, 90); //90 es el nivel de compresion
     *
     * Esta linea de codigo devuelve la url de la imagen comprimida
     * $url = asset('uploads/' . $file);
     */
    public function upload(Request $req)
    {

        if($req->hasFile('upload')):

            $image  = $req->file('upload');
            $ext    = $image->extension();
            $file   = time() . '.webp'; //cambiar extension a webp

            // Utilizar Intervention Image para comprimir y guardar en formato WebP
            $img = Image::read($image->getRealPath());
            $img->save('uploads/' . $file, 100);
            $url    = asset('uploads/' . $file);

            return response()->json(['fileName'=>$file,'uploaded'=>1,'url'=>$url]);

        endif;

    }

    /**
     * Este codigo es sin utilizar intervention image para comprimir la imagen
     */
    public function back_upload(Request $req)
    {

        if($req->hasFile('upload')):

            $image = $req->file('upload');
            $ext = $image->extension();
            $file = time().'.'.$ext;
            $image->move('uploads/',$file);
            $url = asset('uploads/'.$file);
            return response()->json(['fileName'=>$file,'uploaded'=>1,'url'=>$url]);

        endif;

    }

}
