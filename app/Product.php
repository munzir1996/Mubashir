<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['ar_name' , 'ar_description' ,'photo' , 'en_name' , 'en_description' ];

}
