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
        $getCandidatePaper = CandidateTest::where('drive_test_id', session('driveTestId'))
                                            ->where('candidate_id', $candidate->id)
                                            ->where('test_id', $testId)
                                            ->first();


        if ($getCandidatePaper) {
            session(['candidateTestId' => $getCandidatePaper->id]);
            return redirect(route('candidate.exam', $getCandidatePaper));
        } else {
            $questions = json_encode($this->getQuestions($testId));
            $candidateTest = CandidateTest::create([
                'question_paper' => $questions,
                'test_id' => $testId,
                'candidate_id' =>   $candidate->id,
                'drive_test_id' => session('driveTestId')
            ]);
            session(['candidateTestId' => $candidateTest->id]);
            return redirect(route('candidate.exam', $candidateTest));
        }
    }


    public function loadExam(CandidateTest $candidateTest)
    {
        $candidateTestId = session('candidateTestId');
        if ($candidateTestId != $candidateTest->id) {
            abort(403);
        }

        if ($candidateTest->is_completed) {
            abort(403);
        }

        $questionsArray = json_decode($candidateTest->question_paper);
        $questions = Question::whereIn('id', $questionsArray)->get();

        return view('candidate.exam', compact(['questions','candidateTest']));
    }

    public function saveAnswer(Request $request)
    {
        $candidateTestId = session('candidateTestId');
        $candidateTest = CandidateTest::find($candidateTestId);

        $results = $request->response;
        $candidateTest->update([
            'response' => $results
        ]);

        return response()->json([
            'success' => true,
            'data' => $results
        ]);
    }

    public function submitExam(CandidateTest $candidateTest)
    {
        $candidateTest->update([
            'is_completed' => true
        ]);
        $this->calculateResults($candidateTest->id);
        return view('candidate.finish', compact(['candidateTest']));
    }

    public function feedback(Request $request, CandidateTest $candidateTest)
    {
        $request->validate([
            'feedback' => 'required|max:2000'
        ]);

        $candidateTest->update([
            'feedback' => $request->feedback,
            'is_completed' => true
        ]);

        session()->forget('candidateTestId');
        session()->forget('testId');
        return redirect(route('candidate.login'));
    }

    public function calculateResults($candidateTestId)
    {
        $result = 0;
        $query = CandidateTest::where('id', $candidateTestId)->first();
        $response = json_decode($query->response);


        foreach ($response as  $question =>$answer) {
            $correctAnswer = Question::where('id', $question)->pluck('correct_option')->first();

            if ($correctAnswer === $answer) {
                $result+=1 ;
            }
        }
        $query->update([
            'result' => $result
        ]);
    }
}
