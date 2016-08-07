<?php
/**
 * Created by PhpStorm.
 * User: Root
 * Date: 07.08.2016
 * Time: 20:24
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;


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
        $all = $request->all();

            if($request->ajax()){

                return $all;

        }
    }

}