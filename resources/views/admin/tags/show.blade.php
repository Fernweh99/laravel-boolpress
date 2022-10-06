@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="tag">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-12">
            <div class="card-body">
              <h5 class="card-title"><strong>Nome: </strong>{{$tag->label}}</h5>
              <p class="card-text">{{$tag->color}}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-between">
        <div>
          <a class="btn btn-secondary" href="{{route('admin.tags.index')}}">
            <i class="fa-solid fa-rotate-left mr-2"></i>Torna indietro
          </a>
        </div>
        <div>
          <a class="btn btn-warning" href="{{route('admin.tags.edit', $tag)}}">
            <i class="fa-regular fa-pen-to-square"></i>Modifica
          </a>
          <form class="d-inline-block delete-form" action="{{route('admin.tags.destroy', $tag)}}" method="POST">
            @method('DELETE')
            @csrf  
            <button type="submit" class="btn btn-danger">
              <i class="fa-solid fa-trash"></i>Elimina
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection