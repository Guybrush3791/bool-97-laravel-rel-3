<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "lastname",
        "dateOfBirth"
    ];

    public function rabbits() {

        return $this -> hasMany(Rabbit :: class);
    }
    public function farms() {

        return $this -> belongsToMany(Farm :: class);
    }
}
