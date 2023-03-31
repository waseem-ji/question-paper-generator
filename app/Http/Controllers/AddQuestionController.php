<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\RandomQuestion;
use App\Models\SpecificQuestion;
use Illuminate\Http\Request;

class AddQuestionController extends Controller
{
    public function create($test_id)
    {
        return view('test.addQuestion', compact(['test_id']));
    }

    public function storeRandom()
    {
        $attributes = request()->validate([
            'test_id' => 'required',
            'category_id' => 'required',
            'difficulty' => 'required',
            'number_of_questions' => 'required'
        ]);

        // To avoid repeated same entries with diffirent question numbers
        $arr = array();
        $random = RandomQuestion::all();
        foreach ($random as $row) {
            $arr[] = $row['test_id'] . $row['category_id'] . $row['difficulty'];
        }
        $new_combination = $attributes['test_id'] . $attributes['category_id'] . $attributes['difficulty'];

        if (in_array($new_combination, $arr)) {
            return redirect()->back()->withErrors(['error' => 'The choosen random combination already exists.Go to edit menu to make changes']);
        } else {
            RandomQuestion::create($attributes);
            return back()->with('success', 'Random Questions Added');
        }
    }

    public function search()
    {
        $query = request()->input('query');

        $questions = Question::where('question', 'LIKE', "%$query%")
                        ->get();

        return response()->json($questions);
    }

    public function storeSpecific()
    {
        $attributes = request()->validate([
            'test_id' => 'required',
            'question_id' => 'required'
        ]);

        $arr = array();
        $specific = SpecificQuestion::all();
        foreach ($specific as $row) {
            $arr[] = $row['test_id'] . $row['question_id'] ;
        }
        $new_combination = $attributes['test_id'] . $attributes['question_id'];


        if (in_array($new_combination, $arr)) {
            echo "asd";
            return redirect()->back()->withErrors(['error' => 'The question has already been choosen for this test.']);
        } else {
            SpecificQuestion::create($attributes);
            return back()->with('success', 'Question Added');
        }
    }

    public function removeSpecific(SpecificQuestion $specificQuestion)
    {
        // dd($specificQuestion->test_id);
        $specificQuestion->delete();
        return redirect(route('tests.show',$specificQuestion->test_id))->with('danger', 'Question Deleted Succesfully');
    }

    public function removeRandom(RandomQuestion $randomQuestion)
    {
        $randomQuestion->delete();
        return redirect(route('tests.show',$randomQuestion->test_id))->with('danger', 'Random Questions Removed');
    }
}
