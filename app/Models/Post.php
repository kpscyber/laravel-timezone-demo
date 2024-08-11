<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Whitecube\LaravelTimezones\Casts\TimezonedDatetime;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'published_up',
        'published_down',
    ];

    protected $casts = [
        'published_up' => TimezonedDatetime::class,
        'published_down' => TimezonedDatetime::class,
        'created_at' => TimezonedDatetime::class,
        'updated_at' => TimezonedDatetime::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
