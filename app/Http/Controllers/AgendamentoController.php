<?php

namespace App\Http\Controllers;

use App\Models\Agendamentos;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgendamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = DB::table('agendamentos')
            ->leftJoin('pacientes_consulta', 'agendamentos.id', '=', 'agendamentos.paciente_id')
            ->get();

        $medicos = DB::table('agendamentos')
            ->leftJoin('medicos', 'agendamentos.id', '=', 'agendamentos.medico_id')
            ->get();
        // dd($medicos);
        return view('agendamentos.index', compact('pacientes', 'medicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();
        return view('agendamentos.create', compact('pacientes', 'medicos'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $pacientes = Paciente::all();

        // $request->validate([
        //     'nome_medico' => 'required',
        //     'nome_paciente' => 'required',
        //     'data' => 'required',

        // ]);
        $medico = new Agendamentos;

        $medico->medico_id =  $request->get('medico_id');
        $medico->paciente_id = $request->get('paciente_id');
        $medico->data = $request->get('data');
        // dd($medico);

        $medico->save();
        // return view('agendamentos.index');
        return redirect()->route('agendamentos.index')->with('message', 'Medico cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $pacientes = Paciente::all();
        // $medicos = Medico::all();
        $agendamentos = Agendamentos::find($id);
        return view('agendamentos.index', compact('medicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $medico = Agendamentos::find($id);

        $medico->medico_id =  $request->get('medico_id');
        $medico->paciente_id = $request->get('paciente_id');
        $medico->data = $request->get('data');
        $medico->save();

        return redirect('/agendamentos')->with('success', 'Medico Atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medico = Agendamentos::find($id);
        $medico->delete();

        return redirect('/agendamentos')->with('success', 'Medicos deletado!');
    }

    // public function listMedicos()
    // {
    //     $dados = DB::table('medicos')->orderBY('id')->get();

    //     return response()->json($dados);
    // }
}
