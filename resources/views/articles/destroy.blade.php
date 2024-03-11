<form action="/articles/{{$article->id}}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-link link-danger"><i class="bi bi-trash3"></i></button>
</form>
