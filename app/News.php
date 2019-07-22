<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $filable =['en_title' , 'ar_title' , 'en_details', 'ar_details' , 'photo'];
}
