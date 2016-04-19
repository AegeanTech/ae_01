<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Sentinel;
use Session;
use Input;

use Request;

use Redirect;
use App\Site;
use App\Urequest;
use App\Umessage;

class UmessageController extends Controller
{
    public function getIndex()
    {
        $sites = Site::All();

        return View('admin.advanced_tables', $this->getInitialData(), compact('sites'));
    }

    public function getInitialData()
    {

        $uid = Sentinel::getUser()->id;
        $content = Site::where('uid', '=', $uid)->firstOrFail();
        $contentcount = Site::where('uid', '=', $uid)->count();
        $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
//        $umessages = Umessage::where('uid', '=', $uid)->get();
        if ($contentcount == 0){
            $initial = 1;
        } else {
            $initial = 0;
        }

        return compact('uid', 'content', 'initial', 'userRoles', 'umessages');
    }

    public function getList()
    {
        $uid = Sentinel::getUser()->id;
//        $urequests = Urequest::Where('uid', '=', $uid)->get();
        $umessages = Umessage::where('uid', '=', $uid)
            ->where('status', '=', 'active')
            ->where('triggered_at', '<=', date("Y-m-d H:i:s"))
            ->orWhere(function ($query) {
                $query  ->where('expired_at', '>=', date("Y-m-d H:i:s"))
                    ->where('expired_at', '=', NULL);
            })->get();
        return view('pages.user.umessages.list_umessage', $this->getInitialData(), compact('umessages'));
    }

    public function save()
    {
        $umessage = Input::all();
        if ($umessage['state'] == 'readen'){
            Umessage::where('uid', '=', $umessage['uid'])->where('type', '=', $umessage['type'])->update(array('state' => 'readen'));
        }
    }

    public function edit()
    {
        $umessage = Input::all();

        switch ($umessage['umessage_state']) {
            case 'unread':
                $state="readen";
                break;
            case 'readen':
                $state = "unread";
                break;
            default:
                $state = "";
        }

        Umessage::WhereIn('id',explode(" ",$umessage['umessage_id']))->update(array('state' => $state));
        $response = array(
            'status' => 'success',
            'msg' => 'Η ενέργεια σας αποθηκεύτηκε επιτυχώς!',
        );
        return \Response::json($response);
    }

    public function manageList($id = '', $type = '')
    {
        $contents = Site::where('id', '=', $id)->firstOrFail();
        if($type == 'all'){
            $umessages = Umessage::Where('sid', '=', $contents->id)->get();
        }else{
            $umessages = Umessage::Where('sid', '=', $contents->id)->where('type', '=', $type)->get();
        }
        return view('pages.admin.umessages.list_umessage', $this->getInitialData(), compact('umessages', 'contents'));
    }

    public function manageCreate($id = '')
    {
        $contents = Site::where('id', '=', $id)->firstOrFail();
        $umessages = Umessage::Where('sid', '=', $contents->id)->get();
        return view('pages.admin.umessages.compose_umessage', $this->getInitialData(), compact('umessages', 'contents'));
    }

    public function manageView($id = '')
    {
        $umessage = Umessage::Where('id', '=', $id)->firstOrFail();
        $contents = Site::where('id', '=', $umessage->sid)->firstOrFail();
        return view('pages.admin.umessages.view_umessage', $this->getInitialData(), compact('umessage', 'contents'));
    }

    public function manageStore()
    {
        $input = Request::all();

        $umessage = new Umessage();
        $umessage->uid = $input['uid'];
        $umessage->sid = $input['sid'];
        $umessage->type = $input['type'];
        $umessage->description = $input['description'];
        $umessage->triggered_at = $input['triggered_at'];
        $umessage->status = $input['status'];
        $umessage->state = 'unread';
        $umessage->expired_at = $input['expired_at'];

        if($umessage->save()){
            Session::flash('flash_message', 'Το μήνυμα καταχωρήθηκε επιτυχώς!');
            return Redirect::to('admin/umessages/' . $input['sid'] . '/list/all');
        }


    }

    public function manageEdit()
    {
        $input = Input::all();
//        $input = Request::all();
        $umessage = Umessage::where('id', '=', $input['id'])->firstOrFail();
        $umessage->type = $input['type'];
        $umessage->status = $input['status'];
        $umessage->description = $input['description'];
        $umessage->update();

        return Redirect::to('admin/umessages/' . $input['sid'] . '/list/all');

    }

}
