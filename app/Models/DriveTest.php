<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriveTest extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function test_token()
    {
        return $this->belongsTo(TestToken::class);
    }


    public function candidate_test()
    {
        return $this->hasMany(CandidateTest::class);
    }
}
