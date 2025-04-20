<?php

namespace App\Exports;

use App\Models\Timesheet;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TimesheetsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Fetch timesheets for the authenticated user
        return Timesheet::join('tasks', 'timesheets.task_id', '=', 'tasks.id')
            ->where('tasks.user_id', Auth::id()) // Filter by user ID
            ->select('tasks.name as task_name', 'timesheets.date', 'timesheets.hours_worked', 'timesheets.comments')
            ->orderBy('timesheets.date', 'desc')
            ->get()
            ->map(function ($ts) {
                return [
                    'Task Name'     => $ts->task_name,
                    'Date'          => $ts->date,
                    'Hours Worked'  => $ts->hours_worked,
                    'Comments'      => $ts->comments,
                ];
            });
    }

    public function headings(): array
    {
        return ['Task Name', 'Date', 'Hours Worked', 'Comments'];
    }
}