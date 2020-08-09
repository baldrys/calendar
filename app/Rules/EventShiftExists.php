<?php

namespace App\Rules;

use App\EventModel;
use Illuminate\Contracts\Validation\Rule;

class EventShiftExists implements Rule
{

    protected $date;
    protected $shiftId;
    protected $companyId;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($date, $shiftId, $companyId)
    {
        $this->date = $date;
        $this->shiftId = $shiftId;
        $this->companyId = $companyId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $flag = !EventModel::where('company_id', $this->companyId)->where('shift_id', $this->shiftId)->where('date', $this->date)->exists();
        return $flag;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Смена для выбранного дня для данной компании уже существует!';
    }
}
