<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rabbit extends Model
{
    use HasFactory;

    protected $fillable = [
        "code",
        "name",
        "weight",
        "farmer_id",
        "main_picture"
    ];

    public function farmer() {

        return $this -> belongsTo(Farmer :: class);
    }
}
