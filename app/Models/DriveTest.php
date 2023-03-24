<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DriveTest extends Model
{
    use HasFactory,SoftDeletes,CascadeSoftDeletes;

    protected $cascadeDeletes = ['test_token' , 'candidate_test'];
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
