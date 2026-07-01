@extends('layouts.app')
@section('content')
<div class="container">
@if (Session::has('mensjae'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong>Mensjae:</strong> {{ Session::get('mesnaje') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<form action="{{ route('rentas.store') }}"  method="POST" enctype="multipart/form-data">
@csrf
@include('rentas.form')
</form>
</div>
@endsection
