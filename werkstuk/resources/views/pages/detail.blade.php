@extends('layout.layout')

@section('content')
<div class="container">
        <div class="col-12 mt-5 mb-3">
            <div class="row">
                @if (app()->getlocale() == 'en')
                <div class="col-12 mt-1">
                    <div class="row">
                        <img src="{{$post->imgurl}}" width="30%" />
                        <div class="card-body">
                        <h2 class="card-title">{{$post->en_intro}}</h2>
                    </div>
                        <p class="card-text mt-3">{{$post->en_text}}</p>
                        <p class="card-text">{{$post->en_content}}</p>
                        </div>
                </div>
            @elseif (app()->getlocale() == 'nl')
            <div class="col-12 mt-1">
                <div class="row">
                    <img src="{{$post->imgurl}}" width="30%" />
                    <div class="card-body">
                    <h2 class="card-title">{{$post->nl_intro}}</h2>
                </div>
                    <p class="card-text mt-3">{{$post->nl_text}}</p>
                    <p class="card-text">{{$post->nl_content}}</p>
                    </div>
            </div>
            @endif

        </div>
    </div>
</div>


@endsection



