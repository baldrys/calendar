<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyModel extends Model
{
    protected $table = 'companies';
    protected $fillable = ["name"];
}
