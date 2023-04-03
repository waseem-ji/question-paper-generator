<?php

namespace App\Http\Controllers;

use App\Models\DriveTest;
use App\Models\Test;
use Illuminate\Http\Request;

class AddTestController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($drive_id)
    {
        $tests = Test::all();
        return view('drive.addTest', compact('tests', 'drive_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $attributes = request()->validate([
            'test_id' => 'required',
            'drive_id' => 'required'
        ]);

        // Verify if user is attempting to enter repeated entry
        DriveTest::create($attributes);
        return redirect(route('drives.show', $attributes['drive_id']))->with('success', 'Test Added to Drive');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DriveTest $driveTest)
    {
        // dd(request());
        // dd($driveTest);
        $driveTest->delete();
        return redirect(route('drives.show', $driveTest->drive_id))->with('danger', 'Test Removed');
    }
}
