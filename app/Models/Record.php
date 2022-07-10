<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $table = 'records';
    // protected $table = 'test';

    protected $guarded = [];

    public function attendance(){
        return $this->hasMany(Attendance::class, 'record_id', 'record_id');
    }

}
