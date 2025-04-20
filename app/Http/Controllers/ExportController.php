<?php

namespace App\Http\Controllers;

use App\Exports\TimesheetsExport; // Import the TimesheetsExport class
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class ExportController extends Controller
{
    public function exportTimesheets()
    {
        // Ensure the authenticated user's ID is passed to the export class
        $userId = Auth::id();

        // Generate and download the CSV file for the authenticated user's timesheets
        return Excel::download(new TimesheetsExport($userId), 'user_timesheets.csv');
    }
}