<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cert extends Model
{
    use HasFactory;


    protected $fillable = ['user_id','cert_id','name','department','date','status'];

    public function user(){
        return $this->belongsTo(User::class,'user_id', 'user_id');
    }
}
