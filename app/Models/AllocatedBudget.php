<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class AllocatedBudget extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    function dep() {

        return $this->hasOne('App\Models\Department', 'id', 'dep_id');
    }

    function year() {

        return $this->hasOne('App\Models\BudgetAmount', 'id', 'budget_id');
    }
}
