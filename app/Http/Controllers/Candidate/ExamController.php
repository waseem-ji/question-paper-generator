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
        // dd($testId);
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
        // dd("asdas");

        $questions = json_encode($this->getQuestions($testId));
        // dd($questions);
        $candidateTest = CandidateTest::create([
            'question_paper' => $questions,
            'test_id' => $testId,
            'candidate_id' =>   $candidate->id,
            'drive_test_id' => session('driveTestId')
        ]);

        session(['candidateTestId' => $candidateTest->id]);
        return redirect(route('candidate.exam', $candidateTest));
    }


    public function loadExam(CandidateTest $candidateTest)
    {
        $questionsArray = json_decode($candidateTest->question_paper);
        $questions = Question::whereIn('id', $questionsArray)->get();
        // session(['time' => $candidateTest->test->duration]);

        return view('candidate.exam', compact(['questions','candidateTest']));
    }

    public function saveAnswer(Request $request)
    {
        $candidateTestId = session('candidateTestId');
        $candidateTest = CandidateTest::find($candidateTestId);

        $results = $request->response;
        // dd($results);

        $candidateTest->update([
            'response' => $results
        ]);

        return response()->json([
            'success' => true,
            'data' => $results
        ]);
        // return ($candidateId);
    }

    public function submitExam(CandidateTest $candidateTest)
    {
        return view('candidate.finish', compact(['candidateTest']));
    }

    public function feedback(Request $request, CandidateTest $candidateTest)
    {
        $request->validate([
            'feedback' => 'required'
        ]);

        $candidateTest->update([
            'feedback' => $request->feedback
        ]);

        return redirect(route('candidate.login'));
    }
}
