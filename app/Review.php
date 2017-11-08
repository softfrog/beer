<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property Beer $beer
 * @property User $user
 * @property integer $review_id
 * @property integer $beer_id
 * @property integer $user_id
 * @property int $aroma
 * @property int $appearance
 * @property int $taste
 * @property int $overall
 * @property string $created_at
 * @property string $updated_at
 */
class Review extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'review_id';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['beer_id', 'user_id', 'aroma', 'appearance', 'taste', 'overall', 'created_at', 'updated_at'];

    /** @var array Array of rules used by Eloquent Validator object. */
    public static $rules = array(
        'beer_id'    => 'required|integer|exists:beers',
        'user_id'    => 'required|integer|exists:users',
        'aroma'      => 'integer|between:1,5',
        'appearance' => 'integer|between:1,5',
        'taste'      => 'integer|between:1,10',
        'overall'    => 'integer|between:1,20',
        'updated_at' => 'date',
        'created_at' => 'date'
    );

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function beer()
    {
        return $this->belongsTo('App\Beer', 'beer_id', 'beer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'user_id');
    }
}
