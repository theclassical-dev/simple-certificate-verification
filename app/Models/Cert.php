<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cert extends Model
{
    use HasFactory;

    protected $fillable = ['cert_id', 'name','department','date','status'];
}
