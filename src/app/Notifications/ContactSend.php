<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSend extends Mailable
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
    public function __construct($first_name, $last_name, $first_name_kana, $last_name_kana, $email, $category_id, $body)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->first_name_kana = $first_name_kana;
        $this->last_name_kana = $last_name_kana;
        $this->email = $email;
        $this->category_id = $category_id;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('web.contact.contact_message')
            ->subject('【Q-chan】お問い合わせを受け付けました')
            ->with([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'first_name_kana' => $this->first_name_kana,
                'last_name_kana' => $this->last_name_kana,
                'email' => $this->email,
                'category_id' => $this->category_id,
                'body' => $this->body,
            ]);
    }
}
