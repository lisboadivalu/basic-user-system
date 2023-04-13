<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable =
    [
        'user_id',
        'title',
        'content',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function scopePosts(int $userId) {
        $post = DB::table('posts');
        return $post->where('user_id', '=', $userId)->get();
    }
}
