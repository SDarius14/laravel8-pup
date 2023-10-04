<?php

use App\Http\Controllers\ExportController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $students = Student::all(); // Fetch student data from the database
    return view('welcome', compact('students')); 
});

Route::post('grades/viewPDF', [ExportController::class, 'viewPDF'])->name('view-pdf');
Route::post('grades/downloadPDF', [ExportController::class, 'downloadPDF'])->name('download-pdf');

Route::post('grades/exportExcel', [ExportController::class, 'exportExcel'])->name('export-excel');