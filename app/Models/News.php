<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model {

    protected $fillable = [
        'user_id', 'title', 'slug', 'content'
    ];

    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

}
