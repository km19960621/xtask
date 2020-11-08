<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    //
    protected $guarded = array('id');
    protected $casts = [
      'desired_property_type' => 'json',
    ];
    public static $rules = array(
      'name' => 'required',
      'age' => 'required',
      'gender' => 'required',
      'desired_property_type' => 'required',
      'request' => 'required',
    );
}
