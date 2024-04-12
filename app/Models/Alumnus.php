<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Alumnus extends Authenticatable
{
    use HasFactory;

    protected $table = 'alumnis';
    protected $primaryKey = 'id_alumni';
    protected $guard = "alumnis";

    protected $fillable = [
        'name',
        'nisn',
        'j_kelamin',
        'tmpt_lahir',
        'tgl_lahir',
        'password',
        'lnjt_sklh',
    ];

    protected $hidden = [

        'password'
    ];
    protected $casts = [

        'password' => 'hashed',
    ];

    public function username()
    {
        return 'nisn';
    }


}
