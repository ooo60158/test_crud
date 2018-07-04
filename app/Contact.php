<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function getNameAttribute()
    {
        return $this->firstName . $this->lastName;
        
    }
    // public function getPhoneAttribute()
    // {
    //     return $this->phone;
    // }
}
