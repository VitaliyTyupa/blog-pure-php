@extends('main.index')

@section('content')

<div class="container d-flex justify-content-between align-items-center">
   <div class="d-flex justify-content-around align-items-center">
        <h1>
            Articles 
        </h1>
        <div class="dropdown ms-3">
            <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                @if (isset($selected_category))
                Filtered by '{{$selected_category->categ_name}}'                
                @else
                Filter by Category
                @endif
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/articles">All Categories</a></li>
                @foreach ($categories as $category)
                <li><a class="dropdown-item" href="/articles?category={{$category->id}}">{{$category->categ_name}}</a></li>
                @endforeach
            </ul>
          </div>
   </div>
   <a href="/articles/create" type="button" class="btn btn-outline-primary">+ Article</a>
</div>
<hr class="border border-primary border-3 opacity-75">

<div class="container overflow-hidden text-center d-flex flex-wrap justify-content-around g-1">
    
    @foreach ($articles as $article)
        
        <div class="card border-secondary mb-3" style="max-width: 12rem;">
            <div class="card-header bg-transparent border-secondary ">
                <a href="/articles/{{$article->id}}">
                    <h6 class="card-title">{{$article->name}}</h6>
                </a>
            </div>
            <div class="card-body text-secondary">
            <img src="{{$article->artic_tn_bild}}" class="card-img-top" alt="image">
        
            </div>
            <div class="card-footer bg-transparent border-secondary d-flex justify-content-around">
                <a href="/articles/{{$article->id}}/edit" class="btn btn-link link-primary"><i class="bi bi-pencil"></i></a>
                @include('articles.destroy')
            </div>
        </div>

    @endforeach
</div>

@endsection

