<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;



use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Redirect;
use Sentinel;
use View;

use App\Site;
use App\Object;

use App\Umessage;

class HelpController extends Controller
{
    public function showHelp()
    {
        if(Sentinel::check())
        {
            $uid = Sentinel::getUser()->id;
            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
            $content = Site::where('uid', '=', $uid)->firstOrFail();
            $contentcount = Site::where('uid', '=', $uid)->count();
            $umessages = Umessage::where('uid', '=', $uid)->get();
            if ($contentcount == 0){
                $initial = 1;
            } else {
                $initial = 0;
            }
            return view('pages.help', compact('content', 'userRoles', 'umessages'))->with('initial',$initial);
        }
        else
            return Redirect::to('admin/signin')->with('error', 'Θα πρέπει πρώτα να συνδεθείτε!');
    }

    public function showContext()
    {
        if(Sentinel::check())
        {
            return view('pages.context');
        }
        else
            return Redirect::to('admin/signin')->with('error', 'Θα πρέπει πρώτα να συνδεθείτε!');
    }
}
