<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'sobrenome', 'telefone', 'email', 'cpf', 'crm'];
    protected $guarded = ['id', 'created_at ', 'update_at'];
    protected $table = 'medicos';
}
