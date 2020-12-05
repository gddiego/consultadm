@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Adicionar Agendamentos</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>Z
      </div><br />
    @endif
    <form method="post" action="{{ route('agendamentos.store') }}">
        @csrf

        <div class="form-group col-md-4">
            <label for="inputState">Selecione Medico</label>
            <select name="medico_id" class="form-control">
              <option selected>Choose...</option>
              @foreach($medicos as $value)
                    <option {{$value->id ? 'selected' : '' }}  value="{{ $value->id }}">{{$value->nome}}</option>
                  @endforeach
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">Selecione Paciente</label>
            <select name="paciente_id" class="form-control">
              <option selected>Choose...</option>
              @foreach($pacientes as $value)
                    <option {{$value->id ? 'selected' : '' }}  value="{{ $value->id }}">{{$value->nome}}</option>
                  @endforeach
            </select>
          </div>
        <div class="form-group  col-md-4">
            <label for="crm">Informe data:</label>
            <input type="date" class="form-control" name="data"/>
        </div>
        <button type="submit" class="btn btn-primary-outline">Salvar </button>
    </form>


      @endsection
