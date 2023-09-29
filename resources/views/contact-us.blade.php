@extends('base')
@section('title','Contact Us')
@section('stylesheets')

@section('body')
    <x-assets.navbar/>
    <div class="container mt-5 md-5">
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
                    <div class="col-sm-12">
                        <div class="{{ $class }}">
                            {{ $text }}
                        </div>
                    </div>
                    <div class="row g-3 mb-4">
                        <x-forms.input-field-in-row className="col-sm-6" type="text" label="First Name" placeholder="" name="firstName"/>
                        <x-forms.input-field-in-row className="col-sm-6" type="text" label="Last Name" placeholder="" name="lastName"/>
                        @if ($errors->has('firstName'))
                            <span class="text-danger col-sm-6">{{ $errors->first('firstName') }}</span>
                        @endif
                        @if ($errors->has('lastName'))
                            <span class="text-danger col-sm-6">{{ $errors->first('lastName') }}</span>
                        @endif
                        <x-forms.input-field-in-row className="col-sm-12" label="Email" placeholder="" name="email"/>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                        <x-forms.input-field-in-row className="col-sm-12" label="Phone" placeholder="+91" name="phone"/>
                              @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                              @endif
                        <x-forms.input-field-in-row className="col-sm-12" label="Location" placeholder="" name="location"/>
                                @if ($errors->has('location'))
                                    <span class="text-danger">{{ $errors->first('location') }}</span>
                                @endif
                        <x-forms.text-area-field className="col-sm-12" label="Your message" name="msg" placeholder="Optional"/>
                        <div class="col-sm-12">
                            <div class="form-group">
                             <div class="g-recaptcha" name="g-recaptcha-response" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}" data-callback="onSubmit"></div>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-danger btn-md">Submit</button>
                </form>
            </div>
        </div>
        <hr class="w-100">
    <x-assets.footer/>
@endsection

@section('scripts')
            <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            <script src="https://www.google.com/recaptcha/api.js"></script>
@endsection
