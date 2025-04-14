<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductExport implements FromCollection, WithHeadings, WithMapping
{
    private static $counter = 1;

    public function collection()
    {
        return Product::select('name', 'quantity', 'price')->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Stok',
            'Harga',
        ];
    }

    public function map($product): array
    {
        return [
            self::$counter++,
            $product->name,
            $product->quantity,
            $product->price,
        ];
    }
}
