<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $guarded = ['id'];

    public function alphabets(){
        return $this->belongsToMany(
            Alphabet::class,
            'alphabets_rules')->withTimestamps();
    }
}
