<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class PageController extends Controller
{
    public function upload(Request $request){
        $file = $request->file('photo');
        $newName = uniqid().'_'.$file->getClientOriginalName();
        //$file->storeAs('public/photo',$newName);
        $img = Image::make($file);
        $watermark = Image::make('https://w7.pngwing.com/pngs/434/310/png-transparent-exo-k-pop-logo-mama-xoxo-design-angle-triangle-logo.png');
        $watermark->fit(50,50);
        $img->insert($watermark,'bottom-right',10,10);
        $img->save('edited/'.$newName);
        $img->fit(100,100);
        $img->save('small/'.$newName);
        //return $img->response();
        // $img->resize(400, 400, function ($constraint) {
        //     $constraint->aspectRatio();
        //     $constraint->upsize();
        // });
        //$img->crop(300,300);
        //$img->fit(100,100);
        return redirect()->route('/');
    }
}
