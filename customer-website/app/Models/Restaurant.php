<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Restaurant extends Model implements HasMedia
{
    use HasFactory;
    use HasMediaTrait {
        getFirstMediaUrl as protected getFirstMediaUrlTrait;
    }

    protected $table = 'restaurants';

    protected $appends = [
        'rate',
    ];

    public function restaurantReviews()
    {
        return $this->hasMany(\App\Models\RestaurantReview::class, 'restaurant_id');
    }

    public function foods()
    {
        return $this->hasMany(\App\Models\Food::class, 'restaurant_id');
    }

    public function getRateAttribute()
    {
        return $this->restaurantReviews()->select(DB::raw('round(AVG(restaurant_reviews.rate),1) as rate'))->first('rate')->rate;
    }


    public function cuisines()
    {
        return $this->belongsToMany(\App\Models\Cuisine::class, 'restaurant_cuisines');
    }
    // public function getTopRated($number){
    //     return DB::select("
    //         SELECT `restaurants`.`id`, AVG(restaurant_reviews.rate) AS restaurant_rate
    //         FROM `restaurants`,`restaurant_reviews`
    //         WHERE `restaurant_reviews`.`restaurant_id`=`restaurants`.`id`
    //         GROUP BY `restaurants`.`id`
    //         ORDER BY `restaurant_rate`  DESC
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

    public function galleries()
    {
        return $this->hasMany(\App\Models\Gallery::class, 'restaurant_id');
    }

    public function format()
    {
        return [
            'restaurant' => $this,
            'cover' => $this->getFirstMediaUrl('image'),
            'cuisine'=>$this->cuisines->first()->name,
            'rate'=> $this->rate,
        ];
    }

}
