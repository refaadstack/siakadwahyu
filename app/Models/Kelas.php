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

    public function semester(){
        return $this->belongsTo(Semester::class);
    }

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class)->withPivot('kelas_id','siswa_id')->withTimestamps();
    }
    public function scopeSearch($query, $name)
    {
        return $query->where('name', 'LIKE', "%{$name}%");
    }
    
}
