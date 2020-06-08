@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{$page->title}}</h1>

            <blockquote style="font-style : italic">
                {{$page->intro}}
            </blockquote>

            {!!$page->content !!}
        </div>
        <div class="col-md-4">
            SIDEBAR
        </div>
    </div>
</div>
    @endsection
