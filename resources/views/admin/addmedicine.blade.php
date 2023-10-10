@extends('base')
@section('title','Add medicine')
@section('stylesheets')
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
@endsection
@section('body')
    <x-admin.dark-navbar/>
     <div class="container">
        @if(request()->session()->has('st'))
             <div class="col-sm-12 mt-2">
                 <div class="{{ $class }}">
                     {{ $text }}
                 </div>
             </div>
         @endif
        <form method="post" action="{{ route('admin-medicine-add-post') }}"  enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-2">
                <h6 class="display-6 text-center">Add medicine</h6>
            </div>
            <div class="mt-4">
                <label class="form-label">Medicine Name</label>
                <input type="text" class="form-control" placeholder="Your medicine name here......" name="medicineName" />
            </div>
            @if ($errors->has('medicineName'))
                <span class="text-danger col-sm-6">{{ $errors->first('medicineName') }}</span>
            @endif
            <div class="mt-4">
                <label for="medicineDescription" class="form-label">Description</label>
                <textarea class="form-control" rows="6" name="desc"></textarea>
            </div>
            @if ($errors->has('desc'))
                <span class="text-danger col-sm-6">{{ $errors->first('desc') }}</span>
            @endif
            <div class="input-group mt-4">
                <input type="file" class="form-control" id="inputGroupFile02" name="image">
                <label class="input-group-text">Upload</label>
            </div>
            @if ($errors->has('image'))
                <span class="text-danger col-sm-6">{{ $errors->first('image') }}</span>
            @endif
            <div class="mb-4"></div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Add medicine</button>
            </div>
        </form>
    </div>
@endsection

