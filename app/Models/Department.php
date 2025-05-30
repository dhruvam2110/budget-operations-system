<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    function emp() {

        return $this->hasOne('App\Models\Admin', 'id', 'emp_code');
    }
}
