<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use HasFactory,SoftDeletes,CascadeSoftDeletes;

    protected $cascadeDeletes = ['candidate_test'];
    protected $guarded = ['id'];

    public function candidate_test()
    {
        return $this->hasMany(CandidateTest::class);
    }
}
