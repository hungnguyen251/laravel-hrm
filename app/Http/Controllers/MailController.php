<?php

namespace App\Http\Controllers;

use App\Services\MailService;
use Illuminate\Http\Request;

class MailController extends Controller
{
    protected $mail;

    /**
     * Controller constructor.
     *
     * @param  \App\  $mail
     */
    public function __construct(MailService $mailService)
    {
        $this->mail = $mailService;
    }

    public function send(Request $request)
    {
        return $this->mail->sendEmail($request->all());
    }

    public function edit()
    {
        return view('email.edit');
    }
}
