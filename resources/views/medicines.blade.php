@extends('base')
@section('title','Medicines')
@section('stylesheets')
    <style>
        .card img{
            width:100%;
            height: 45vh;
            object-fit: cover;
        }
        .truncate-overflow {
            position: relative;
            max-height: 7.4rem;
            overflow: hidden;
            padding-right: 1rem;
        }

    </style>
@endsection
@section('body')
    <x-assets.dark-navbar/>
    <?php
    use App\Models\Medicine;
    use Illuminate\Http\Request;
    $medicines = Medicine::all();

    ?>
{{--    <hr>--}}
    <div class="container mt-3">
        <div class="container text-center">
            <h6 class="display-5">Medicines</h6>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-3 mb-5">
            @foreach($medicines as $medicine)
                <div class="col-12 col-md-6 col-lg-4">
                    <x-wide-card imgPath="{{ url($medicine->img_path) }}" btnName="View" text="{{ $medicine->description }}}" title="{{ $medicine->medicine_name }}" id="{{ $medicine->medicine_id }}"/>
                </div>
            @endforeach
        </div>
    </div>
    <hr>
    <x-assets.footer/>
@endsection
