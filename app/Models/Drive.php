<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Drive extends Model
{
    use HasFactory;
    use SoftDeletes;



    protected $guarded = ['id'];

    public function drive_test()
    {
        return $this->hasMany(DriveTest::class);
    }

    public function candidate()
    {
        return $this->hasMany(Candidate::class);
        // Or is one candidates only allowed in one drive ?
    }
}
