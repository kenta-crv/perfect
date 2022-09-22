<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompanyCreateEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $company;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($company)
    {
        $this->company = $company;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //以下追記
        return $this->view('admin.email.company.create')
            ->subject('企業様新規登録のお知らせ')
            ->with('company', $this->company);
    }
}
