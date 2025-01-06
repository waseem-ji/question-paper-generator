<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $guarded = ['id'];
    public function specific_questions()
    {
        return $this->hasMany(SpecificQuestion::class);
    }

    public function random_questions()
    {
        return $this->hasMany(RandomQuestion::class);
    }
}
