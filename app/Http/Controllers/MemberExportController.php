<?php

namespace App\Http\Controllers;

use App\Exports\MemberExport;
use Maatwebsite\Excel\Facades\Excel;

class MemberExportController extends Controller
{
    public function export()
    {
        return Excel::download(new MemberExport, 'members.xlsx');
    }
}
