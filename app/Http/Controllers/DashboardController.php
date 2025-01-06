<?php

namespace App\Http\Controllers;

use App\Models\Drive;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show()
    {
        $questionNumber = Question::all()->count();
        $testNumber = Test::all()->count();
        $drives = Drive::latest()->paginate(10);
        return view('dashboard', compact(['questionNumber','testNumber','drives']));
    }
}
