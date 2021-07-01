<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\User;

class Lost extends Model
{
    // Table Name
    protected $table = 'losts';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
