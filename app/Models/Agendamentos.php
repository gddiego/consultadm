<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamentos extends Model
{
    use HasFactory;

    protected $fillable = ['nome_medico', 'nome_paciente', 'data'];
    protected $guarded = ['id', 'created_at ', 'update_at'];
    protected $table = 'agendamentos';
}
