<?php

namespace App\Exports;

use App\Models\Timesheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TimesheetsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Timesheet::with('task')->get()->map(function ($ts) {
            return [
                'Task Name'     => $ts->task->name ?? 'N/A',
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
