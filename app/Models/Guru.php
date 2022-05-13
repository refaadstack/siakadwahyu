<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'walikelas', 'nama', 'nip', 'nik', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'agama', 'alamat', 'no_telepon', 'foto_guru', 'jenjang', 'jurusan'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
    

}
