@if($errors->any())
<div class="alert alert-danger" role="alert">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif

@if($post->exists)
<form action="{{route('admin.posts.update', $post)}}" method="POST">
  @method('PUT')
@else
<form action="{{route('admin.posts.store')}}" method="POST">
@endif
  @csrf 
    <div class="row mb-3">
      <label for="title" class="col-sm-2 col-form-label">Titolo</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="title" name="title" value="{{old('title', $post->title)}}">
      </div>
      <label for="category_id" class="col-sm-2 col-form-label">Category</label>
      <div class="col-sm-3">
        <select class="custom-select" name="category_id" id="category_id">
          <option value="">Nessuna</option>
          @foreach($categories as $category)
          <option @if(old('category_id', $post->category->id ?? '0') == $category->id) selected @endif value="{{$category->id}}">{{$category->label}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="row mb-3">

      @if (count($tags))
      <fieldset class="col-12">
        <h4>Tags:</h4>

        @foreach ($tags as $tag)
        <div class="form-check form-check-inline">
          <input class="form-check-input" 
          @if (in_array($tag->id, old('tag', $tags_ids))) checked @endif 
          type="checkbox" 
          id="tag-{{ $tag->label }}" 
          name="tag[]" 
          value="{{ $tag->id }}">
          <label class="form-check-label" for="tag-{{ $tag->label }}">{{ $tag->label }}</label>
        </div>
        @endforeach

      </fieldset>
      @endif

    </div>
    <div class="row mb-3 align-items-center">
      <label for="image" class="col-sm-2 col-form-label">Url Img</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="image" name="image" value="{{old('image', $post->image)}}">
      </div>
      <div class="preview col-sm-2">
        <img class="img-fluid" src="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg?20200913095930" alt="placeholder">
      </div>
    </div>
    <div class="row mb-3">
      <label for="content" class="col-sm-2 col-form-label">Testo del post</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="content" name="content" rows="3">{{old('content', $post->content)}}</textarea>
      </div>
    </div>
    <div class="d-flex justify-content-between mb-3">
      <a class="btn btn-secondary" href="{{route('admin.posts.index')}}">
        <i class="fa-solid fa-rotate-left mr-2"></i>Torna indietro
      </a>
      <button class="btn btn-success" type="submit">Salva</button>
    </div>
</form>