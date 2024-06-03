<?php

namespace App\Models;

use Phenomine\Support\Database\Mirage\Model;

class Post extends Model {

    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
