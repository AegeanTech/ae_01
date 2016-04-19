<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input;

use App\City;
use App\Postal;

class ObjectController extends Controller
{
    public function findObject() {
        // Getting all post data
        $data = Input::all();
        $postalcode = $data['postalcode'];
//        $city = City::where('postal_from', '<', $postalcode)
//            ->where('postal_to', '>', $postalcode)
//            ->with('states')->firstOrFail();
        $objects = Object::lists('object', 'id');
        return json_encode($objects);
//        return json_encode($city);
    }
}
