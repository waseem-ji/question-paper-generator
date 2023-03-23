<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function candidate_test()
    {
        return $this->hasMany(CandidateTest::class);
    }
}
