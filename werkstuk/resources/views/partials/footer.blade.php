<div class="row">
    <div class="col-12 text-center mt-3">
        <hr>
        <p> Copyright Bunq {{ date('Y') }}</p>

    </div>
</div>


<div class="col-6 offset-md-3   text-center mt-1">


    <div class="column mb-5">
        <div class="container">
            <h4 class="text-center">
                @if(app()->getlocale() == 'en')
                Subscribe to newsletter
                @elseif (app() -> getlocale() == 'nl')
                Abbonneer je op de newsletter
                @endif
            </h4>
            <form action="{{ route('newsletter')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">@lang('contact.field1')</label>
                    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
                    <p>
                        @if(app()->getlocale() == 'en')
                        If you are already subscribed, submitting your email will unsubscribe you from our list
                        @elseif (app() -> getlocale() == 'nl')
                        Indien je al geabboneerd bent zal je bij het invullen verwijderd worden van onze lijst
                        @endif
                    </p>
                </div>
                <button type="submit" class="btn btn-primary">@lang('contact.submit')</button>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('js/app.js')}}"></script>
</body>

</html>
