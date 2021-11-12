<?php

namespace App\Controllers;

use App\Models\ModelSiswa;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Home extends BaseController
{

    public function __construct()
    {
        $this->siswa = new ModelSiswa();
    }
    public function index()
    {
        $data['Siswa'] = $this->siswa->findAll();
        echo view('siswa', $data);
    }

    public function exportExcel()
    {
        $sisw = $this->siswa->findAll();

        // d($sisw);

        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nis')
            ->setCellValue('B1', 'Nama Siswa')
            ->setCellValue('C1', 'Alamat');
        $column = 2;

        foreach ($sisw as $sisdata) {
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('A' . $column, $sisdata['nis'])->setCellValue('B' . $column, $sisdata['nama_siswa'])->setCellValue('C' . $column, $sisdata['alamat']);
            $column++;
        }

        $writer = new Xlsx($spreadsheet);

        $filename = 'Data-Siswa-' . date('Y-m-d-His');

        header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        // dd($filename);

        $writer->save('php://output');
    }
}
