<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\CandidateTest;
use App\Models\DriveTest;
use App\Models\Test;
use App\Models\TestToken;
use Illuminate\Http\Request;

class DriveTestController extends Controller
{
    public function index(DriveTest $driveTest)
    {
        return view('driveTest.index', compact(['driveTest']));
    }

    public function viewTokens(DriveTest $driveTest)
    {
        $allTokens = TestToken::where('drive_test_id', $driveTest->id)->paginate(10);
        return view('driveTest.tokens', compact(['driveTest','allTokens']));
    }

    public function viewCandidates(DriveTest $driveTest)
    {
        $candidateTests = CandidateTest::where('test_id', $driveTest->test_id)->filter()->paginate(10);
        return view('driveTest.candidates', compact(['driveTest','candidateTests']));
    }
}
