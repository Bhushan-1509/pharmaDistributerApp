@extends('base')
@section('title','Contact Us')
@section('stylesheets')

@section('body')
    <x-assets.navbar/>
    <div class="container mt-5 mb-5 text-dark">
        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Your cart</span>
                    <span class="badge bg-primary rounded-pill">3</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Product name</h6>
                            <small class="text-body-secondary">Brief description</small>
                        </div>
                        <span class="text-body-secondary">$12</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Second product</h6>
                            <small class="text-body-secondary">Brief description</small>
                        </div>
                        <span class="text-body-secondary">$8</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Third item</h6>
                            <small class="text-body-secondary">Brief description</small>
                        </div>
                        <span class="text-body-secondary">$5</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
                        <div class="text-success">
                            <h6 class="my-0">Promo code</h6>
                            <small>EXAMPLECODE</small>
                        </div>
                        <span class="text-success">−$5</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>$20</strong>
                    </li>
                </ul>

                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <button type="submit" class="btn btn-secondary">Redeem</button>
                    </div>
                </form>
            </div>
            <div class="col-md-7 col-lg-8">
                <h4 class="display-6 mb-5">Have Questions? Contact Us</h4>
                <form method="post" action="/contact-us" id="contactForm">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row g-3 mb-4">
                        <x-forms.input-field-in-row className="col-sm-6" type="text" label="First Name" placeholder="" name="firstName"/>
                        <x-forms.input-field-in-row className="col-sm-6" type="text" label="Last Name" placeholder="" name="lastName"/>
                        <x-forms.input-field-in-row className="col-sm-12" label="Email" placeholder="" name="email"/>
                        <x-forms.input-field-in-row className="col-sm-12" label="Phone" placeholder="+91" name="phone"/>
                        <x-forms.input-field-in-row className="col-sm-12" label="Location" placeholder="" name="location"/>
                        <x-forms.text-area-field className="col-sm-12" label="Your message" name="msg" placeholder="Optional"/>
                    </div>

                <button class="g-recaptcha btn btn-danger btn-md" data-sitekey="6Lc_eFUoAAAAAKKcCgVQyi5FzhIHug9vLpGa7LKW" data-callback='onSubmit' data-action='submit'>Submit</button>
                </form>

            </div>
    </div>
        <hr class="w-100">
    <x-assets.footer/>
        <script>
            function onSubmit(token) {
                document.getElementById("contactForm").submit();
            }
            document.getElementsByClassName('g-recaptcha')[0].addEventListener('click',onSubmit)
        </script>
@endsection

@section('scripts')
            <script src="https://www.google.com/recaptcha/api.js"></script>
@endsection
