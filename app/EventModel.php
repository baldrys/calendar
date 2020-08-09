<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventModel extends Model
{
    protected $table = "events";
    protected $fillable = ["name", "price", "work_type", "company_id", "employee_id", "date", "shift_id"];


    public function employee()
    {
        return $this->belongsTo('App\User');
    }

    public function company()
    {
        return $this->belongsTo('App\CompanyModel');
    }

    public function shift()
    {
        return $this->belongsTo('App\ShiftModel');
    }
}
