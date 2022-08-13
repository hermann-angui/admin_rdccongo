<?php

namespace App\Helper;

use App\Entity\Application;
use TCPDF2DBarcode;

class VisaHelper
{
    protected string $rootDir;

    public function __construct(string $rootDir)
    {
        $this->rootDir = $rootDir;
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
        $visaParams["document_number"] =  'R' . rand(101112,999999);

        $from_date = new \DateTime();
        $to_date = $from_date->add(new \DateInterval('P1M'));
        $visaParams["valid_from"] =  $from_date->format('d/m/Y');
        $visaParams["valid_until"] =  $to_date->format('d/m/Y');
        $visaParams["date_of_birth"] =  $application->getDateOfBirth()?->format('d/m/Y');
        $visaParams["nationality"] =  $application->getCurrentNationality();

        // $visaParams["photo"] =  $this->rootDir . '/public/media/user/photos/' . $application->getPhoto();
       // $visaParams["photo"] =  'https://rdcongo-visa.herokuapp.com/media/user/photos/' . $application->getPhoto();
        //$visaParams["evisa_bg"] = $this->rootDir . '/public/media/images/evisa_bg.jpg';
        $visaParams["photo"] =  'https://rdcongo-visa.herokuapp.com/users/photos/' . $application->getPhoto();
        $visaParams["evisa_bg"] = "https://admin-rdcvisa.herokuapp.com/media/images/evisa_bg.jpg";

        $visaParams["long_number"] = 'V<<<RDC';
        $visaParams["long_number"] .= $visaParams['surname'] . '<<<<<';
        $visaParams["long_number"] .= $visaParams['given_name'] . '<<<<';
        $visaParams["long_number"] .= $visaParams['document_number'] . '<<<<<<<<< ';

        $visaParams["long_number"] .= $visaParams['nationality'];
        $visaParams["long_number"] .= strrev(str_ireplace('/','',$visaParams['date_of_birth'])) . '5M';
        $visaParams["long_number"] .= strrev(str_ireplace('/','', $visaParams['valid_until']));
        $visaParams["long_number"] .= rand(145685815252,999998459847);

        $visaParams['barcode'] = $this->generateBarCode($visaParams["document_number"]);
         return $visaParams;
    }

    function generateBarCode($name)
    {
        $barcodeobj = new TCPDF2DBarcode($name,  "PDF417");
        $barcode = $barcodeobj->getBarcodePngData(250,60);

        $barcodeDirectory = $this->rootDir . "/var/tmp";
        if(!file_exists($barcodeDirectory)) mkdir($barcodeDirectory);
        $tmp_barcode_file = $barcodeDirectory . '/barcode_' . $name. '.png';
        file_put_contents($tmp_barcode_file, $barcode);
        return $tmp_barcode_file;
    }

}