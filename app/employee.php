<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    protected $fillable = ['first_name','middle_name','last_name','father_name',',other_name','gender','DOB','marital_status','disability','blood_group','country','passport','visa','visa_expired','permanent_address','temporary_address','home_phone','mobile_phone','fax','email','qualification','experience','exp_in_dept','hired_for_dep','hiring_date','currency','rate','per','emer_contact_name','emer_contact_address','emer_contact_phone','emer_contact_email','emer_contact_relation','sort_code','account_no','bank_name','bank_address','income_tax_no','national_insurance_no','unique_id'];

    public function wage()
    {
    	return $this->hasMany('App\wage');
    }
}