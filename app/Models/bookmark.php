<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookmark extends Model
{
    use HasFactory;
    protected $table = "bookmarks";
    protected $primaryKey = "bookmark_id";
    protected $fillable = [ 'userid', 'blog_id'];

    public function user()
    {
        return $this->belongsTo(TrendUsers::class);
    }

    public function blogdata()
    {
        return $this->belongsTo(blogdata::class,'blog_id', 'blog_id');
    }
}
