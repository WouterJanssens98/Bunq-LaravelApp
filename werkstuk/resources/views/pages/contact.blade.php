@extends('layout.layout')


@section('content')

<div class="row">
    <div class="col-12 text-center mt-5">
        <h3> @lang('contact.title')</h3>

    </div>
</div>

<div class="col-6 offset-md-3 mt-5">

<form action="" method="POST">
    @csrf

    <div class="form-group">
        <label for="subject">@lang('contact.field4')</label>
        <input name="name" type="text" class="form-control" id="exampleInputSubject1">
    </div>

    <div class="form-group">
        <label for="email">@lang('contact.field1')</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">@lang('contact.info')</small>
    </div>
    <div class="form-group">
        <label for="subject">@lang('contact.field2')</label>
        <input name="subject" type="text" class="form-control" id="exampleInputSubject1">
    </div>
    <div class="form-group">
        <label for="exampleInputText1">@lang('contact.field3')</label>
        <textarea name="content" type="text" class="form-control" id="exampleInputText1"></textarea>
    </div>


    <button type="submit" class="btn btn-primary">@lang('contact.submit')</button>
    </form>
</div>



@endsection
