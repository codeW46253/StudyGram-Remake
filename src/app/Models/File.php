<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'post_id',
        'file_path',
        'mime_type',
        'file_size',
        'original_name',
    ];

    public function post() {
        return $this->belongsTo(Post::class);
    }
}
