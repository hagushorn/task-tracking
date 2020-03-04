<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tasks;
class Executors extends Model
{
    protected $table = 'executors';
    public function tasks()
    {
        return $this->belongsToMany(Tasks::class);
    }
}
