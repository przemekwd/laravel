<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'genre';

    public function albums()
    {
        return $this->belongsToMany('App\Album', 'album_genre');
    }
}
