<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $guarded = [
        'nama_semester',
        'tahun_ajaran',
       
    ];
    
    public function mapel(){
        return $this->hasMany(Mapel::class);
    }
}
