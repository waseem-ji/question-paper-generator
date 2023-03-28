<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpecificQuestion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

}
