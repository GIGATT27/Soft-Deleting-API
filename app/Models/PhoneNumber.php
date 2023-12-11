<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PhoneNumber extends Model
{
    use SoftDeletes;

    protected $table = 'phone_numbers';

    protected $fillable = ['number'];
}
