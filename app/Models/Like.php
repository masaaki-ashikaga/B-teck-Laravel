<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $gaurded = [
        'id',
    ];

    //いいねしているか判定
    public function isLike($user_id, $post_id)
    {
        return (boolean) $this->where('user_id', $user_id)->where('post_id', $post_id)->first();
    }

    public function addLike($user_id, $post_id)
    {
        $like = new Like;
        $like->user_id = $user_id;
        $like->post_id = $post_id;
        $like->save();
        return;
    }

    public function destroyLike($like_id)
    {
        $this->where('id', $like_id)->delete();
        return;
    }
}
