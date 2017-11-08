<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property User $user
 * @property Brewery $brewery
 * @property Style $style
 * @property Review[] $reviews
 * @property integer $beer_id
 * @property integer $user_id
 * @property integer $brewery_id
 * @property integer $style_id
 * @property string $name
 * @property int $ibu
 * @property int $calories
 * @property float $abv
 * @property string $updated_at
 * @property string $created_at
 */
class Beer extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'beer_id';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'brewery_id', 'style_id', 'name', 'ibu', 'calories', 'abv', 'updated_at', 'created_at'];

    /** @var array Array of accessors to include in the model's array and JSON forms. */
    protected $appends = array('location');

    /** @var array Array of rules used by Eloquent Validator object. */
    public static $rules = array(
        'beer_id'    => 'sometimes|required|integer',
        'name'       => 'required',
        'user_id'    => 'required|integer|exists:users',
        'brewery_id' => 'required|integer|exists:breweries',
        'style_id'   => 'required|integer|exists:styles',
        'ibu'        => 'integer',
        'calories'   => 'numeric',
        'abv'        => 'numeric|between:0,100',
        'updated_at' => 'date',
        'created_at' => 'date'
    );

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brewery()
    {
        return $this->belongsTo('App\Brewery', 'brewery_id', 'brewery_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function style()
    {
        return $this->belongsTo('App\Style', 'style_id', 'style_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany('App\Review', 'beer_id', 'beer_id');
    }

    /**
     * Return the beer's location
     *
     * @return string
     */
    public function getLocationAttribute()
    {
        return $this->brewery->location;
    }

    /**
     * Calculate the average overall score from all the reviews
     * @return array
     */
    public function overall()
    {
        $reviews_count = $this->reviews->count();
        if ($reviews_count == 0) {
            return array('count' => $reviews_count, 'overall' => NULL);
        }
        $overall_scores = $this->reviews->pluck('overall')->all();
        return array('count' => $reviews_count, 'overall' => array_sum($overall_scores)/$reviews_count);
    }
}
