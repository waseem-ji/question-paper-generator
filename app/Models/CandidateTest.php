<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CandidateTest extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];


    public function scopeFilter($query)
    {
        if (request('cutOff')) {
            $query->where('result', '>', request('cutOff'));
        }
    }

    public function driveTest()
    {
        return $this->hasMany(DriveTest::class);
    }
    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
