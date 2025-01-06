<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestToken extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function driveTest()
    {
        return $this->belongsTo(DriveTest::class,'drive_test_id');
    }
}
