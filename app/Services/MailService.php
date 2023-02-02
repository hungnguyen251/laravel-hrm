<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class MailService
{
    public function sendEmail($data) {
        $subject = $data['subject'];
        $to = $data['to'];
        $message = $data['message'];
        
        if (true === Config::get('app.use_sendgrid')) {
            return $this->sendgrid($to, $subject, $message);
        } else {
            return false;
        }
    }

    public function sendgrid($sendTo, $subject, $message) {
        try {
            $body = [
                'from' => [
                    'email' => Config::get('app.email_default')
                ],
                'personalizations' => [
                    [
                        'to' => [
                            [
                                'email' => $sendTo
                            ]
                        ],
                        'dynamic_template_data' => [
                            'subject' =>  $subject,
                            'message' => $message,
                        ]
                    ]
                ],
                'template_id' =>Config::get('app.send_grid_template_id')
            ];

            $response = Http::post(Config::get('app.send_grid_url'), [
                'json' => $body,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . Config::get('app.send_grid_token'),
                ]
            ]);
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
}