<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Config;
use SendGrid\Mail\Mail;

class MailService
{
    public function sendEmail($data) {
        $subject = $data['subject'];
        $to = $data['to'];
        $message = $data['message'];
        
        if (true === Config::get('app.use_sendgrid')) {
            return $this->sendgrid($to, $subject, $message);
        } else {
            return redirect()->back()->with('failed', 'Chức năng gửi email không khả dụng');
        }
    }

    public function sendgrid($sendTo, $subject, $message) {
        $email = new Mail();
        $email->setFrom(Config::get('app.email_default'), Config::get('app.email_name_default'));
        $email->addTo(
            $sendTo,
            'Hung Nguyen',
            [
                'subject' => $subject,
                "message" => $message
            ],
        );
        $email->setTemplateId(Config::get('app.send_grid_template_id'));
        $sendgrid = new \SendGrid(Config::get('app.send_grid_token'));

        try {
            $response = $sendgrid->send($email);
            return redirect()->back()->with('success', 'Gửi email thành công. Code: ' . $response->statusCode());

        } catch (Exception $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }
}