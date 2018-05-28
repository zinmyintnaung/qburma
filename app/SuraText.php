<?php

namespace App;

class SuraText extends BaseModel
{
    protected $fillable = [
        'sura_id', 'verse_id', 'ayah'
    ];

    public function sura(){
        return $this->belongsTo('App\Sura');
    }

    public function explanationdetails(){
        return $this->hasMany('App\ExplanationDetail');
    }

}
