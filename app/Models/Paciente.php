<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;


    protected $fillable = ['nome', 'sobrenome', 'telefone', 'email', 'cpf'];
    protected $guarded = ['id', 'created_at ', 'update_at'];
    protected $table = 'pacientes_consulta';
}
