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
}