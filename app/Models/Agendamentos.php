<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamentos extends Model
{
    use HasFactory;

    protected $fillable = ['horario'];
    protected $guarded = ['id', 'created_at ', 'update_at'];
    protected $table = 'agendamentos';
}
