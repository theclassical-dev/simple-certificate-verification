<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $table = 'certificates';
    // protected $table = 'test';

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_name', 'user_name');
    }

}
