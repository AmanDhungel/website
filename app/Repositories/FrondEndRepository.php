<?php

namespace App\Repositories;

use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\Roles\Role;
use App\Models\Team;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class FrondEndRepository
{


   public function getBanners()
   {
       return  Banner::query()
           ->where('status',true)
           ->orderBy('order','ASC')
            ->get();
   }

    public function getAboutUs()
    {
        return  AboutUs::query()
            ->where('status',true)
            ->first();
    }

    public function getTeams()
    {
        return  Team::query()
            ->leftJoin('designations as d','d.id','=','teams.designation_id')
            ->where('teams.status',true)
            ->orderBy('order','ASC')
            ->select('teams.*','d.name as designation','d.short_name as designation_short_name')
            ->get();
    }
}
