<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    function presentPrice()
    {
        return 'Rs.' . number_format($this->price);
    }

    public function scopeMightAlsoLike($query)
    {

        return $query->inRandomOrder()->take(4);
    }
}
