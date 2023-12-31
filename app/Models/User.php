<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
