@extends('base')
<div class="col-sm-12">

    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div>
    @endif
  </div>
@section('main')
<div>
    <a  href="{{ route('home')}}" >Voltar a home</a>
    <a  type="button" class="btn btn-primary"  href="{{ route('agendamentos.create')}}" >Novo</a>
    </div>
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Agendamentos</h1>
    <div class="container">
        @foreach($medicos as $medico)
        <div class="card  shadow p-3 mb-5 bg-white rounded mt-5" style="width: 18rem;">


                <span>Doutor</span>

                <span class="badge badge-primary"> {{$medico->nome}}</span>

                {{-- <a href="{{ route('agendamentos.edit',$medico->id)}}" class="btn btn-primary">Editar</a> --}}
        </div>
        @endforeach


        @foreach($pacientes as $paciente)
        <div class="card  shadow p-3 mb-5 bg-white rounded mt-5" style="width: 18rem;">
            <div class="card-body">
                <span>Paciente</span>
                <span class="badge badge-info">    {{$paciente->nome}}</span>

            {{date( 'd/m/Y' , strtotime($paciente->data))}}
            </div>
          </div>
        @endforeach
      </div>

<div>
</div>
@endsection
