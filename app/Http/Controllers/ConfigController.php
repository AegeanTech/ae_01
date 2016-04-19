<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/* TiPosPou Classes */
use App\Site;
use Sentinel;
use View;
use Input;

class ConfigController extends Controller
{
    public function getInitialData()
    {

        $uid = Sentinel::getUser()->id;
        $content = Site::where('uid', '=', $uid)->firstOrFail();
        $contentcount = Site::where('uid', '=', $uid)->count();
        $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
        if ($contentcount == 0){
            $initial = 1;
        } else {
            $initial = 0;
        }

        return compact('uid', 'content', 'initial', 'userRoles', 'umessages');
    }

    public function show($id = '')
    {

        $configs = Site::With('users', 'objects', 'subscriptions', 'suburls', 'configs')->where('id', '=', $id)->first();
        return View('pages.admin.uconfig.config', $this->getInitialData(), compact('configs'));
    }
}
