<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sura extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'language_id', 'sura_number', 'sura_title_text', 'sura_note'
    ];
    protected $dates = ['deleted_at'];

    public function language(){
        return $this->belongsTo('App\Language');
    }

}
