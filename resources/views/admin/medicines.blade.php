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
    <script>
        function showDeleteModal(obj){
            document.getElementById('modalDeleteBtn').setAttribute('value',obj.value);
        }
    </script>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
@endsection
@section('body')
    <x-admin.dark-navbar/>
    @php
        use App\Models\Medicine;
        use Illuminate\Http\Request;
        $medicines = Medicine::paginate(12);

     @endphp
    <div class="modal fade" id="queryDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete medicine</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 class="">Are you sure you want to delete this medicine?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="modalDeleteBtn" >Yeah</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @if($medicines->count() == 0)
        <div class="container text-center mt-4">
            <h1 class="display-6">No medicines added</h1>
            <a href="{{ route('admin-medicine-add-get') }}" class="btn btn-md btn-primary mt-2">Click here to add</a>
        </div>
    @endif

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
    <script>
        let deleteModalBtn = document.getElementById('modalDeleteBtn');

        deleteModalBtn.addEventListener('click',()=>{
            let host = window.location.protocol + "//" + window.location.host;
            let urlEndPoint = host + "/" + "admin/medicines/delete/" + deleteModalBtn.value;
            console.log(urlEndPoint);
            window.location.replace(urlEndPoint);
        });
    </script>
@endsection
