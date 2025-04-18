<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TimesheetController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CalendarController;

Route::get('/', function () {
    return redirect('/tasks');
});
Route::get('/calendar', [CalendarController::class, 'index'])->name('tasks.calendar');
Route::resource('tasks', TaskController::class);
Route::resource('timesheets', TimesheetController::class);
Route::get('/report', [ReportController::class, 'index'])->name('report.index');
Route::get('/report/data', [ReportController::class, 'chartData'])->name('report.data');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/export/timesheets', [ExportController::class, 'exportTimesheets'])->name('export.timesheets');
