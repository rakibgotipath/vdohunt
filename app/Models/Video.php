<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thumbnail()
    {
        return 'https://'.config('video.pull_zone_id').'.b-cdn.net/'.$this->bunny_id.'/thumbnail.jpg';
    }
}
