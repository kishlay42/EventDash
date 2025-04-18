<?php

namespace App\Http\Controllers;

use App\Exports\TimesheetsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportTimesheets()
    {
        return Excel::download(new TimesheetsExport, 'timesheets.csv');
    }
}
