<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drive extends Model
{
    use HasFactory;

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
