@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Potvrdite Vašu email adresu') }}
                </div>
                <img width="400" class="m-auto" src="https://media.tenor.com/9Ez46wr-voMAAAAC/lock.gif" alt="">

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Novi link za verifikaciju je poslat na Vaš email.') }}
                    </div>
                    @endif

                    {{ __('Prije nego što nastavite, provjerite svoju e-poštu za link za verifikaciju.') }}
                    {{ __('Ako niste primili email') }},
                    <form class="d-inline" method="POST"
                          action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline shadow-none">{{
                            __('kliknite ovdje kako biste zatražili novi') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
