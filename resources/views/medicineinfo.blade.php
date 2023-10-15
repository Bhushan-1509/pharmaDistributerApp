@extends('base')
@section('title','Medicines')
@section('stylesheets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{background-color: #ecedee}.card{border: none;overflow: hidden}.thumbnail_images ul{list-style: none;justify-content: center;display: flex;align-items: center;margin-top:10px}.thumbnail_images ul li{margin: 5px;padding: 10px;border: 2px solid #eee;cursor: pointer;transition: all 0.5s}.thumbnail_images ul li:hover{border: 2px solid #000}.main_image{display: flex;justify-content: center;align-items: center;border-bottom: 1px solid #eee;height: 400px;width: 100%;overflow: hidden;text-align: center}.heart{height: 29px;width: 29px;background-color: #eaeaea;border-radius: 50%;display: flex;justify-content: center;align-items: center}.content p{font-size: 12px}.ratings span{font-size: 14px;margin-left: 12px}.colors{margin-top: 5px}.colors ul{list-style: none;display: flex;padding-left: 0px}.colors ul li{height: 20px;width: 20px;display: flex;border-radius: 50%;margin-right: 10px;cursor: pointer}.colors ul li:nth-child(1){background-color: #6c704d}.colors ul li:nth-child(2){background-color: #96918b}.colors ul li:nth-child(3){background-color: #68778e}.colors ul li:nth-child(4){background-color: #263f55}.colors ul li:nth-child(5){background-color: black}.right-side{position: relative}.search-option{position: absolute;background-color: #000;overflow: hidden;align-items: center;color: #fff;width: 200px;height: 200px;border-radius: 49% 51% 50% 50% / 68% 69% 31% 32%;left: 30%;bottom: -250px;transition: all 0.5s;cursor: pointer}.search-option .first-search{position: absolute;top: 20px;left: 90px;font-size: 20px;opacity: 1000}.search-option .inputs{opacity: 0;transition: all 0.5s ease;transition-delay: 0.5s;position: relative}.search-option .inputs input{position: absolute;top: 200px;left: 30px;padding-left: 20px;background-color: transparent;width: 300px;border: none;color: #fff;border-bottom: 1px solid #eee;transition: all 0.5s;z-index: 10}.search-option .inputs input:focus{box-shadow: none;outline: none;z-index: 10}.search-option:hover{border-radius: 0px;width: 100%;left: 0px}.search-option:hover .inputs{opacity: 1}.search-option:hover .first-search{left: 27px;top: 25px;font-size: 15px}.search-option:hover .inputs input{top: 20px}.search-option .share{position: absolute;right: 20px;top: 22px}.buttons .btn{height: 50px;width: 150px;border-radius: 0px !important}
        img{
            width: 100%;
            object-fit: cover;
        }
        div#social-links {
            margin: 0 auto;
            max-width: 36.5vw;
        }
        div#social-links ul li {
            display: inline-block;
        }
        div#social-links ul li a {
            padding: 0.8vw;
            border: 1px solid #dedada;
            margin: 0.3vw;
            font-size: 1.5rem;
            color: #222;
            background-color: #ccc;
        }
        div#social-links ul li a img{
        }
    </style>
@endsection
@section('body')
    <x-assets.dark-navbar/>
    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="row g-0">
                <div class="col-md-6 border-end">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="main_image">
                            <img src="{{ asset($medicine->img_path) }}" id="ge" class="img-fluid" style="object-fit:contain;"></div>
                        <div class="thumbnail_images">
                            <ul id="thumbnail">
                            </ul>
                        </div>
                    </div>	</div>
                <div class="col-md-6">
                    <div class="p-3 right-side">
                        <div class="col-12 col-sm-12 col-md-12 mt-5 mb-5 text-center px-5">
                            {!! $shareComponent !!}
                        </div>
                        <div class="d-flex justify-content-between align-items-center">	<h3 class="display-6">{{ $medicine->medicine_name }}</h3>	<span class="heart"><i class='bx bx-heart'></i></span>	</div>
                        <div class="mt-2 pr-3 content">
                            <p style="font-size:1.1rem;">&nbsp;&nbsp;&nbsp;&nbsp;{{ $medicine->description }}</p>	</div>
                        <div class="ratings d-flex flex-row align-items-center">
                            <div class="d-flex flex-row">
                                <i class='bx bxs-star' ></i>
                                <i class='bx bxs-star' ></i>
                                <i class='bx bxs-star' ></i>
                                <i class='bx bxs-star' ></i>
                                <i class='bx bx-star' ></i>
                            </div>
                        </div>
                        <div class="mt-5"><div class="colors">	<ul id="marker">	<li id="marker-1"></li>	<li id="marker-2"></li>	<li id="marker-3"></li>	<li id="marker-4"></li>	<li id="marker-5"></li>	</ul>	</div>	</div>	<div class="buttons d-flex flex-row mt-5 gap-3">
                            <a class="btn btn-outline-dark" href="/medicines">More medicines</a>
                            <a class="btn btn-dark" href="{{ url()->previous() }}">Go back</a>	</div>

                        <div class="search-option">	<i class='bx bx-search-alt-2 first-search'></i>
                            <div class="inputs">
                                <input type="text" name="">
                            </div>	<i class='bx bx-share-alt share'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <x-assets.footer/>
@endsection
