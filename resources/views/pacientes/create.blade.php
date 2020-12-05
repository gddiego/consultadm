@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Adicionar Pacientes</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('pacientes.store') }}">
          @csrf
          <div class="form-group">
              <label for="nome">Nome:</label>
              <input type="text" class="form-control" name="nome"/>
          </div>

          <div class="form-group">
              <label for="sobrenome">SobreNome:</label>
              <input type="text" class="form-control" name="sobrenome"/>
          </div>

          <div class="form-group">
              <label for="telefone">Telefone:</label>
              <input type="tel" class="form-control" name="telefone"/>
          </div>
          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="cpf">CPF:</label>
              <input type="text" class="form-control" name="cpf"/>
          </div>

          <button type="submit" class="btn btn-primary-outline">Adicionar Novo</button>
      </form>
  </div>
</div>
</div>
@endsection
