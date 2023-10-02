@props([
    'imgPath' => '',
    'title' => '',
    'text' => '',
    'id' => '',
    'firstBtn' => '',
    'secondBtn' => ''
]
)
<div class="card shadow-md">
    <img src="{{ $imgPath }}" class="card-img-top" alt="Medicine Image">
    <div class="card-body">
        <h5 class="card-title">{{ $title }}</h5>
        <p class="card-text truncate-overflow">{{ $text }}</p>
        <div class="d-flex justify-content-between align-items-center">
            <div class="">
                <a type="button" href="medicines/edit/{{$id}}" class="btn btn-sm btn-outline-secondary">{{ $firstBtn }}</a>
                <a type="button" href=medicines/delete/{{$id}}" class="btn btn-sm btn-outline-danger">{{ $secondBtn }}</a>
            </div>
        </div>
    </div>
</div>
