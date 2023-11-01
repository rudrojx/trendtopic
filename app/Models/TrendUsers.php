<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TrendUsers extends Authenticatable
{
    use HasFactory;   
    protected $table = "trendusers";
    protected $primaryKey = "user_id";
    
    protected $fillable = ['google_id', 'name', 'email', 'google_token', 'user_id','github_id','github_token'];


}
