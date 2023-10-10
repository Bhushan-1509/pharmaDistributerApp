@extends('base')
@section('title','Contact Us')
@section('stylesheets')
@endsection
@section('body')
    <x-assets.dark-navbar/>
    <div class="container mt-4 md-5">
        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3 text-centerg  ">
                    <p class="lead" style="font-size:2.1rem;">Lifecare Supportive Solutions</p>
                </h4>
                    <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0"><i class="fa-solid fa-envelope fa-lg"></i></h6>
                            <p class="text-body-secondary"><a href="mailto:purchase@lifecaressupportive.com"><p class="text-secondary">purchase@lifecaressupportive.com</p></a></p>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0"><i class="fa-solid fa-envelope fa-lg"></i></h6>
                            <p class="text-body-secondary"><a href="mailto:purchase@lifecaressupportive.com"><p class="text-secondary">lifecaress2023@gmail.com</p></a></p>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
                        <div class="text-success">
                            <h6 class="my-0"><i class="fa fa-phone fa-lg"></i></h6>
                            <p class="text-success">+91 9930805353</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-7 col-lg-8">
                <h4 class="display-6 mb-5">Have Questions? Contact Us</h4>
                <form method="post" action="/contact-us" id="contactForm">
                    @csrf
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        @if(request()->session()->has('st'))
                            <div class="{{ $class }}">
                                {{ $text }}
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-12">
                    </div>
                    <div class="row g-3 mb-4">
                        <x-forms.input-field-in-row className="col-sm-6" type="text" label="First Name" placeholder="" name="firstName"/>
                        <x-forms.input-field-in-row className="col-sm-6" type="text" label="Last Name" placeholder="" name="lastName"/>
                            @error('firstName')
                                <span class="text-danger col-sm-6">{{ $message }}</span>
                            @enderror
                            @error('lastName')
                                <span class="text-danger col-sm-6">{{ $message }}</span>
                            @enderror
                        <x-forms.input-field-in-row className="col-sm-12" label="Email" placeholder="" name="email"/>
                            @error('email')
                                <span class="text-danger col-sm-6">{{ $message }}</span>
                            @enderror
                        <x-forms.input-field-in-row className="col-sm-12" label="Phone" placeholder="+91" name="phone"/>
                            @error('phone')
                                <span class="text-danger col-sm-6">{{ $message }}</span>
                            @enderror
                        <x-forms.input-field-in-row className="col-sm-12" label="Location" placeholder="" name="location"/>
                            @error('location')
                                <span class="text-danger col-sm-6">{{ $message }}</span>
                            @enderror
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
    </div>
        <hr class="w-100">
    <x-assets.footer/>
@endsection

@section('scripts')
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
