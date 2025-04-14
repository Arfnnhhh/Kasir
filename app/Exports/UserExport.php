<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UserExport implements FromCollection, WithHeadings, WithMapping
{
    private static $counter = 1;

    public function collection()
    {
        return User::select('id', 'name', 'email', 'role', 'created_at')->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'ID',
            'Nama',
            'Email',
            'Role',
            'Tanggal Dibuat',
        ];
    }

    public function map($user): array
    {
        return [
            self::$counter++,
            $user->id,
            $user->name,
            $user->email,
            $user->role,
            $user->created_at->format('d-m-Y H:i'),
        ];
    }
}
