<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSiswa;

class Siswa extends BaseController
{
    public function __construct()
    {
        $this->siswa = new ModelSiswa();
    }

    public function index()
    {
        $data['Siswa'] = $this->siswa->findAll();
        echo view('data_siswa', $data);
    }

    public function simpanExcel()
    {
        $file_excel = $this->request->getFile('fileexcel');
        $ext = $file_excel->getClientExtension();
        if ($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $render->load($file_excel);
        $data = $spreadsheet->getActiveSheet()->toArray();
        foreach ($data as $x => $row) {
            if ($x == 0) {
                continue;
            }
            $nis = $row[0];
            $nama_siswa = $row[1];
            $alamat = $row[2];

            $db = \Config\Database::connect();

            $cekNis = $db->table('siswas')->getWhere(['nis' => $nis])->getResult();

            if (count($cekNis) > 0) {
                session()->setFlashdata('message', '<b style="color:red"> Data Gagal di Import NIS ada yang sama</b>');
            } else {
                $simpanData = [
                    'nis' => $nis,
                    'nama_siswa' => $nama_siswa,
                    'alamat' => $alamat
                ];

                $db->table('siswas')->insert($simpanData);
                session()->setFlashdata('message', 'Berhasil import excel');
            }
        }
        return redirect()->to('/siswa');
    }
}
