@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <h2>Nuovo Tag:</h2>
      @include('includes.admin.tags.form')
  </div>
</div>
@endsection