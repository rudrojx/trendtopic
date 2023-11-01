<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contactquerys extends Model
{
    use HasFactory;
    protected $table = "contactquerys";
    protected $primaryKey = "id";
    protected $fillable = ['name', 'email', 'message', 'subject'];
}
