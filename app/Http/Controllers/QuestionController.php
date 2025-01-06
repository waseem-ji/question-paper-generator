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
        // $questions = Question::paginate(10);
        $questions = Question::all();
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
            request()->validate(['correct_option' => 'required']);
            $attributes['choice'] = request()->choice;
            $attributes['correct_option'] =request()->correct_option ;
        }


        Question::create([
            'question' => $attributes['question'],
            'difficulty' => $attributes['difficulty'],
            'type' => $attributes['type'],
            'category_id'=>$attributes['category_id'],
            'choice' =>$attributes['choice']??null,
            'correct_option' => $attributes['correct_option'] ?? null
        ]);

        return redirect('/questions')->with('success', 'New question added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $choice = json_decode($question->choice);

        return view('questions.show', compact(['question','choice']));
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
            'category_id' => 'required',
        ]);

        if (isset(request()->choice)) {
            request()->choice = json_encode(request()->choice);
            request()->validate(['correct_option' => 'required']);
            $attributes['choice'] = request()->choice;
            $attributes['correct_option'] =request()->correct_option ;
        }

        $question->update([
            'question' => $attributes['question'],
            'difficulty' => $attributes['difficulty'],
            'type' => $attributes['type'],
            'category_id'=>$attributes['category_id'],
            'choice' =>$attributes['choice']??null,
            'correct_option' => $attributes['correct_option'] ?? null
        ]);

        return redirect('/questions')->with('info', 'New question added');
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
        return redirect('/questions')->with('danger', 'Question Archived Succesfully');
    }
}
