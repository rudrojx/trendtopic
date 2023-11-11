<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogdata extends Model
{
    use HasFactory;
    protected $table = "blogdatas";
    protected $primaryKey = "blog_id";
    public function trendcategory()
    {
        return $this->belongsTo(trendcategory::class, 'cat_id', 'cat_id');
    }

    public function blogimages()
    {
        return $this->hasMany(blogimage::class,'blog_id', 'blog_id');
    }

}
