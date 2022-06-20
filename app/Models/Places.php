<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'places_name',
        'address',
        'description',
        'city',
        'places_logo',
        'status',
    ];
    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function sections()
    {
        return $this->hasMany(sections::class);
    }
}
