<?php

namespace App\Http\Controllers;

use App\Exports\StudentsGradesExport;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use Rap2hpoutre\FastExcel\FastExcel;

class ExportController extends Controller
{
    //
    public function viewPDF()
    {
        $students = Student::all();
        $pdf = Pdf::loadView('exports.students-grades', array('students' => $students));
        return $pdf->stream();
    }

    public function downloadPDF()
    {
        $students = Student::all();
        $pdf = PDF::loadView('exports.students-grades', array('students' => $students));
        return $pdf->download('students-grades.pdf');
    }

    public function exportExcel()
    {
        $students = Student::all();
        return (new FastExcel($students))->download('students.xlsx');
    }
}