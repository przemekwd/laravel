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

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->attributes['name'];
    }

    public static function findAll($filter = null, $search = '')
    {
        $albums = Distributor::where('name', 'like','%' . $search . '%');

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
