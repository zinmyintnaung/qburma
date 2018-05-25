<?php

namespace App;

class Sura extends BaseModel
{
    
    protected $fillable = [
        'language_id', 'sura_number', 'sura_title_text', 'sura_note'
    ];

    public function language(){
        return $this->belongsTo('App\Language');
    }

}
