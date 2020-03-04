<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Executors;
class Tasks extends Model
{
    protected $table = 'tasks';
    public function executors()
    {
        return $this->belongsToMany(Executors::class);
    }
}
