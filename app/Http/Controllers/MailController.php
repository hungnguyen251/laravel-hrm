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
        $sendMail = $this->mail->sendEmail($request->all());

        if (!$sendMail) {
            return redirect()->route('mail.edit')->with('failed', 'Gửi email thất bại');

        } else {
            return redirect()->route('mail.edit')->with('success', 'Gửi email thành công');
        }
    }

    public function edit()
    {
        return view('email.edit');
    }
}
