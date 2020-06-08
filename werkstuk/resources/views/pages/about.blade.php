@extends('layout.layout')


@section('content')

<div class="row">
    <div class="col-12 text-center mt-5">
        <h2> @lang('about.title') </h2>
    </div>
</div>

<div class="container">
<div class="col-12 mt-5">
    <h3 class="text" >@lang('about.header1')</h3>
    <p>
        @lang('about.description1')
    </p>
</div>
</div>
@endsection
