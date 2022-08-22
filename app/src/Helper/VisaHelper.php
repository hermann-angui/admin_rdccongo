<?php

namespace App\Helper;

use App\Entity\Application;
use App\Service\EVisaImageGenerator;

class VisaHelper
{
    /**
     * @param UserHelper $userHelper
     */
    protected UserHelper $userHelper;

    /**
     * @var EVisaImageGenerator
     */
    protected EVisaImageGenerator $eVisaImageGenerator;

    public function __construct(UserHelper $userHelper, EVisaImageGenerator $eVisaImageGenerator)
    {
        $this->userHelper = $userHelper;
        $this->eVisaImageGenerator = $eVisaImageGenerator;
    }

    public function mapApplicationToVisa(?Application $application): ?array
    {
        $visaParams["place_of_issue"] =  'EMBASSY OF RDC WASHINGTON';
        $visaParams["number_of_entries"] =  $application->getVisaType(); //'Plusieurs fois';
        $visaParams["type"] =  $application->getPurposeOfTravel(); // 'Ordinaire';
        $visaParams["surname"] =  $application->getLastName();
        $visaParams["given_name"] =  $application->getMiddleName() . $application->getLastName();
        $visaParams["sex"] =  $application->getGender();;
        $visaParams["passport_number"] =  $application->getPassportNumber();
        $visaParams["document_number"] =  sprintf("R%09d", $application->getId());

        $from_date = new \DateTime();
        $to_date = $from_date->add(new \DateInterval('P1M'));
        $visaParams["valid_from"] =  $from_date->format('d/m/Y');
        $visaParams["valid_until"] =  $to_date->format('d/m/Y');
        $visaParams["date_of_birth"] =  $application->getDateOfBirth()?->format('d/m/Y');
        $visaParams["nationality"] =  $application->getCurrentNationality();

        $visaParams["userDir"] =  $this->userHelper->getUserUploadDirectory($application->getApplicant());
        $visaParams["photo"] = $this->userHelper->getUserUploadDirectory($application->getApplicant()) . $application->getPhoto();
        //$visaParams["evisa"] = $this->userHelper->getPublicDirectory() . 'assets/images/evisabg.jpg';
        //$visaParams["watermark"] =  $this->userHelper->getPublicDirectory() . "assets/images/evisawatermark.png";

        $visaParams["evisa"] = '/var/www/html/public/assets/images/evisabg.jpg';
        $visaParams["watermark"] = '/var/www/html/public/assets/images/evisawatermark.png';

        $visaParams["long_number"] = 'V<<<RDC<<<';
        $visaParams["long_number"] .= $visaParams['surname'] . '<<<<<';
        $visaParams["long_number"] .= $visaParams['given_name'] . '<<<<';
        $visaParams["long_number"] .= $visaParams['document_number'] . '<<<<<<<<<N ';

        $visaParams["long_number"] .= $visaParams['nationality'];
        $visaParams["long_number"] .= strrev(str_ireplace('/','',$visaParams['date_of_birth'])) . '5M';
        $visaParams["long_number"] .= strrev(str_ireplace('/','', $visaParams['valid_until']));
        $visaParams["long_number"] .= rand(145685815252,999998459847);

         return $visaParams;
    }

    public function generate(?Application $application)
    {
        $userData = $this->mapApplicationToVisa($application);
        return  $this->eVisaImageGenerator->generate($userData);
    }

}
