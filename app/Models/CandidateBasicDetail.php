<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CandidateBasicDetail extends Model
{
    protected $table = 'candidate_basic_details';
    protected $connection = 'lakshyadb';

    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'mother_name', 'date_of_birth', 
        'permanent_address', 'gender', 'country', 'state', 'district', 'taluka', 
        'mobile_number', 'preferred_exam_location_1', 'preferred_exam_location_2', 
        'preferred_exam_location_3', 'custom_values', 'email','User_id','category'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->registration_number = Str::uuid();
        });
    }

}
