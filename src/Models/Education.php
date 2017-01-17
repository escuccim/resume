<?php

namespace Escuccim\Resume\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'school',
        'degree',
        'major',
        'start_date',
        'end_date',
        'location',
    ];

    public function scopeLanguage($query, $lang){
        if($lang == 'all')
            $query;
        else
            $query->where('lang', $lang);
    }
}
