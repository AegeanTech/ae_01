<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input;
use Validator;

use Redirect;

use App\Http\Requests\ContactMeRequest;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendContactInfo(ContactMeRequest $request)
    {
        $data = $request->only('name', 'email');
        $data['messageLines'] = explode("\n", $request->get('message'));

        Mail::send('emails.layouts.contact', $data, function ($message) use ($data) {
            $message->subject('Μήνυμα από: '.$data['name'])
                ->to(env('MAIL_USERNAME'))
                ->replyTo($data['email']);
        });

//        Mail::send('emails.layouts.contact', [], function ($message) {
//            $message->to('simag6891@gmail.com', 'example_name')->subject('Welcome!');
//        });

        return Redirect::to('/contact')
            ->withSuccess("Το μήνυμα σας εστάλη επιτυχώς. Σας ευχαριστούμε.");
    }

    public function sendProfileMessage(ContactMeRequest $request)
    {
        $data = $request->only('name', 'email', 'user_suburl', 'user_mail');
        $data['messageLines'] = explode("\n", $request->get('message'));

        Mail::send('emails.layouts.message', $data, function ($message) use ($data) {
            $message->subject('Μήνυμα από TiPosPu.')
                ->to($data['user_mail'])
                ->replyTo($data['email']);
        });

        return Redirect::to('/site/-megas-f.-vasileios-ae')
            ->withSuccess("Το μήνυμα σας εστάλη επιτυχώς. Σας ευχαριστούμε.");
    }
}
