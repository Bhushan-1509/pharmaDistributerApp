@extends('base')
@section('title','Name Patient Import')
@section('body')
    <x-assets.dark-navbar/>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/doctor-talking-to-patient.jpg') }}" class="d-block w-100" style="height:60vh;object-fit: cover;" alt="...">
            </div>
        </div>
        <div class="container text-center mt-4">
{{--            <h2 class="display-6">Caring for you and your family</h2>--}}
        </div>
        <div class="container">
            <h1 class="display-5 text-center mt-4 mb-4">Name patient import</h1>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <b><p class="display-6" style="font-weight:400;">What is unauthorized medicine?</p></b>
                    <p class="justify-content-center" style="font-size:1.1rem; text-align:justify;">
                        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;The medicines which are not yet authorized or available for selling in your home country are known as unauthorized medicine. There are many lifesaving medicines which are approved only in few countries, but through the Name patient import program such type of medicine can also be made available in your country for better treatment.
                    </p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h2 class="display-6" style="font-weight:400;">Documents required</h2>
                    <ul>
                        <li>
                    <div class="row mt-4">
                        <h4 class="display-6" style="font-size: 1.4rem;font-weight: 400;">Doctor’s Prescription</h4>
                        <p style="font-size:1.1rem;text-align:justify;"> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;We would require a prescription from a Registered Medical Practitioner Stating Product name, dosage, duration of treatment and diagnosis</p>
                    </div>
                        </li>
                        <li>
                    <div class="row">
                        <h4 class="display-6" style="font-size: 1.4rem;font-weight: 400; text-align:justify;">Patient’s Medical history
                        </h4>
                        <p style="font-size:1.1rem; text-align:justify;"> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;We would require all test reports and Medical reports of the patient for the last 3 months.
                        </p>
                    </div>
                        </li>
                        <li>
                    <div class="row">
                        <h4 class="display-6" style="font-size: 1.4rem;font-weight: 400;">Patient’s Identity card
                        </h4>
                        <p style="font-size:1.1rem;text-align:justify;"> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;We will require a scanned copy of the Patient’s identity card and proof of residence to initiate the documentation process. You can use a copy of Passport, Driving License, Employee ID card or any Photo ID document as your Identity card.
                        </p>

                    </div>
                        </li></ul>
                    </div>
                </div>
            </div>
        </div>
    <hr>
    <x-assets.footer/>
@endsection
