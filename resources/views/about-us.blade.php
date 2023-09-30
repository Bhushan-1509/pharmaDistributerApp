@extends('base')
@section('title','About Us')
@section('body')
    <x-assets.navbar/>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/about-us.png" class="d-block w-100" alt="...">
        </div>
    </div>
    <div class="container text-center mt-5 mb-5">
    <h2 class="display-5">We care your well being !</h2>
    <p class="text-left" style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp; Supportive Solution
        In pursuit of having excellence in all the business works, we have employed a specialized workforce. The hired team comprises intelligent personnel of several fields, working with passion and punctuality to attain the business goals, on-time. And ensuring the right medicine gets to the right patient at the right time. A team of packers uses finest quality material to do the packing of the range. Further, all the employees of our organization work in harmony to attain the business objectives within the decided time period. </p>
    </div>
    <hr>
    <x-assets.footer/>
@endsection
