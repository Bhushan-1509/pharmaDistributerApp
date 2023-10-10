@extends('base')
@section('title','Lifecare Supportive Solution')
@section('stylesheets')
    <style>
        .truncate-overflow {
            position: relative;
            max-height: 7.4rem;
            overflow: hidden;
            padding-right: 1rem;
        }

        .card img{
            width: 100%;
            height:45vh;
            object-fit: cover;
        }

        </style>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/carousel.css') }}">
@endsection
@section('body')
    <x-assets.navbar/>
    <x-carousel/>
    <div class="container mt-3 text-center justify-content-center mb-4">
        <h2 class="display-5" style="font-weight: 400">Welcome to Lifecare Supportive Solutions !</h2>
        <p class="lead" style="font-family: 'Dubai light';font-size:1.45rem;">
            Our mission is to provide a seamless supply chain for pharmaceutical products, ensuring that vital medications and healthcare essentials reach the hands of healthcare providers and patients when they need them the most. As your reliable distribution partner, we take pride in our extensive network, state-of-the-art facilities, and a team of dedicated professionals who work tirelessly to meet your pharmaceutical needs.
        </p>
        <div class="container mt-5">
            <a type="button" href="/about-us" class="btn btn-primary btn-md">Read More</a>
        </div>
    </div>

    @php
        use App\Models\Medicine;
        use Illuminate\Http\Request;
        $medicines = Medicine::all();
        $noOfMedicines = count($medicines);
    @endphp
   <div class="container mb-5">
       <div class="container text-center mt-4 mb-4">
       </div>
       <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
           @if($noOfMedicines == 0)

           @endif
           @if($noOfMedicines < 3 and $noOfMedicines >= 1)
                   <h3 class="display-6">Medicines available</h3>
               @foreach($medicines as $medicine)
                   <div class="col-12 col-md-6 col-lg-4">
                       <x-wide-card imgPath="{{ url($medicine->img_path) }}" btnName="View" text="{{ $medicine->description }}}" title="{{ $medicine->medicine_name }}" id="{{ $medicine->medicine_id }}"/>
                   </div>
               @endforeach
           @endif
          @if($noOfMedicines >= 3)
                   <h3 class="display-6">Medicines available</h3>
               @for($i = 0; $i < 3; $i++)
                   <div class="col-12 col-md-6 col-lg-4">
                       <x-wide-card imgPath="{{ url($medicines[$i]->img_path) }}" btnName="View" text="{{ $medicines[$i]->description }}}" title="{{ $medicines[$i]->medicine_name }}" id="{{ $medicines[$i]->medicine_id }}"/>
                   </div>
                   @endfor
                   <div class="container md-5 text-center mt-4">
                       <a href="/medicines" class="btn btn-danger">View More</a>
                   </div>
               @endif
       </div>
   </div>

    <hr>
    <x-assets.footer/>
@endsection
