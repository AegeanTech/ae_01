<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function showFrontend($name=null)
    {

        if(View::exists($name))
        {
            return View('/pages/frontend/'.$name);
        }
        else
        {
            return View('404');
        }
    }
}
