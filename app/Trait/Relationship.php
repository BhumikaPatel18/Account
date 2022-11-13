<?php

namespace App\Trait;
use Illuminate\Support\Str;
use Illuminate\support\Facades\DB;
use Illuminate\support\Facades\config;

Trait Relationship
{
    protected static function bootUuid()
    {
        // static::saved(function ($model){
        //     dd($model);
        // });
        //dd('hello');
        static::saved(function ($model)
        {
            //  if(DB::table('account_contact')
            //  ->where('account_id',request()->all('account_id'))
            //  ->where('contact_id',$model->getKey())
            //  ->count() <1 )
            //  {
            //     $data = $model::find($model->getKey());
            //     $data->accounts()->attach(request()->all('account_id'));
            //  }

                //dd($model);
                $moduleName = class_basename($model); // table name
                //dd($moduleName);
                $data = "Relation.".$moduleName; // return data in relation with table (config)

                //dd($data);
                $data1 = config::get($data); // get data from config file(Relation.php)
                //dd($data1);
                $arr = array_column($data1,'table_name');
                //dd($arr);
                $arr = request()->all();
                // dd($arr);
                $var = $arr['relationshipmodulename'];
                //dd($var);

                // if(isset($arr['checkbox'])){

                foreach ($data1 as $module)
                {
                    $Rname = $module["relationship_name"];
                    $Rid = $module["relationship_id"];
                    $Rid = $arr[$Rid];
                    $RidDetach = $module["relationship_id"].'_detach';

                    $RidDetach = array_key_exists($RidDetach,$arr) ?  $arr[$RidDetach] : '';
                    //dd($RidDetach);

                    $acc = $model::find($model->getKey());

                    $acc->$Rname()->attach($Rid);
                }

                    // $ans=$acc->$Rname()->detach($RidDetach);

                // }
        });
    }

}









