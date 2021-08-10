<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Cat()
    {
        return $this->belongsTo('App\Models\Cat_reports','cat_id');
    }
}
