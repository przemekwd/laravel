<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'distributor';

    /**
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'country',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function __toString()
    {
        return $this->attributes['name'];
    }
}
