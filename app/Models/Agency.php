<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function sectors()
    {
        return $this->hasMany(Agency::class, 'agency_id', 'id');
    }
}
