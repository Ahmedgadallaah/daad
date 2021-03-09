<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Item extends Model
{
    use Translatable;
    protected $translatable = ['name','short_description','long_description'];

}
