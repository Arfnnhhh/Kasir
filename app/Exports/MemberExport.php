<?php

namespace App\Exports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MemberExport implements FromCollection, WithHeadings, WithMapping
{
    private static $counter = 1;

    public function collection()
    {
        return Member::select('name', 'phone_number', 'email', 'address', 'date_of_birth', 'points')->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Nomor Telepon',
            'Email',
            'Alamat',
            'Tanggal Lahir',
            'Poin',
        ];
    }

    public function map($product): array
    {
        return [
            self::$counter++,
            $product->name,
            $product->phone_number,
            $product->email,
            $product->address,
            $product->date_of_birth,
            $product->points,
        ];
    }
}
