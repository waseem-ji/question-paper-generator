<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use HasFactory,SoftDeletes,CascadeSoftDeletes;

    protected $cascadeDeletes = ['drive_test' , 'candidate_test'];
    protected $guarded = ['id'];

    public function specific_question()
    {
        return $this->hasMany(SpecificQuestion::class);
    }

    public function random_question()
    {
        return $this->hasMany(RandomQuestion::class);
    }

    public function drive_test()
    {
        return $this->belongsTo(DriveTest::class);
    }

    public function candidate_test()
    {
        return $this->belongsTo(CandidateTest::class);
    }
}
