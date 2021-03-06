<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lost extends Model
{
    // Table Name
    protected $table = 'losts';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
