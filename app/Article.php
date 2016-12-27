<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Article extends Model
{
    //
    protected $fillable=['title','content','published_at'];
    protected $dates=['published_at'];
    //setTitleAttribute
   /* public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }*/
    public function scopePublished($query)
    {
       $query->where('published_at','<=',Carbon::now());
    }
}
