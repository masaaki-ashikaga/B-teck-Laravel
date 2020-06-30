<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function like()
    {
        return $this->hasMany('App\Models\Like');
    }

    public function addPost($request)
    {
        $post = new Post;
        $new_post = $request->only(['title', 'content', 'user_id']);
        $post->fill($new_post)->save();
        return $post;
    }

    public function updatePost($id, $request)
    {
        $post = Post::find($id);
        $update_post = $request->only(['title', 'content']);
        $post->fill($update_post)->save();
        return;
    }
}
