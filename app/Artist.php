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

    /**
     * @var array
     */
    protected $defaults = [
        'band' => 0,
    ];

    /**
     * Artist constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->setRawAttributes($this->defaults, true);
        parent::__construct($attributes);
    }

    /**
     * @param $value
     */
    public function setBirthDateAttribute($value)
    {
        $this->attributes['birth_date'] = date('Y-m-d', strtotime($value));
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if (!empty($this->attributes['name'])) {
            return $this->attributes['name'];
        } else {
            return $this->attributes['firstname'] . ' ' . $this->attributes['lastname'];
        }
    }

    public static function findAll($filter = null, $search = '')
    {
        $albums = Artist::where('name', 'like','%' . $search . '%')
            ->orWhere('lastname', 'like','%' . $search . '%')
            ->orWhere('firstname', 'like','%' . $search . '%');

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
