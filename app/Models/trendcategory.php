<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trendcategory extends Model
{
    use HasFactory;
    protected $table = "trendcategories";
    protected $primaryKey = "cat_id";
    protected $fillable = ['category_name'];

    public function blogdata()
    {
        return $this->hasMany(blogdata::class, 'cat_id', 'cat_id');
    }
}
