<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FoundImage;
use App\Category;
use App\Claim;

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

    public function claims(){
        return $this->hasMany(Claim::class);
    }

    public function images(){
        return $this->hasMany(FoundImage::class);
    }
}
