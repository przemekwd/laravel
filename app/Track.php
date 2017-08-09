<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'track';

    /**
     *
     * @var array
     */
    protected $fillable = [
        'number',
        'title',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function album()
    {
        return $this->belongsTo('App\Album');
    }

}
