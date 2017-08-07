<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'album';

    /**
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'atrist_id',
        'distributor_id',
        'description',
        'release_date',
        'record_year',
        'created',
        'cover'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function setReleaseDateAttribute($value)
    {
        $this->attributes['release_date'] = date('Y-m-d', strtotime($value));
    }

    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }

    public function distributor()
    {
        return $this->belongsTo('App\Distributor');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }
}
