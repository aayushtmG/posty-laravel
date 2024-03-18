<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Post;


class PostLiked extends Mailable
{
    use Queueable, SerializesModels;

    public  $liker;
    public $likedPost;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $liker,Post $likedPost)
    {
        $this->liker = $liker;
        $this->likedPost = $likedPost;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.post.post_liked')->subject("You received a like");
    }
}
