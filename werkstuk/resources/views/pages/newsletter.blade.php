@extends('layout.layout')


@section('content')

<div class="row mt-5">
    <div class="col-12 text-center mt-3">
    <h3>Hey {{$email}} !</h3>

    </div>
</div>

<div class="container">
    <div class="col-12 text-center mt-5">
        <h3 class="text">
            @if(app()->getlocale() == 'en')
            Thanks for subscribing!
            @elseif (app() -> getlocale() == 'nl')
            Bedankt om je te abboneren!
            @endif
        </h3>
    </div>
    </div>



@endsection
