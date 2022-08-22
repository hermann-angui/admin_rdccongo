<?php

namespace App\Service;


use App\Entity\User;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class EmailService
{
    protected MailerInterface $mailer;

    function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendApplicationEmail(Email $email)
    {
        return true;
    }

}