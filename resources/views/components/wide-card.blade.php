<div class="card shadow-md">
    <img src="{{ $imgPath }}" class="card-img-top object-fit-sm-cover object-fit-md-cover object-fit-sm-cover object-fit-xl-cover" alt="Medicine Image">
    <div class="card-body">
        <h5 class="card-title">{{ $title }}</h5>
        <p class="card-text truncate-overflow">{{ $text }}</p>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <a type="button" href="/medicines/{{$id}}" class="btn btn-sm btn-outline-secondary">{{ $btnName }}</a>
            </div>
        </div>
    </div>
</div>
