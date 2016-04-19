<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Sentinel;
use View;
use Datatables;

use App\Site;
use App\Suburl;

use App\User;

use App\Umessage;

use Input;


class SuburlController extends Controller
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

//    public function getInitialData()
//    {
//
//        $uid = Sentinel::getUser()->id;
//        $content = Site::where('uid', '=', $uid)->firstOrFail();
//        $contentcount = Site::where('uid', '=', $uid)->count();
//        $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
//        if ($contentcount == 0){
//            $initial = 1;
//        } else {
//            $initial = 0;
//        }
//
//        return compact('uid', 'content', 'initial', 'userRoles');
//    }

    public function getIndex()
    {

        $sites = Site::All();

//        return View::make('admin.users.index', $this->getInitialData(), compact('users'));
        return View::make('admin.advanced_tables', $this->getInitialData(), compact('sites'));
    }

    public function index()
    {
        return view('pages.admin.suburl.datatables', $this->getInitialData());
    }

    public function edit($id = '')
    {
        if ($id){
//            $suburls = Suburl::All();
            $suburls = Suburl::With('sites')->Where('sid', '=', $id)->get();
//        suburls = Site::select(['suburl'])->where('sid', '=', 4);
            return view('pages.admin.suburl.editable_table', $this->getInitialData(), compact('suburls'));
        }
    }

    public function editedata($id = '')
    {
        if ($id) {
            $suburls = Suburl::select(['suburl', 'master'])->Where('sid', '=', $id);
//            $suburls = Suburl::With('sites')->Where('sid', '=', $id)->get();

            return Datatables::of($suburls)
                ->add_column('edit', '<a class="edit" href="javascript:;"><i class="icon-list-alt"></i>Edit</a>')
                ->add_column('delete', '<a class="edit" href="javascript:;"><i class="icon-trash"></i>Delete</a>')
                ->make(true);
        }
    }

    public function save()
    {
        $data = Input::all();

        if (Suburl::where('suburl', '=', $data['suburl'])->exists()) {
            if ($data['master'] == 1){

                Suburl::where('sid', '=', $data['sid'])->update(array('master' => '0'));

//                Suburl::updateOrCreate(array('sid' => $data['sid']), array('master' => '1'));

                Suburl::where('sid', '=', $data['sid'])->where('suburl', '=', $data['suburl'])->update(array('master' => '1'));

                Site::where('id', '=', $data['sid'])->update(array('suburl' => $data['suburl']));


            }
//            $suburl = Suburl::where('suburl', '=', $data['suburl'])->firstOrFail();
//
//            $content->update($request->all());
        } else {
//        $sid = $data['sid'];
//        $suburl = $data['suburl'];
//        $master = $data['master'];

        $suburl = new Suburl;
        $suburl->sid = $data['sid'];
        $suburl->suburl = $data['suburl'];
        $suburl->master = $data['master'];

        $suburl->save();
        }
    }

    public function delete()
    {

        $suburl = Suburl::where('sid', '=', $data['sid'])->where('suburl', '=', $data['suburl'])->firstOrFail();
        $suburl->delete();

    }

    public function data()
    {
        $users = Site::select(['id', 'name', 'suburl', 'group'])->With('suburls', 'subscriptions');

//        $users = User::With('groups')->get();

        return Datatables::of($users)
            ->add_column('actions','<a href="{{ route(\'admin.suburl.edit\', $id) }}"><i class="livicon" data-name="link" data-size="18" data-loop="true" data-c="#dd4033" data-hc="#428BCA" title="Αντιστοίχιση Suburl"></i></a>
                                    <a href="{{ route(\'admin.config\', $id) }}"><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#009178" data-hc="#428BCA" title="Επεξεργασία Ρυθμίσεων"></i></a>
                                    <a href="{{ URL::to(\'admin/umessages/\' . $id . \'/list/all\') }}"><i class="livicon" data-name="bell" data-size="18" data-loop="true" data-c="#3f779f" data-hc="#428BCA" title="Ενημέρωση Suburl"></i></a>')
            ->make(true);
    }

    public function suburlList()
    {
        $suburls = Suburl::select(['sid', 'suburl']);

        return Datatables::of($suburls)
            ->add_column('edit','<a class="edit" href="javascript:;">Edit</a>')
            ->add_column('delete','<a class="delete" href="javascript:;">Delete</a>')
            ->make(true);
    }
}
