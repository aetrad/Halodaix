<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spartan extends Model {
    use HasFactory;

    protected $fillable = ['name', 'pv', 'weight', 'height', 'image'];

    public function types() {
        return $this->belongsToMany(Type::class, 'spartan_type');
    }

    public function attacks() {
        return $this->belongsToMany(Attack::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
