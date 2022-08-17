<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    use HasFactory;

//    protected $fillable = ['title','subtitle', 'date', 'ticket_price','venue','venue_address','city','state','zip','additional_information'];
protected $guarded = [];

}
