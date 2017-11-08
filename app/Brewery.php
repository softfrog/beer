<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property Beer[] $beers
 * @property integer $brewery_id
 * @property string $name
 * @property string $location
 * @property string $created_at
 * @property string $updated_at
 */
class Brewery extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'brewery_id';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'location', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function beers()
    {
        return $this->hasMany('App\Beer', null, 'brewery_id');
    }
}
