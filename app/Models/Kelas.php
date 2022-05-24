<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    

    protected $guarded = [];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class)->withPivot('kelas_id','siswa_id')->withTimestamps();
    }
    
}
