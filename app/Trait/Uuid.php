<?php

namespace App\Trait;
use Illuminate\Support\Str;

Trait Uuid
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model){
            try{
                $model->id=(string) Str::uuid();

            } catch (UnsatisfiedDependencyException $e) {
                abort(500, $e->getMessage());
            }
        });
    }
}

