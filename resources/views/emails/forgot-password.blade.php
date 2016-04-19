@extends('emails/layouts/default')

@section('content')
    <p>Hello {!! $user->first_name !!} {!! $user->last_name !!},</p>

    <p>Παρακαλώ κάντε κλικ στον παρακάτω σύνδεσμο για να αλλάξετε τον κωδικό σας:</p>

    <p><a href="{!! $forgotPasswordUrl !!}">{!! $forgotPasswordUrl !!}</a></p>

    <p>Με εκτίμηση, </p>

    <p>@lang('general.site_name') Team</p>
@stop
