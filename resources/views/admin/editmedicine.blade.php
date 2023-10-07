@extends('base')
@section('title','Add medicine')
@section('stylesheets')
@endsection
@section('body')
    <x-admin.dark-navbar/>
    @php
        use App\Models\Medicine;
        use Illuminate\Http\Request;
        $medicine = Medicine::where('medicine_id','=',intval(request()->route('id')))->first();
    @endphp
    <div class="container mt-4">
       @if(request()->session()->has('st'))
            <div class="col-sm-12 mt-2">
                <div class="{{ $class }}">
                    {{ $text }}
                </div>
            </div>
       @endif
        <form method="post" action="" class="" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-2">
                <h6 class="display-6 text-center">Update medicine info</h6>
            </div>
            <div class="mb-4">
                <label for="medicineName" class="form-label">Medicine Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Your medicine name here......" name="medicineName" value="{{ $medicine->medicine_name }}">
            </div>
            @if ($errors->has('medicineName'))
                <span class="text-danger col-sm-6">{{ $errors->first('firstName') }}</span>
            @endif
            <div class="mb-4">
                <label for="medicineDescription" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="desc">{{ $medicine->description }}</textarea>
            </div>
            @if ($errors->has('desc'))
                <span class="text-danger col-sm-6">{{ $errors->first('firstName') }}</span>
            @endif
            <div class="input-group mb-5">
                <input type="file" class="form-control" id="inputGroupFile02" name="image">
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>

            <button class="btn btn-primary">Update medicine</button>
        </form>
    </div>
@endsection

