<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShiftModel extends Model
{
    protected $table = 'shifts';
    protected $fillable = ["name"];
}
