<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AlumniImport;

class ImportController extends Controller
{
    public function index()
    {
        return view('Import');
    }

    public function import(Request $request)
    {
        Excel::import(new AlumniImport, request()->file('file'));

        return redirect()->back()->with('success', 'File imported successfully.');
    }
}
