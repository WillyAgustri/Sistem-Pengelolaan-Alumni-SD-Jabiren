<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    protected $table = 'tahuns';
    protected $primaryKey = 'id_tahun';
    use HasFactory;



    public function alumni(){
        return $this->hasMany(Alumnus::class, 'id_tahun');
    }

}
