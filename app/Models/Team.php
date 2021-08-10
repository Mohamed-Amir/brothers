<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function skills(){
        return $this->hasMany(TeamSkills::class,'team_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function work(){
        return $this->hasMany(TeamWork::class,'team_id');
    }
}
