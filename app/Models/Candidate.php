<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $guarded = ['id'];

    public function candidate_test()
    {
        return $this->hasMany(CandidateTest::class);
    }
}
