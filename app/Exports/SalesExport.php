<?php

namespace App\Exports;

use App\Models\Sale;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class SalesExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    WithEvents,
    WithStyles,
    WithTitle,
    ShouldAutoSize
{
    private static int $counter = 1;

    public function collection()
    {
        return Sale::all();
    }

    public function title(): string
    {
        return 'Laporan Penjualan';
    }

    public function headings(): array
    {
        return [
            ['Laporan Penjualan Arfanmart'], // Row 1 (Title)
            [ // Row 2 (Column headers)
                'No',
                'Nomor Invoice',
                'Nama Pelanggan',
                'Tanggal Penjualan',
                'Produk',
                'Total Harga',
                'Total Bayar',
                'Kembalian',
                'Diskon',
                'Dibuat Oleh'
            ]
        ];
    }

    public function map($sale): array
    {
        $id = self::$counter++;

        $productData = is_string($sale->product_data)
            ? json_decode($sale->product_data, true)
            : $sale->product_data;

        if (!is_array($productData)) {
            $productData = [];
        }

        $productList = collect($productData)->map(function ($item) {
            return "{$item['name']} x{$item['quantity']}";
        })->implode(', ');

        $totalProductPrice = collect($productData)->reduce(function ($carry, $item) {
            return $carry + ((float) $item['price'] * (int) $item['quantity']);
        }, 0);

        $discount = $totalProductPrice - (float) $sale->total_amount;

        return [
            $id,
            $sale->invoice_number,
            $sale->customer_name,
            $sale->created_at->format('d-m-Y H:i'),
            $productList,
            'Rp ' . number_format($sale->total_amount, 0, ',', '.'),
            'Rp ' . number_format($sale->payment_amount, 0, ',', '.'),
            'Rp ' . number_format($sale->change_amount, 0, ',', '.'),
            'Rp ' . number_format($discount, 0, ',', '.'),
            DB::table('users')->where('id', $sale->user_id)->value('name'),
        ];
    }

    public function registerEvents(): array
    {
        return [
            \Maatwebsite\Excel\Events\BeforeSheet::class => function (\Maatwebsite\Excel\Events\BeforeSheet $event) {
                // Merge title row (A1:J1)
                $event->sheet->mergeCells('A1:J1');
            },
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Title style (Row 1)
        $sheet->getStyle('A1')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 14,
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        // Column headings style (Row 2)
        $sheet->getStyle('A2:J2')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        return [];
    }
}
