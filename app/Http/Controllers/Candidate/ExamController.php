<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\CandidateTest;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function getQuestions($testId)
    {
        $questionsArray = array();

        $test =  Test::where('id', $testId)->first();
        $specificQuestions = $test->specific_questions;
        foreach ($specificQuestions as $item) {
            $questionsArray[] = $item->question_id;
        }


        $randomQuestions = $test->random_questions;
        $randomArray = array();
        foreach ($randomQuestions as $item) {
            $randomQuestionList = Question::where('category_id', $item->category_id)
                                            ->where('difficulty', $item->difficulty)
                                            ->inRandomOrder()
                                            ->take($item->number_of_questions)
                                            ->get();

            foreach ($randomQuestionList as $rand) {
                $randomArray[] = $rand->id;
                if (!in_array($rand->id, $questionsArray)) {
                    $questionsArray[] = $rand->id;
                }
            }
        }

        return $questionsArray;
    }

    public function processExam(Candidate $candidate)
    {
        $testId = session('testId');
        // call a function to get questions for the test returned as json format
        $questions = json_encode($this->getQuestions($testId));
        // dd($questions);
        $candidateTest = CandidateTest::create([
            'question_paper' => $questions,
            'test_id' => $testId,
            'candidate_id' =>   $candidate->id,
            'drive_test_id' => session('driveTestId')
        ]);

        // dd($candidateTest);
        return redirect(route('candidate.exam',$candidateTest));
    }


    public function loadExam(CandidateTest $candidateTest)
    {

        $questionsArray = json_decode($candidateTest->question_paper);
        $questions = Question::whereIn('id',$questionsArray)->simplePaginate(1);
        // $questions = Question::whereIn('id',$questionsArray)->paginate(1);
        // dd($questions);

        return view('candidate.exam',compact(['questions']));
    }
}
