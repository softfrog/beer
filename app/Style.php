<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property Beer[] $beers
 * @property integer $style_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 */
class Style extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'style_id';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function beers()
    {
        return $this->hasMany('App\Beer', null, 'style_id');
    }
}
