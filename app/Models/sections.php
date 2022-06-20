<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sections extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'sections_name',
        'places_id',
        'price',
        'address',
        'type',
        'description',
        'sections_logo',
        'services',
        'status',
        'date',
    ];
    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function places()
    {
        return $this->belongsTo('App\Models\Places');
    }

    public function sectionsCount(){
        return $this->places()
            ->join('sections','places_id')
            ->selectRaw('places_id, count(distinct places_id) as total')
            ->groupBy('places_id');
    }

    public function setCategoryAttribute($value)
    {
        $this->attributes['services'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['services'] = json_decode($value);
    }
}
