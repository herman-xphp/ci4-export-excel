<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSiswa extends Model
{
    protected $table            = 'siswas';
    protected $primaryKey       = 'nis';
    protected $allowedFields    = ['nama_siswa', 'alamat'];
}
