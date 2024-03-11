@extends('main.index')

@section('content')
<form class="container" action="/articles/{{$article->id}}" method="post">
    @csrf
    @method('PUT')
    <h1>Edit Article</h1>
    @if ($errors->any())
    <div class="border border-danger">
        <div class="h4 pb-2 mb-4 text-danger border-bottom border-danger">
            Something went wrong. Please, check fields.
          </div>
        <ul class="text-danger">
            @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <input type="hidden" name="id" value="{{$article->id}}">
    <div class="mb-3">
      <label for="title" class="form-label">Article name</label>
      <input type="text" class="form-control" id="title" placeholder="Add article title" name="name" value="{{$article->name ?? ''}}">
    <div class="mb-3">
      <label for="category" class="form-label">Category</label>
      <select class="form-select" id="category" aria-label="category" name="artic_categ_id_ref" value="{{$article->artic_categ_id_ref ?? ''}}">
       @foreach ($categories as $category)
       <option value="{{$category->id}}" 
        @if ($category->id === $article->artic_categ_id_ref) selected @endif>
        {{$category->categ_name}}
      </option>
       @endforeach
      </select>
    </div>
  
    <div class="mb-3">
      <label for="image" class="form-label">Image</label>
      <input type="text" class="form-control" id="image" placeholder="Add images link" name="artic_bild" value="{{$article->artic_bild ?? ''}}">
    </div>
    <div class="mb-3">
      <label for="thumbnail" class="form-label">Thumbnail</label>
      <input type="text" class="form-control" id="thumbnail" placeholder="Add thumbnail link" name="artic_tn_bild" value="{{$article->artic_tn_bild ?? ''}}">
    </div>
    <div class="mb-3">
      <label for="content" class="form-label">Article text</label>
      <textarea class="form-control" id="content" rows="10" name="artic_desc">{{$article->artic_desc ?? ''}}</textarea>
    </div>
    <div class="mb-3 d-flex justify-content-end gap-3">
      <input class="btn btn-primary" type="submit" value="Submit">
    </div>
  </form>
  
@endsection