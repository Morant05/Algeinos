@extends('public.layouts.app')

@section('content')
    <div class="px-4 my-5 text-center">
        <h1 class="display-6 fw-bold mb-4">
            @lang('public.verificar_mail.titulo')
        </h1>
        <div class="col-lg-12 mx-auto">
            <p class="lead mb-3">
                @lang('public.verificar_mail.mensaje')
            </p>
            <p class="lead mb-3">
                @lang('public.verificar_mail.texto_reenviar')
            </p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-4">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-lg px-4 gap-3">
                        @lang('public.verificar_mail.enlace')
                    </button>
                </form>
            </div>
        </div>
        <div class="col-lg-8 mx-auto">
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    @lang('public.verificar_mail.notificacion')
                </div>
            @endif
        </div>
    </div>
@endsection
