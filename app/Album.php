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
     * Fillable arguments.
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

    /**
     * @param $value
     */
    public function setReleaseDateAttribute($value)
    {
        $this->attributes['release_date'] = date('Y-m-d', strtotime($value));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function distributor()
    {
        return $this->belongsTo('App\Distributor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function genres()
    {
        return $this->belongsToMany('App\Genre', 'album_genre');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function mediums()
    {
        return $this->belongsToMany('App\Medium', 'album_medium');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function tracks()
    {
        return $this->hasMany('App\Track')->orderBy('number');
    }

    /**
     * @param Request $request
     */
    public function saveCover(Request $request)
    {
        $imageName = md5(uniqid()) .  '.' . $request->file('cover')->getClientOriginalExtension();

        $request->file('cover')->move(
            base_path() . '/public/uploads/album/cover/', $imageName
        );

        $this->attributes['cover'] = $imageName;
    }

    /**
     * @return array
     */
    public function getGenresListAttribute()
    {
        if (count($this->genres)) {
            return $this->genres->lists('id')->toArray();
        } else {
            return [];
        }
    }

    public static function findAll($filter = null, $search = '')
    {
        $albums = Album::where('title', 'like','%' . $search . '%');

        if ($filter) {
            $filter = explode(',', $filter);
            foreach ($filter as $f) {
                $tmp = explode(' ', $f);
                $albums = $albums->orderBy($tmp[0], $tmp[1]);
            }
        }

        return $albums->get();
    }
}
