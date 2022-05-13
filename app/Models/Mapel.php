<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_mapel', 'nama_mapel', 'semester_id','status'
    ];

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class);
    }
    public function semester(){
        return $this->belongsTo(Semester::class);
    }

}
