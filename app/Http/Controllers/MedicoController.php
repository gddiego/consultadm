<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medico::all();

        return view('medicos.index')->with(compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicos.create');
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

        $request->validate([
            'nome' => 'required',
            'sobrenome' => 'required',
            'cpf' => 'required',
            'crm' => 'required',

        ]);
        $medico = new Medico;
        $medico->nome        = $request->get('nome');
        $medico->sobrenome = $request->get('sobrenome');
        $medico->email    = $request->get('email');
        $medico->telefone    = $request->get('telefone');
        $medico->cpf       = $request->get('cpf');
        $medico->crm       = $request->get('crm');
        $medico->save();
        return redirect()->route('medicos.index')->with('message', 'Medico cadastrado com sucesso!');
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
        $paciente = Medico::find($id);
        return view('pacientes.edit', compact('paciente'));
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

        $request->validate([
            'nome' => 'required',
            'sobrenome' => 'required',
            'cpf' => 'required',
            'crm' => 'required'
        ]);

        $medico = Medico::find($id);
        $medico->nome =  $request->get('nome');
        $medico->sobrenome = $request->get('sobrenome');
        $medico->telefone = $request->get('telefone');
        $medico->cpf = $request->get('cpf');
        $medico->crm = $request->get('crm');
        $medico->save();

        return redirect('/medicos')->with('success', 'Medico Atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medico = Medico::find($id);
        $medico->delete();

        return redirect('/medicos')->with('success', 'Medicos deletado!');
    }

    public function listMedicos()
    {
        $dados = DB::table('medicos')->orderBY('id')->get();

        return response()->json($dados);
    }
}
