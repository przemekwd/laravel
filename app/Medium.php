<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medium extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'medium';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function albums()
    {
        return $this->belongsToMany('App\Album', 'album_medium');
    }
}
