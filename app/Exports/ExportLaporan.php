<?php

namespace App\Exports;

use App\Models\Laporan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportLaporan implements FromCollection, WithHeadings, ShouldAutoSize, WithColumnWidths
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $startDate;
    protected $endDate;

    public function __construct($startDate = null, $endDate = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function headings(): array
    {
        return [
            'Nomor/Tanggal/SPMK',
            'Kotama',
            'Nama Kegiatan',
            'Nilai Kontrak',
            'Jumlah KK',
            'Rekanan',
            'Tanggal Mulai',
            'Tanggal Selesai',
            'Lapju Lalu',
            'Lapju Rencana',
            'Lapju Pelaksanaan',
            'Daya Serap',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 20,
            'C' => 50,
            'D' => 20,
            'E' => 20,
        ];
    }

    public function collection()
    {
        $data = Laporan::query();

        if ($this->startDate && $this->endDate) {
            $data->whereBetween('updated_at', [$this->startDate, $this->endDate]);
        }

        return $data->get([
            'no_tgl_spmk',
            'kotama',
            'nama_kegiatan',
            'nilai_kontrak',
            'jumlah_kk',
            'rekanan',
            'tgl_mulai',
            'tgl_selesai',
            'lapju_lalu',
            'lapju_rencana',
            'lapju_pelaksanaan',
            'daya_serap'
        ]);
    }
}
