@if($errors->any())
<div class="alert alert-danger" role="alert">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif

@if($tag->exists)
<form action="{{route('admin.tags.update', $tag)}}" method="POST">
  @method('PUT')
@else
<form action="{{route('admin.tags.store')}}" method="POST">
@endif
  @csrf 
    <div class="row mb-3">
      <label for="label" class="col-sm-2 col-form-label">Nome</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="label" name="label" value="{{old('label', $tag->label)}}">
      </div>
      <label for="color" class="col-sm-2 col-form-label">Colore</label>
      <div class="col-sm-4">
        <input type="color" class="form-control" id="color" name="color" value="{{old('color', $tag->color)}}">
      </div>
    </div>
    <div class="d-flex justify-content-between mb-3">
      <a class="btn btn-secondary" href="{{route('admin.tags.index')}}">
        <i class="fa-solid fa-rotate-left mr-2"></i>Torna indietro
      </a>
      <button class="btn btn-success" type="submit">Salva</button>
    </div>
</form>