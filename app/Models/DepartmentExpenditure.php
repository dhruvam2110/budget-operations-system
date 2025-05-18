<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class DepartmentExpenditure extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    function bud() {

        return $this->hasOne('App\Models\AllocatedBudget', 'id', 'dep_id');
    }
}
