@extends('layout.layout')


@section('content')

<div class="row">
    <div class="col-12 text-center mt-3">
    <h3>Hey!</h3>

    </div>
</div>

<div class="container">
    <div class="col-12 mt-5">
        <h3 class="text" >
            @if(app()->getlocale() == 'en')
            Thanks for donating!
            @elseif (app() -> getlocale() == 'nl')
            Bedankt voor je donatie!
            @endif
        </h3>
    </div>
    </div>



@endsection
