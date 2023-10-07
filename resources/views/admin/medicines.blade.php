@extends('base')
@section('title','Medicines')
@section('stylesheets')
    <style>

        .card img{
            width: 100%;
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
    <x-admin.dark-navbar/>
    @php
        use App\Models\Medicine;
        use Illuminate\Http\Request;
        $medicines = Medicine::paginate(12);

     @endphp
    <div class="container mt-4 mb-5">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($medicines as $medicine)
                <div class="col-12 col-md-6 col-lg-4">
                    <x-admin.wide-card imgPath="{{ url($medicine->img_path) }}" firstBtn="Modify" secondBtn="Delete" text="{{ $medicine->description }}" title="{{ $medicine->medicine_name }}" id="{{ $medicine->medicine_id }}"/>
                </div>
            @endforeach
                {{ $medicines->links() }}
        </div>
    </div>
@endsection
