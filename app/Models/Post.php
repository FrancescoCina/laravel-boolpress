<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;


class Post extends Model
{
    public function getFormattedDate($column, $format = 'd-m-Y H:i:s')
    {
        return Carbon::create($this->$column)->format($format);
    }

    protected $fillable = ['title', 'content', 'image', 'slug', 'category_id', 'user_id'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }
}
