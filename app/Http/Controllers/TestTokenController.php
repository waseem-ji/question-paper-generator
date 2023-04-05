<?php

namespace App\Http\Controllers;

use App\Models\DriveTest;

use App\Models\TestToken;
use Illuminate\Http\Request;

// use Illuminate\Support\Str;

class TestTokenController extends Controller
{
    public function generatetoken(DriveTest $driveTest)
    {
        $duration = request()->duration;


        $usedTokens = TestToken::all();
        $arr = array();
        foreach ($usedTokens as $tokens) {
            $arr[] = $tokens->token;
        }

        $token = rand(100000, 999999);
        while (true) {
            if(in_array($token,$arr)){
                $token = rand(100000, 999999);
            }
            else{
                break;
            }
        }
        // dd($attributes);
        TestToken::create([
            'drive_test_id' => $driveTest->id,
            'token' => $token,
            'expiry' => now()->addHours($duration),

        ]);
        return redirect(route('driveTest.tokens', $driveTest->id));
    }
}
