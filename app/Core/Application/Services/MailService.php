<?php 

namespace App\Core\Application\Services;

use App\Core\Domain\Repositories\MailRepositoryInterFace;

class MailService {

    protected MailRepositoryInterFace $mail;
    public function __construct(MailRepositoryInterFace $mail){
        $this->mail = $mail;
    }   

    public function sendMail($email){
        return $this->mail->sendMail($email);
    }
}