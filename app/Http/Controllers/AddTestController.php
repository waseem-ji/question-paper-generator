<?php

namespace App\Http\Controllers;

use App\Models\DriveTest;
use App\Models\Test;
use Illuminate\Http\Request;

class AddTestController extends Controller
{
    /**
     * Show the form for creating a new Test.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($drive_id)
    {
        $tests = Test::paginate(10);
        return view('drive.addTest', compact('tests', 'drive_id'));
    }

    /**
     * Store a newly created test in storage.
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

        DriveTest::create([
            'test_id' => $attributes['test_id'],
            'drive_id' => $attributes['drive_id']
        ]);
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
        $driveTest->delete();
        return redirect(route('drives.show', $driveTest->drive_id))->with('danger', 'Test Removed');
    }
}
