@extends('layout.layout')


@section('content')

<div class="row">
    <div class="col-12 text-center mt-3">
        <h2>Donations</h2>
    </div>
</div>

<div class="container">
<div class="col-12 mt-5">
    <h3>Make donation</h3>

<form action="{{ route('donations.pay')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">@lang('contact.field4')</label>
            <input name="name" type="text" class="form-control" id="name">
        </div>

        <div class="form-group">
            <label for="email">@lang('contact.field1')</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">@lang('contact.info')</small>
        </div>
        <div class="form-group">
            <label for="description">@lang('contact.field3')</label>
            <textarea name="description" type="text" class="form-control" id="description"></textarea>
        </div>


        <div class="form-group">
            <label for="amount">Amount</label>
            <input name="amount" type="value" class="form-control" id="amount">
        </div>

        <div class="form-group">
            <label for="active">Visible</label>
            <select name="active"class="form-control" id="active">
                <option value="visible">Visible</option>
                <option value="invisible">Not visible</option>
            </select>
        </div>




        <button type="submit" class="btn btn-primary">@lang('contact.submit')</button>
    </form>
</div>
</div>
@endsection
