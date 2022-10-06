@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <h2>Nuova Categoria:</h2>
      @include('includes.admin.categories.form')
  </div>
</div>
@endsection