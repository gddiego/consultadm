@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a contact</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form method="post" action="{{ route('agendamentos.store') }}">
            @csrf
            </div>
            <div class="form-group">
                <label for="job_title">Selecione Medico:</label>
                <select  name="medico_id" class="form-control form-control-sm">
                  <option>Sel</option>
                  @foreach($medicos as $value)
                    <option {{$value->id ? 'selected' : '' }}  value="{{ $value->id }}">{{$value->nome}}</option>
                  @endforeach
                </select>

                {{-- <select name="pacientes[]" multiple="multiple" class="form-control">

                </select> --}}
            </div>

            <div class="form-group">
              <label for="job_title">Selecione Paciente:</label>
              <select  name="paciente_id" class="form-control form-control-sm">
                  <option>Selecione</option>
                  @foreach($pacientes as $value)
                    <option {{$value->id ? 'selected' : '' }}  value="{{ $value->id }}">{{$value->nome}}</option>
                  @endforeach
                </select>
          </div>

          <div class="form-group">
              <label for="job_title">Informe uma Data:</label>
              <div class="col-10">
                  <input class="form-control" type="date"  name="data" id="example-date-input">
                </div>
          </div>
            <button type="submit" class="btn btn-primary-outline">Adicionar</button>
        </form>

    </div>
</div>
@endsection
