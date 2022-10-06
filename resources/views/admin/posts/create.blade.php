@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <h2>Nuovo Post:</h2>
      @include('includes.admin.posts.form')
  </div>
</div>
@endsection