@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard cadastros de pacientes, Medicos  e Agendamentos') }}</div>
                <ul class="nav justify-content-center">

                    <li class="nav-item">
                        <a class="nav-link" href="/pacientes">{{ __('Pacientes') }}</a>
                    </li>
                    <li class="nav-item">

                        <a class="nav-link" href="/medicos">{{ __('Medicos') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/agendamentos">{{ __('Agendamentos') }}</a>
                    </li>
                  </ul>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Voce está logado!') }}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
