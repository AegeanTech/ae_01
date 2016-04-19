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

use App\User;

class UrequestController extends Controller
{
    public function getInitialData()
    {

        $uid = Sentinel::getUser()->id;
        $content = Site::where('uid', '=', $uid)->firstOrFail();
        $contentcount = Site::where('uid', '=', $uid)->count();
        $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
        $umessages = Umessage::where('uid', '=', $uid)->get();
        if ($contentcount == 0){
            $initial = 1;
        } else {
            $initial = 0;
        }

        return compact('uid', 'content', 'initial', 'userRoles', 'umessages');
    }

    public function index()
    {
        return view('pages.user.urequests.compose_urequest', $this->getInitialData());
    }


    public function getList()
    {
        $uid = Sentinel::getUser()->id;
        $urequests = Urequest::Where('uid', '=', $uid)->get();
        return view('pages.user.urequests.list_urequest', $this->getInitialData(), compact('urequests'));
    }

    public function manageList($action = '')
    {
        $urequests_all_total_count = Urequest::count();
        $urequests_all_active_count = Urequest::Where('status', '=', 'Εκκρεμεί')->count();
        $urequests_all_count = $urequests_all_total_count . ' (' . $urequests_all_active_count . ')';

        $urequests_upgrade_total_count = Urequest::Where('type', '=', 'Αναβάθμιση πακέτου')->count();
        $urequests_upgrade_active_count = Urequest::Where('type', '=', 'Αναβάθμιση πακέτου')->Where('status', '=', 'Εκκρεμεί')->count();
        $urequests_upgrade_count = $urequests_upgrade_total_count . ' (' . $urequests_upgrade_active_count . ')';

        $urequests_suburl_total_count = Urequest::Where('type', '=', 'Αλλαγή ονόματος (Suburl)')->count();
        $urequests_suburl_active_count = Urequest::Where('type', '=', 'Αλλαγή ονόματος (Suburl)')->Where('status', '=', 'Εκκρεμεί')->count();
        $urequests_suburl_count = $urequests_suburl_total_count . ' (' . $urequests_suburl_active_count . ')';

        $urequests_object_total_count = Urequest::Where('type', '=', 'Προσθήκη επαγγελματικής κατηγορίας')->count();
        $urequests_object_active_count = Urequest::Where('type', '=', 'Προσθήκη επαγγελματικής κατηγορίας')->Where('status', '=', 'Εκκρεμεί')->count();
        $urequests_object_count = $urequests_object_total_count . ' (' . $urequests_object_active_count . ')';

        $urequests_other_total_count = Urequest::Where('type', '=', 'Άλλο')->count();
        $urequests_other_active_count = Urequest::Where('type', '=', 'Άλλο')->Where('status', '=', 'Εκκρεμεί')->count();
        $urequests_other_count = $urequests_other_total_count . ' (' . $urequests_other_active_count . ')';

        if ($action) {

            switch ($action) {
                case 'all':
                    $type = '';
                    break;
                case 'active':
                    $type = 'Εκκρεμεί';
                    break;
                case 'upgrade':
                    $type = 'Αναβάθμιση πακέτου';
                    break;
                case 'suburl':
                    $type = 'Αλλαγή ονόματος (Suburl)';
                    break;
                case 'object':
                    $type = 'Προσθήκη επαγγελματικής κατηγορίας';
                    break;
                case 'other':
                    $type = 'Άλλο';
                    break;
                default:
                    $type = 'Άλλο';
            }
        }
        else{
            $type = '';
        }

//        $type = 'Προσθήκη επαγγελματικής κατηγορίας';

        if($type != ''){
            if($type == 'Εκκρεμεί'){
                $urequests = Urequest::With('users', 'sites')->Where('status', '=', $type)->get();
            }
            else {
                $urequests = Urequest::With('users', 'sites')->Where('urequests.type', '=', $type)->get();
            }
        }
        else
        {
            $urequests = Urequest::All();

        }
//        return \Response::json($urequests);
        return view('pages.admin.urequests.list_urequest', $this->getInitialData(), compact('urequests', 'urequests_all_count', 'urequests_upgrade_count', 'urequests_suburl_count', 'urequests_object_count', 'urequests_other_count'));
    }

    public function getView($rid = '')
    {
        if ($rid) {
            $urequest = Urequest::Where('id', '=', $rid)->first();
            return view('pages.user.urequests.view_urequest', $this->getInitialData(), compact('urequest'));
        }
    }

    public function manageView($rid = '')
    {
        if ($rid) {
            $urequest = Urequest::With('users', 'sites')->Where('id', '=', $rid)->first();
            return view('pages.admin.urequests.view_urequest', $this->getInitialData(), compact('urequest'));
        }
    }

    public function manageStore($rid = '')
    {
        if ($rid) {
            $urequest = Input::all();

            Urequest::Where('id', '=', $rid)->update(array('status' => $urequest['status']));

            switch ($urequest['type']) {
                case '':
                    $action = 'all';
                    break;
                case 'Εκκρεμεί':
                    $action = 'active';
                    break;
                case 'Αναβάθμιση πακέτου':
                    $action = 'upgrade';
                    break;
                case 'Αλλαγή ονόματος (Suburl)':
                    $action = 'suburl';
                    break;
                case 'Προσθήκη επαγγελματικής κατηγορίας':
                    $action = 'object';
                    break;
                case 'Άλλο':
                    $action = 'other';
                    break;
                default:
                    $action = 'all';
            }

            return Redirect::to('admin/urequests/manage/list/' . $action);
        }
    }

    public function storeUrequest()
    {
        $input = Request::all();

        $urequest = new Urequest();
        $urequest->uid = $input['uid'];
        $urequest->sid = $input['sid'];
        $urequest->type = $input['type'];
        $urequest->description = $input['description'];
        $urequest->status = $input['status'];

        if($urequest->save()){
            Session::flash('flash_message', 'Το αίτημα καταχωρήθηκε επιτυχώς!');
            return Redirect::to('admin/urequests/list');
        }


    }

}
