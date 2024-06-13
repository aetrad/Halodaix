<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model {
    use HasFactory;

    protected $fillable = ['name', 'color', 'image'];

    public function spartans() {
        return $this->belongsToMany(Spartan::class);
    }

    public function attacks() {
        return $this->hasMany(Attack::class);
    }
}

