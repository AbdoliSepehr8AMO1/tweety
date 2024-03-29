<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

trait Likable
{

    // what this allows you to do is to build dymanicly your querys
    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }

    // show the user by who the post is liked
    public function isLikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', true)
            ->count();
    }

    // show the user by who the post is disliked
    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', false)
            ->count();
    }

    // likes has many relationship
    public function likes()
    {
        return $this->hasMany(Like::class);
    }



    // give the like method a false
    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    // if the user likes and it's true then add the  user_id on the liked column
    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : auth()->id(),
            ],
            [
                'liked' => $liked,
            ]
        );
    }
}
