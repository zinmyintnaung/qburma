<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Fico7489\Laravel\RevisionableUpgrade\Traits\RevisionableUpgradeTrait;
use Venturecraft\Revisionable\RevisionableTrait;

class BaseModel extends Model
{
    use SoftDeletes;
    use RevisionableUpgradeTrait;
    use RevisionableTrait;
    
    protected $revisionCreationsEnabled = true;
    protected $dates = ['deleted_at'];

    public function getExcerpt($str, $startPos=0, $maxLength=100) {
        if(strlen($str) > $maxLength) {
            $excerpt   = substr($str, $startPos, $maxLength-3);
            $lastSpace = strrpos($excerpt, ' ');
            $excerpt   = substr($excerpt, 0, $lastSpace);
            $excerpt  .= '...';
        } else {
            $excerpt = $str;
        }
        
        return $excerpt;
    }
}