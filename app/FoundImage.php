<?php

namespace App;

use App\Found;
use Illuminate\Database\Eloquent\Model;

class FoundImage extends Model
{
    protected $fillable = [
        'name',
        'found_id',
    ];

    public function found()
    {
        return $this->belongsTo(Found::class);
    }
}
