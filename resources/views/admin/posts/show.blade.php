@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="post">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="{{$post->image}}" class="img-fluid rounded-start" alt="{{$post->slug}}">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{$post->title}}</h5>
              <p class="card-text"><strong>Categoria: </strong>{{$post->category->label ?? 'Nessuna'}}</p>
              <p class="card-text"><strong>Tag:</strong>
                @forelse ($post->tags as $tag)
                  {{$tag->label}}
                @empty
                  -
                @endforelse
              </p>
              <p class="card-text">{{$post->content}}</p>
              <p class="card-text">Last Update: <small class="text-muted">{{$post->updated_at}}</small></p>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-between">
        <div>
          <a class="btn btn-secondary" href="{{route('admin.posts.index')}}">
            <i class="fa-solid fa-rotate-left mr-2"></i>Torna indietro
          </a>
        </div>
        <div>
          <a class="btn btn-warning" href="{{route('admin.posts.edit', $post)}}">
            <i class="fa-regular fa-pen-to-square"></i>Modifica
          </a>
          <form class="d-inline-block delete-form" action="{{route('admin.posts.destroy', $post)}}" method="POST">
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