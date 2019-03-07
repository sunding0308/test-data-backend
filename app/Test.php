<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'device', 'date', 'type', 'cycle', 'level'
    ];

    /**
     * Relationship: Test has many datas.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function datas()
    {
        return $this->hasMany(Data::class, 'test_id', 'id');
    }
}
