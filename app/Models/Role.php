<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {
    
    public $timestamps = false;
    
    protected $fillable = [
        'slug'
    ];

    public function users() {
        return $this->belongToMany('App\Models\User', 'role_user', 'role_id', 'user_id');
    }

}
