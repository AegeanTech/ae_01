<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public static $rules = [
        'file' => 'required|mimes:png,gif,jpeg,jpg,bmp'
    ];

    public static $messages = [
        'file.mimes' => 'Το αρχείο που ανεβάσατε δεν είναι αρχείο εικόνας',
        'file.required' => 'Απαιτείται εικόνα'
    ];
}