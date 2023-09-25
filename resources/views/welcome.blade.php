@extends('base')
@section('title','Lifecare Supportive Solution')
@section('body')
    <x-assets.navbar/>
    <x-carousel/>
    <div class="container mt-3 text-center justify-content-center mb-4">
        <h2 class="display-5" style="font-weight: 400">Welcome to Lifecare Supportive Solutions !</h2>
        <p class="lead" style="font-family: 'Dubai light';font-size:1.45rem;">
            Lifecare Supportive Solutions has been catering to the requirements of the healthcare sector, since its formation in the year 2001. The firm has established itself a reliable partner of several doctors and medical practitioners by serving quality pharmaceuticals.
        </p>
        <div class="container mt-5">
            <a type="button" class="btn btn-primary btn-md" data-bs-toggle="button">Read More</a>
        </div>
    </div>
   <div class="container mb-4">
       <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
           <div class="col">
               <x-card/>
           </div><div class="col">
               <x-card/>
           </div><div class="col">
               <x-card/>
           </div>

       </div>
   </div>
    <hr>
    <x-assets.footer/>
@endsection
