<?php 

namespace App\Core\Domain\Repositories;

interface MailRepositoryInterFace{

    public function sendMail($email);
}