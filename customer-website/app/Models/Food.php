<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Food extends Model implements HasMedia
{
    use HasFactory;
    use HasMediaTrait {
        getFirstMediaUrl as protected getFirstMediaUrlTrait;
    }

    public $table = 'foods';

    protected $appends = [
        'rate',
    ];

        /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id', 'id');
    }

    public function extras()
    {
        return $this->hasMany(\App\Models\Extra::class, 'food_id');
    }

    public function restaurant()
    {
        return $this->belongsTo(\App\Models\Restaurant::class, 'restaurant_id', 'id');
    }

    public function getPrice(): float
    {
        return $this->discount_price > 0 ? $this->discount_price : $this->price;
    }
    public function foodReviews()
    {
        return $this->hasMany(\App\Models\FoodReview::class, 'food_id');
    }
    public function getRateAttribute()
    {
        return $this->foodReviews()->select(DB::raw('round(AVG(food_reviews.rate),1) as rate'))->first('rate')->rate;
    }

    public function favorites()
    {
        return $this->hasMany(\App\Models\Favorite::class, 'food_id');
    }

    // public function getTopRated($number){
    //     return DB::select("
    //         SELECT `foods`.`id` AS id, AVG(rate) AS food_rate
    //         FROM `foods`,`food_reviews`
    //         WHERE `food_reviews`.food_id=`foods`.`id`
    //         GROUP BY `foods`.`id`
    //         ORDER BY `food_rate`  DESC
    //         LIMIT $number
    //     ");
    // }

    /**
     * @param Media|null $media
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_CROP, 200, 200)
            ->sharpen(10);

        $this->addMediaConversion('icon')
            ->fit(Manipulations::FIT_CROP, 100, 100)
            ->sharpen(10);
    }

    /**
     * to generate media url in case of fallback will
     * return the file type icon
     * @param string $collectionName
     * @param string $conversion
     * @return string url
     */
    public function getFirstMediaUrl($collectionName = 'default', $conversion = '')
    {
        $url = $this->getFirstMediaUrlTrait($collectionName);
        $array = explode('.', $url);
        $extension = strtolower(end($array));
        if (in_array($extension, config('medialibrary.extensions_has_thumb'))) {
            return asset($this->getFirstMediaUrlTrait($collectionName, $conversion));
        } else {
            return asset(config('medialibrary.icons_folder') . '/' . $extension . '.png');
        }
    }


}
