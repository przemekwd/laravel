<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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
        'artist_id',
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
        return $this->belongsToMany('App\Genre', 'album_genre');
    }

    public function mediums()
    {
        return $this->belongsToMany('App\Medium', 'album_medium');
    }

    public function tracks()
    {
        return $this->hasMany('App\Track')->orderBy('number');
    }

    public function saveCover(Request $request)
    {
        $imageName = md5(uniqid()) .  '.' . $request->file('cover')->getClientOriginalExtension();

        $request->file('cover')->move(
            base_path() . '/public/uploads/album/cover/', $imageName
        );

        $this->attributes['cover'] = $imageName;
    }

    public function getGenresListAttribute()
    {
        if (count($this->genres)) {
            return $this->genres->lists('id')->toArray();
        }
    }
}
