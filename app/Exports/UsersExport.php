<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class UsersExport implements FromCollection, WithHeadings, WithStyles, WithEvents, WithCustomStartCell
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all()->map(function ($user) {
            return [
                $user->name,
                $user->gender,
                $user->place_of_birth . ', ' . $user->birth_date,
                $user->phone,
                $user->address,
                $user->keanggotaan,
                implode(', ', json_decode($user->job) ?? []),
                implode(', ', json_decode($user->kepakaran) ?? []),
                $user->email,
                $user->nbm,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Jenis Kelamin',
            'Tempat, Tanggal Lahir',
            'No. HP',
            'Alamat',
            'Keanggotaan',
            'Pekerjaan',
            'Kepakaran',
            'Email',
            'NBM',
        ];
    }

    public function startCell(): string
    {
        return 'A4';
    }

    public function styles($sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Menambahkan judul di baris 1
                $sheet->mergeCells('A1:K1');
                $sheet->setCellValue('A1', 'Data Keanggotaan Pimpinan Daerah Muhammadiyah Bukittinggi');
                $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
                $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                // Menambahkan tanggal di baris 2
                $sheet->mergeCells('A2:K2');
                $sheet->setCellValue('A2', 'Import Tanggal: ' . date('d-m-Y H:i:s'));
                $sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                $event->sheet->getStyle('A4:J4')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'color' => ['rgb' => 'FFFF00'],  // Warna kuning
                    ],
                ]);

                // Menambahkan border untuk data (mulai dari baris 5 sampai baris terakhir)
                $rowCount = $sheet->getHighestRow();
                $sheet->getStyle('A5:j' . $rowCount)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],  // Warna hitam
                        ],
                    ],
                ]);

                // membuat autosize untuk kolom A sampai J
                foreach (range('A', 'J') as $column) {
                    $sheet->getColumnDimension($column)->setAutoSize(true);
                }


            },
        ];
    }
}
