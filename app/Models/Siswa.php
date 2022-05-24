<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'nisn',
        'nis',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'alamat',
        'sekolah',
        'jurusan_id',
        'status',
        'no_telepon_siswa',
        'foto_siswa',
        'nama_ayah',
        'nama_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'alamat_ortu',
        'no_telepon_ortu',
        'nama_wali',
        'pekerjaan_wali',
        'alamat_wali',
        'no_telepon_wali',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
    
    public function mapel(){
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimestamps();
    }
    public function kelas()
    {
        return $this->belongsToMany(Kelas::class);
    }
}
