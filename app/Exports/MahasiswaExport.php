<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class MahasiswaExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths
{
    protected $mahasiswa;

    public function __construct(Collection $mahasiswa)
    {
        $this->mahasiswa = $mahasiswa;
    }

    public function collection()
    {
        return $this->mahasiswa;
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'NIM',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Alamat',
            'Jurusan'
        ];
    }

    public function map($row): array
    {
        $tanggalLahir = Carbon::parse($row->tanggal_lahir)->format('d-F-Y');

        return [
            $row->id,
            $row->nama,
            $row->nim,
            $row->jenis_kelamin ? 'Laki Laki' : 'Perempuan',
            $row->tempat_lahir,
            $tanggalLahir,
            $row->alamat,
            $row->jurusan->jurusan
        ];
    }
    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();

        // Header styles
        $headerStyle = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => '2986cc',
                ],
            ],
        ];

        // Data styles
        $dataStyle = [
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ];

        // Apply styles to header row
        $sheet->getStyle('A1:H1')->applyFromArray($headerStyle);

        // Apply styles to data rows
        if ($lastRow > 1) {
            $sheet->getStyle('A2:H' . $lastRow)->applyFromArray($dataStyle);
        }

        return;
    }


    public function columnWidths(): array
    {
        return [
            'A' => 10, // ID column width
            'B' => 25, // Nama column width
            'C' => 15, // NIM column width
            'D' => 15, // Jenis Kelamin column width
            'E' => 20, // Tempat Lahir column width
            'F' => 20, // Tanggal Lahir column width
            'G' => 45, // Alamat column width
            'H' => 20, // Jurusan column width
        ];
    }
}
