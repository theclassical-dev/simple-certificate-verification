<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\User as Authenticatable;

// class Admin extends Authenticatable
// {
//     protected $table = 'admin';

//     protected $guard = 'admin';

//     protected $fillable = [
//         'name','role','email', 'password',
//     ];

//     protected $hidden = [
//         'password', 'remember_token',
//     ];
    
// }


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin';
    
}
