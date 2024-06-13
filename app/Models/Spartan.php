<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spartan extends Model {
    use HasFactory;

    protected $fillable = ['name', 'pv', 'weight', 'height'];

    public function types() {
        return $this->belongsToMany(Type::class);
    }

    public function attacks() {
        return $this->belongsToMany(Attack::class);
    }
}
