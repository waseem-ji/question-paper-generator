<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class RandomQuestion extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $guarded = ['id'];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
