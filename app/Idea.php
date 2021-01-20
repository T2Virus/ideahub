<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    //
    protected $fillable = [
        'title',
        'idea',
        'budget',
        'category',
        'idea_type',
        'duration',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function investor()
    {
        return $this->belongsTo('App\Investor', 'investor_id');
    }
}
