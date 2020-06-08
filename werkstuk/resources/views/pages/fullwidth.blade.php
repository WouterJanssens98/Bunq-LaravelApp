@extends('layout.layout')

@section('content')

<div class="row">
    <div class="col-12 text-center mt-5">

        <h1>
            @if(app()->getlocale() == 'nl')
            {{$page->title_nl}}
            @else
            {{$page->title_en}}
            @endif
        </h1>
    </div>
</div>

<div class="container">
<div class="col-12 mt-5">
    <h3 class="text" >
        @if(app()->getlocale() == 'nl')
        {{$page->intro_nl}}
        @else
        {{$page->intro_en}}
        @endif
    </h3>
    <p>
        @if(app()->getlocale() == 'nl')
        {!!$page->content_nl !!}
        @else
        {!!$page->content_en !!}
        @endif

    </p>
</div>
</div>


@endsection
