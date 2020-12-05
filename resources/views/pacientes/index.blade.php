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
    <a  type="button" class="btn btn-primary"  href="{{ route('pacientes.create')}}" >Novo</a>
    </div>
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Pacientes</h1>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>nome</td>
          <td>telefone</td>
          <td>email</td>
          <td>cpf</td>
          <td colspan = 2>Ações</td>
        </tr>
    </thead>
    <tbody>
        @foreach($pacientes as $paciente)
        <tr>
            <td>{{$paciente->id}}</td>
            <td>{{$paciente->nome}} {{$paciente->sobrenome}}</td>
            <td>{{$paciente->telefone}}</td>
            <td>{{$paciente->email}}</td>
            <td>{{$paciente->cpf}}</td>
            <td>
                <a href="{{ route('pacientes.edit',$paciente->id)}}" class="btn btn-primary">Editar</a>
            </td>
            <td>
                <form action="{{ route('pacientes.destroy', $paciente->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Remover</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection
