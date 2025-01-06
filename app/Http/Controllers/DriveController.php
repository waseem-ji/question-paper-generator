<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Drive;
use App\Models\DriveTest;
use Illuminate\Http\Request;

class DriveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drives = Drive::paginate(10);
        return view('drive.index', compact(['drives']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drive.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate([
            'name' => 'required',
            'drive_type' => 'required'
        ]);

        Drive::create([
            'name' => request()->name,
            'drive_type' => request()->drive_type
        ]);

        return redirect(route('drives.index'))->with('success', 'New Drive added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Drive $drive)
    {
        $driveTests = DriveTest::where('drive_id', $drive->id)->paginate(10);
        return view('drive.allTests', compact(['driveTests','drive']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Drive $drive)
    {
        return view('drive.edit', compact(['drive']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Drive $drive)
    {
        request()->validate([
            'name' => 'required',
            'drive_type' => 'required'
        ]);

        $drive->update([
            'name' => request()->name,
            'drive_type' =>request()->drive_type
        ]);

        return redirect(route('drives.index'))->with('info', 'Drive Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drive $drive)
    {
        $drive->delete();
        return redirect(route('drives.index'))->with('danger', 'Drive Archived Succesfully');
    }

    public function showTests(Drive $drive)
    {
        $driveTests = DriveTest::where('drive_id', $drive->id)->paginate(10);
        return view('drive.allTests', compact(['driveTests','drive']));
    }

    public function showCandidates(Drive $drive)
    {
        $candidates = Candidate::where('drive_id', $drive->id)->paginate(10);

        return view('drive.allCandidates', compact(['candidates','drive']));
    }
}
