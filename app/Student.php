<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hrshadhin\Userstamps\UserstampsTrait;
use App\Http\Helpers\AppHelper;
use Illuminate\Support\Arr;


class Student extends Model
{
    use SoftDeletes;
    use UserstampsTrait;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'dob',
        'gender',
        'religion',
        'blood_group',
        'nationality',
        'photo',
        'email',
        'phone_no',
        'extra_activity',
        'note',
        'father_name',
        'father_phone_no',
        'father_phone_no',
        'mother_name',
        'mother_phone_no',
        'guardian',
        'guardian_phone_no',
        'present_address',
        'permanent_address',
        'status',
    ];

    public function registration()
    {
        // todo: need to add relation ship for academic year wise student select
        return $this->hasMany('App\Registration', 'student_id');
    }
    public function getGenderAttribute($value)
    {
        return Arr::get(AppHelper::GENDER, $value);
    }

    public function getReligionAttribute($value)
    {
        return Arr::get(AppHelper::RELIGION, $value);
    }

    public function getBloodGroupAttribute($value)
    {
        return Arr::get(AppHelper::BLOOD_GROUP, $value);
    }
}
