<?php

namespace App\Traits;

use App\Entity\Application;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

trait UploadDocumentTrait
{
    public function getApplicationAttachmentsUrl(Application $application): ?array
    {
        $user = $this->getUser();
        $basePath = 'users/' . $user->getId() . '/';
        $url = $this->generateUrl('app_home', [], urlGeneratorInterface::ABSOLUTE_URL) ;

        $data["photo_url"] = $url . $basePath . $application->getPhoto();
        $data["passport_scan"] = $url . $basePath . $application->getPassportScan();
        $data["invitation_letter_scan"] = $url . $basePath . $application->getInvitationLetterScan();
        $data["flight_ticket_scan"] = $url . $basePath . $application->getFlightTicketScan();
        $data["hotel_reservation_scan"] = null;
        $data["visa"] = $url . $basePath . $application->getApplicationNumber() . '_visa.jpg';
        $data["barcode"] = $url . $basePath . $application->getApplicationNumber() . '_barcode.jpg';

        return $data;
    }

}