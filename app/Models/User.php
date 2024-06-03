<?php

namespace App\Models;

use Phenomine\Support\Database\Mirage\Model;
use Phenomine\Support\Database\Traits\HasUuids;
use Phenomine\Support\Str;

class User extends Model {
    use HasUuids;
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    protected $hidden = [
        'password'
    ];

    public function getNameAttribute($value) {
        return Str::toUpper($value);
    }

    public function setNameAttribute($value) {
        return Str::toLower($value);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

}
