@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="d-flex justify-content-center">
      <a class="btn btn-primary mb-4" href="{{route('admin.tags.create')}}">Crea tag</a>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">nome</th>
          <th scope="col">colore</th>
          <th class="text-center" scope="col">bottoni</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        @foreach ($tags as $tag)
        <tr>
          <th scope="row">{{$tag->id}}</th>
          <td>{{$tag->label ?? 'Nessuna'}}</td>
          <td>
            <div class="square" style='background-color:{{$tag->color}}'></div>
          </td>
          <td class="text-center">
            <a class="btn btn-primary btn-sm" href="{{route('admin.tags.show', $tag)}}">
              <i class="fa-regular fa-eye"></i>
            </a>
            <a class="btn btn-warning btn-sm" href="{{route('admin.tags.edit', $tag)}}">
              <i class="fa-regular fa-pen-to-square"></i>
            </a>
            <form class="d-inline-block delete-form" action="{{route('admin.tags.destroy', $tag)}}" method="POST">
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