<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    use HasFactory;

    Protected $fillable = ['title', 'password', 'url', 'username', 'note'];

    public function teams()
    {
        return $this->morphedByMany(Team::class, 'passwordable');
    }

    public function users()
    {
        return $this->morphedByMany(User::class,'passwordable');
    }
}
