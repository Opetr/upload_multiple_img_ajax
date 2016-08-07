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
        $all = $request->json();

        echo "<pre>";
        print_r($all);
        echo "</pre>";

    }


}