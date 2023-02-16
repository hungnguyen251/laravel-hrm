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
        $ccEmails = !empty($data['cc']) ? $data['cc'] : '';
        $bccEmails = !empty($data['bcc']) ? $data['bcc'] : '';
        $attachment = !empty($data['attachment']) ? $data['attachment'] : '';
        
        if (true === Config::get('app.use_sendgrid')) {
            return $this->sendgrid($to, $subject, $message, $ccEmails, $bccEmails, $attachment);
        } else {
            return redirect()->back()->with('failed', 'Chức năng gửi email không khả dụng');
        }
    }

    public function sendgrid($sendTo, $subject, $message, $ccEmails, $bccEmails, $attachment) {
        $email = new Mail();
        $email->setFrom(Config::get('app.email_default'), Config::get('app.email_name_default'));
        $email->addTo(
            $sendTo,
            '',
            [
                'subject' => $subject,
                "message" => $message
            ],
        );

        if ($ccEmails != '') {
            $ccEmails = explode(',', $ccEmails);
            if (is_array($ccEmails)) {
                $cc = [];
                foreach($ccEmails as $key => $value) {
                    $cc[trim($value)] = '';
                }
                
                $email->addCcs($cc);
            }
        }

        if ($bccEmails != '') {
            $bccEmails = explode(',', $bccEmails);
            if (is_array($bccEmails)) {
                $bcc = [];
                foreach($bccEmails as $key => $value) {
                    $bcc[trim($value)] = '';
                }
                
                $email->addBccs($bcc);
            }
        }
        if ($attachment != '') {
            $file_encoded = base64_encode(file_get_contents($attachment));
            $email->addAttachment(
                $file_encoded,
                "application/text",
                $attachment->getClientOriginalName(),
                "attachment"
            );
        }

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