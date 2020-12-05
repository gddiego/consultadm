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
    <a  type="button" class="btn btn-primary"  href="{{ route('medicos.create')}}" >Novo</a>
    </div>
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Medicos</h1>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>nome</td>
          <td>telefone</td>
          <td>email</td>
          <td>cpf</td>
          <td>crm</td>
          <td colspan = 2>Ações</td>
        </tr>
    </thead>
    <tbody>
        @foreach($medicos as $medico)
        <tr>
            <td>{{$medico->id}}</td>
            <td>{{$medico->nome}} {{$medico->sobrenome}}</td>
            <td>{{$medico->telefone}}</td>
            <td>{{$medico->email}}</td>
            <td>{{$medico->cpf}}</td>
            <td>
                <a href="{{ route('medicos.edit',$medico->id)}}" class="btn btn-primary">Editar</a>
            </td>
            <td>
                <form action="{{ route('medicos.destroy', $medico->id)}}" method="post">
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
