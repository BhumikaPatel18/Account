<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Trait\Uuid;
use App\Trait\Relationship;

class Contact extends Model
{
    use HasFactory ;
    use Uuid;
    use Relationship;
    public $incrementing =false;
    protected $keyType = 'uuid';

    protected $fillable=['name','email','phone','contact','company_name','address','message'];

    public function accounts()
{
    return $this->belongsToMany(account::class, 'account_contact');
}

}


