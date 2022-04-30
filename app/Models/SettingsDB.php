<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingsDB extends Model
{
    protected $fillable=['short_des','description','photo','address','phone','email','logo'];
}