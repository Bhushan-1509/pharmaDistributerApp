@extends('base')
@section('title','Not found')
@section('stylesheets')
    <style>
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.04);
            border-radius: .25rem;
        }

        .card .card-header {
            background-color: #fff;
            border-bottom: none;
        }
    </style>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
@endsection
@section('body')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12">
            <div class="card shadow-lg border-0 rounded-lg mt-5 mx-auto" style="width: 30rem;">
                <h3 class="card-header display-1 text-muted text-center">
                    Oops !
                </h3>

                <span class="card-subtitle mb-2 text-muted text-center">
                No results found
            </span>

                <div class="card-body mx-auto">
                    <a type="button" href="{{ url()->previous() }}"
                       class="btn btn-sm btn-info text-white"> Go back </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
