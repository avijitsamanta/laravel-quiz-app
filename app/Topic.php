<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //

    protected $table = 'topics';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function questions() {
        return $this->hasMany('App\Question', 'topic_id', 'id');
    }

}
