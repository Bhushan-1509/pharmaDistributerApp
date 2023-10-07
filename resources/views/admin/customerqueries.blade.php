@extends('base')
@section('title','Customer queries')
@section('stylesheets')
@endsection
@php
    use App\Models\CustomerQuery;
    $queries = CustomerQuery::paginate(15);
    $nOfQueries = $queries->count();
@endphp
@section('body')
    <x-admin.dark-navbar/>
    <div class="modal fade" id="queryDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Query</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you really want to delete this query ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h1 class="mt-4 display-6 text-center">Customer Queries</h1>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
            <div class="row">
                <div class="col-lg-8 col-sm-8 col-md-8 mb-3">
                    <input type="text" class="form-control" name="search" id="" placeholder="Search by name or email">
                </div>
                <div class="col-lg-4 col-sm-4 col-md-4">
                    <button class="btn btn-secondary">Search</button>
                </div>
            </div>
        </form>
        <table class="table table-responsive-sm table-responsive-lg table-responsive-md table-striped mt-3">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Query</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @for($i = 0; $i < $nOfQueries; $i++)
                    <tr>
                        <th scope="row">{{$i + 1}}</th>
                        <td> {{$queries[$i]->first_name}}</td>
                        <td> {{$queries[$i]->last_name}}</td>
                        <td> {{$queries[$i]->email}}</td>
                        <td> {{$queries[$i]->phone}}</td>
                        <td> {{$queries[$i]->msg}}</td>
                        <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#queryDeleteModal">
                                Mark as resolved
                            </button></td>
                    </tr>
                @endfor
            </tbody>
        </table>
        {{ $queries->links() }}
    </div>
@endsection
