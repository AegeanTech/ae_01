@extends('emails/layouts/default')

@section('content')
    <p>Χαίρετε {!! $user->first_name !!},</p>

    <p>Καλώς ήρθατε στο TiPosPou! Παρακαλώ κάντε κλικ στον παρακάτω σύνδεσμο για να επιβεβαιώσετε τον λογαριασμό σας στο TiPosPou:</p>

    <p><a href="{!! $activationUrl !!}">{!! $activationUrl !!}</a></p>

    <p>Με εκτίμηση, </p>

    <p>@lang('general.site_name') Team</p>
@stop
