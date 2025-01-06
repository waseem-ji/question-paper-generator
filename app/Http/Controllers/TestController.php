<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::paginate(10);
        return view('test.index', compact(['tests']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test.create');
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
            'instructions' => 'required',
            'duration' => ['required','numeric']

        ]);
        $duration = request()->duration * 60;
        Test::create([
            'name' => request()->name,
            'instructions' => request()->instructions,
            'duration' => $duration

        ]);

        return redirect(route('tests.index'))->with('success', 'New test created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        return view('test.show', compact(['test']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        return view('test.edit', compact(['test']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Test $test)
    {
        request()->validate([
            'name' => 'required',
            'instructions' => 'required',
            'duration' => ['required','numeric']
        ]);

        $duration = request()->duration * 60;

        $test->update([
            'name' => request()->name,
            'instructions' => request()->instructions,
            'duration' => $duration
        ]);

        return redirect(route('tests.index'))->with('info', 'Test Details updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        $test->delete();
        return redirect(route('tests.index'))->with('danger', 'Test Archived Succesfully');
    }
}
