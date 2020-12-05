<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::all();

        return view('pacientes.index')->with(compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.create');
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
            
        ]);
        $paciente = new Paciente;
        $paciente->nome        = $request->get('nome');
        $paciente->sobrenome = $request->get('sobrenome');
        $paciente->email    = $request->get('email');
        $paciente->telefone    = $request->get('telefone');
        $paciente->cpf       = $request->get('cpf');
        $paciente->save();
        return redirect()->route('pacientes.index')->with('message', 'Paciente cadastrado com sucesso!');
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
        $paciente = Paciente::find($id);
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
            'cpf' => 'required'
        ]);

        $paciente = Paciente::find($id);
        $paciente->nome =  $request->get('nome');
        $paciente->sobrenome = $request->get('sobrenome');
        $paciente->telefone = $request->get('telefone');
        $paciente->email = $request->get('email');
        $paciente->cpf = $request->get('cpf');
        $paciente->save();

        return redirect('/pacientes')->with('success', 'Paciente Atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paciente = Paciente::find($id);
        $paciente->delete();

        return redirect('/pacientes')->with('success', 'Paciente deletado!');
    }
}
