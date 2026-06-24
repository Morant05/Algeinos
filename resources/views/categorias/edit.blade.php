@extends('layouts.app')
@section('content')
<div class="container">
    @if (Session::has('mensaje'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Mensaje:</strong> {{ Session::get('mensaje') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('categorias.form')
    </form>
</div>
@endsection
