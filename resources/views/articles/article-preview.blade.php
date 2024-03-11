@extends('main.index')

@section('content')

<div class="container card">
    <div class="row">
        <div class="col-lg-12 p-2">
            <div class="d-flex align-items-center">
                <h1>{{$article->name}}</h1> 
            </div>
            <div class="me-4">Category: <h4 class="me-4">{{$article->categ_name}}</h4></div>
            <div class="d-flex justify-content-between">
                <div>
                    <p class="card-text">
                        <small class="text-body-secondary">
                        Created {{date('d-m-Y', strtotime($article->created_at));}}
                        </small>
                    </p>
                </div>
                <div>
                    <p class="card-text">
                        <small class="text-body-secondary">
                            Last updated {{date('d-m-Y', strtotime($article->updated_at));}}
                        </small>
                    </p>
                </div>
            </div>
            <img class="float-end mt-2 ms-3 w-50" src="{{$article->artic_bild}}" alt="image">
            <p class="card-text  mt-3">
                {{$article->artic_desc}}
            </p>
        </div>
    </div>
</div>

@endsection