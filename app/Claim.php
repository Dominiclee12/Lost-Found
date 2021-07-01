<?php

namespace App;
use App\Found;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    // Table Name
    protected $table = 'claims';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function found(){
        return $this->belongsTo(Found::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
