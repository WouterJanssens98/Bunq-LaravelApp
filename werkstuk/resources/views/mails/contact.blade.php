@extends('layout.layout')


@section('content')

<div class="row">
    <div class="col-12 text-center mt-3">
        <h3> @lang('contact.title')</h3>

    </div>
</div>

<div class="container">
    <div class="col-12 mt-5">
        <h3 class="text" > @lang('mail.response1') {{$data['name']}}</h3>
        <p>
            @lang('mail.response2')
        </p>
    </div>
    </div>



@endsection
