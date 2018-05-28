<?php

namespace App;

class ExplanationDetail extends BaseModel
{
    protected $fillable = [
        'sura_text_id', 'explanation_detail'
    ];
    public function suratext(){
        return $this->belongsTo('App\SuraText');
    }
}
