<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Board extends Model
{
    use Sluggable;

    public function makePrivate()
    {
        $this->update(['public' => false]);

        return $this;
    }

    public function makePublic()
    {
        $this->update(['public' => true]);

        return $this;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
