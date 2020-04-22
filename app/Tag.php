<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    public function getRouteKeyName() {
        return 'url';
    }

    public function posts() {
        return $this->belongsToMany(Post::class);
    }
}
