<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Found;
use App\Lost;

class Category extends Model
{
    // Table Name
    protected $table = 'categories';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function found(){
        return $this->hasMany(Found::class);
    }

    public function lost(){
        return $this->hasMany(Lost::class);
    }
}
