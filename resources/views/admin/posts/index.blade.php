@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="d-flex justify-content-center">
      <a class="btn btn-primary mb-4" href="{{route('admin.posts.create')}}">Crea Post</a>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">title</th>
          <th scope="col">author</th>
          <th scope="col">category</th>
          <th scope="col">tags</th>
          <th scope="col">created_at</th>
          <th scope="col">last_update</th>
          <th scope="col">bottoni</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        @foreach ($posts as $post)
        <tr>
          <th scope="row">{{$post->id}}</th>
          <td>{{$post->title}}</td>
          <td>{{$post->user->name ?? 'anonimo'}}</td>
          <td>{{$post->category->label ?? 'Nessuna'}}</td>
          <td>
            @forelse ($post->tags as $tag)
            <span class="badge badge-pill" style="background-color: {{$tag->color}}">{{$tag->label}}</span> 
            @empty
              Nessuno
            @endforelse
                
          </td>
          <td>{{$post->created_at}}</td>
          <td>{{$post->updated_at}}</td>
          <td>
            <a class="btn btn-primary btn-sm" href="{{route('admin.posts.show', $post)}}">
              <i class="fa-regular fa-eye"></i>
            </a>
            <a class="btn btn-warning btn-sm" href="{{route('admin.posts.edit', $post)}}">
              <i class="fa-regular fa-pen-to-square"></i>
            </a>
            <form class="d-inline-block delete-form" action="{{route('admin.posts.destroy', $post)}}" method="POST">
              @method('DELETE')
              @csrf  
              <button type="submit" class="btn btn-danger btn-sm">
                <i class="fa-solid fa-trash"></i>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection