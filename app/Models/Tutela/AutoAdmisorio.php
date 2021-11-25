<?php

namespace App\Models\Tutela;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AutoAdmisorio extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'auto_admisorio';
    protected $guarded = [];
}
