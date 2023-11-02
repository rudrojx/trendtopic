<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogimage extends Model
{
    use HasFactory;
    protected $table = "blogimages";
    protected $primaryKey = "img_id";

    public function blogdata()
    {
        return $this->belongsTo(blogdata::class);
    }
}
