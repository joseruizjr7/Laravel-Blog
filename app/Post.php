<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['published_at'];
    protected $fillable = ['title'];

    public function getRouteKeyName() {
        return 'url';
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function photos() {
        return $this->hasMany(Photo::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function scopeAllowed($query) {
        if (auth()->user()->hasRole('Admin')) {
            return $query;
        }

        return $query->where('user_id', auth()->id());
    }
}
