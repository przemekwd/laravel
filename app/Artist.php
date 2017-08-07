<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'artist';

    /**
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'firstname',
        'lastname',
        'birth_date',
        'country',
        'band'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'Y-m-d';

    public function setBirthDateAttribute($value)
    {
        $this->attributes['birth_date'] = date('Y-m-d', strtotime($value));
    }

    public function __toString()
    {
        if (!empty($this->attributes['name'])) {
            return $this->attributes['name'];
        } else {
            return $this->attributes['firstname'] . ' ' . $this->attributes['lastname'];
        }
    }
}
