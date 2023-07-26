<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    protected $fillable = [
        "location",
        "nation",
        "dimension"
    ];

    public function farmers() {

        return $this -> belongsToMany(Farmer :: class);
    }
}
