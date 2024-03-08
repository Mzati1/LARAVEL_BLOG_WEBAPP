<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'body',
        'active',
        'published_at',
        'user_id'
    ];

    protected $casts = [
        'published_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(ModelsUser::class);
    }

    public function categories()
    {
        return $this->belongsToMany(category::class);
    }

    public function shortBody(): string
    {
        return Str::words(strip_tags($this->body), 30);
    }

    public function getFormattedDate()
    {
        return $this->published_at->format('F jS y');
    }

    public function getThumbnail()
    {
        if (str_starts_with($this->thumbnail, 'http')) {
            return $this->thumbnail;
        } else {
            return '/storage/' . $this->thumbnail;;
        }
    }
}
