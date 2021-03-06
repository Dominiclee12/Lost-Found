<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Found extends Model
{
    // Table Name
    protected $table = 'founds';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
