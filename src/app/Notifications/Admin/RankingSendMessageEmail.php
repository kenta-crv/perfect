<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RankingSendMessageEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $title;
    private $content;
    private $thumbnail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $content, $thumbnail)
    {
        $this->title = $title;
        $this->content = $content;
        $this->thumbnail = $thumbnail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.email.quiz.ranking_message')
            ->subject('【Q-chan】ご参加ありがとうございました')
            ->with([
                'title' => $this->title,
                'content' => $this->content,
                'thumbnail' => $this->thumbnail
            ]);
    }
}
