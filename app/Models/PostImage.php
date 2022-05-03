<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PostImage extends Model
{
    use HasFactory;

    protected $fillable = ["image", "post_id", "social_media_id"];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
    public function social_media()
    {
        return $this->belongsTo(SocialMedia::class, 'social_media_id', 'id');
    }
    public function getImageAttribute($value)
    {
        return url('storage/' . $value);
    }
    public function deleteImage()
    {
        Storage::disk('public')->delete($this->attributes['image']);
    }
}
