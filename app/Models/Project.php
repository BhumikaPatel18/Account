<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Trait\Uuid;
use App\Trait\Relationship;

class Project extends Model
{
    use HasFactory;
    use Uuid , Relationship;
    public $incrementing =false;
    protected $keyType = 'uuid';

    protected $fillable=['name','title','email','description','start_date','due_date'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_project');
    }

    public function accounts()
    {
        return $this->belongsToMany(account::class, 'account_project');
    }
}

