<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'service_name',
        'description',

    ];
    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
}
