<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogcomment extends Model
{
    use HasFactory;
    protected $table = "blogcomments";
    protected $primaryKey = "post_id";
    protected $fillable = ['username', 'userid', 'comment', 'blog_id'];
}
