<?php
/**
 * Created by PhpStorm.
 * User: Root
 * Date: 07.08.2016
 * Time: 20:24
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ImageController extends Controller
{
    public function getImage(Request $request)
    {
        if($request->ajax()){
            return 'ajax get request';
        }
    }



    public function postImage(Request $request)
    {
        $images = $request->all();

            if($request->ajax()){

              foreach($images as $image) {

                  $image_name = time().$image->getClientOriginalName();

                  print_r($image_name);

                  $flag_upload = $image->move('img/uploads', $image_name);

                  if($flag_upload){
                      $uploaded_images[] = $image_name;
                  }
              }
//                print_r($uploaded_images);
                dd();
                return \Response::json(['success'=>true, 'message'=>'images uploaded', 'images'=>$uploaded_images]);

        }
    }

}