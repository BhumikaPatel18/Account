<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Trait\Uuid;
use App\Trait\Relationship;

class Account extends Model
{
    protected $table='accounts';
    protected $keyType='uuid';
    use Uuid , HasFactory , Relationship;
    public $incrementing =false;
    protected $fillable=['user_name','first_name','last_name','dob','phone','email','address','country','state','gender','hobby'];


public function setHobbyAttribute($value)
    {
         $this->attributes['hobby'] = implode(',',$value);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'account_project');
    }

    public function contacts()
    {
        return $this->belongsToMany(Contact::class, 'account_contact');
    }
}
