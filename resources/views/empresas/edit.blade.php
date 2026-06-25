@extends('layouts.app')
@section('content')
<div class="container">
    {{-- Mensaje de sesión --}}
    @if (Session::has('mensaje'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Mensaje:</strong> {{ Session::get('mensaje') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form action="{{ route('empresas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @Method('PUT')
        @include('empresas.form')
    </form>
</div>
@endsection