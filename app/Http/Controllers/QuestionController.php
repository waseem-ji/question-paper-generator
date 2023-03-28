<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::paginate(10);
        return view('questions.index', compact(['questions']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
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
            'question' => 'required',
            'difficulty' => 'required',
            'type' => 'required',
            'category_id' => 'required'
        ]);

        if (isset(request()->choice)) {
            request()->choice = json_encode(request()->choice);
            $attributes['choice'] = request()->choice;
        }

        Question::create($attributes);

        return redirect('/questions')->with('success', 'New question added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('questions.edit', compact(['question']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question)
    {
        $attributes = request()->validate([
            'question' => 'required',
            'difficulty' => 'required',
            'type' => 'required',
            'category_id' => 'required'
        ]);

        if (isset(request()->choice)) {
            request()->choice = json_encode(request()->choice);
            $attributes['choice'] = request()->choice;
        }

        $question->update($attributes);

        return redirect('/questions')->with('success', 'New question added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect('/questions')->with('success', 'Question Archived Succesfully');
    }
}
