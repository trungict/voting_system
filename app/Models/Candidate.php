<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'name',
        'position_id',
        'vote_count'
    ];

    public $timestamps = false;

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
