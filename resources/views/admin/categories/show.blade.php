@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="category">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-12">
            <div class="card-body">
              <h5 class="card-title"><strong>Nome: </strong>{{$category->label}}</h5>
              <p class="card-text">{{$category->color}}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-between">
        <div>
          <a class="btn btn-secondary" href="{{route('admin.categories.index')}}">
            <i class="fa-solid fa-rotate-left mr-2"></i>Torna indietro
          </a>
        </div>
        <div>
          <a class="btn btn-warning" href="{{route('admin.categories.edit', $category)}}">
            <i class="fa-regular fa-pen-to-square"></i>Modifica
          </a>
          <form class="d-inline-block delete-form" action="{{route('admin.categories.destroy', $category)}}" method="POST">
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