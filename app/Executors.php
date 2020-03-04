<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Executors extends Model
{
    protected $table = 'executors';
    public function tasks()
    {
        return $this->belongsToMany(Tasks::class);
    }
}
