<?php

namespace App;

class Language extends BaseModel
{
    protected $fillable = [
        'language', 'description', 'translator'
    ];
    
    public function suras(){
        return $this->hasMany('App\Sura');
    }

    
}
