<?php

namespace App\Service;

use TCPDF2DBarcode;

class EVisaImageGenerator extends ImageRenderer
{
    public function generate($userData)
    {
        $visa_file = $userData['userDir'] .  $userData['document_number'] . '_visa.jpg';
        $userData['barcode'] = $this->generateBarCode($userData);

        $html = $this->twig->render('evisa/print.html.twig', ['user'=> $userData]);
        $output = $this->snappy->getOutputFromHtml($html);

        file_put_contents($visa_file, $output);

        return $visa_file;
    }

    public function generateBarCode($userData)
    {
        $barcode_file = $userData['userDir'] .  $userData['document_number'] . '_barcode.jpg';

        if(!file_exists($userData['userDir'])) mkdir($userData['userDir']);

        if(!file_exists($barcode_file)) {
            $barcodeobj = new TCPDF2DBarcode($userData['document_number'],  "PDF417");
            $barcode = $barcodeobj->getBarcodePngData(300,60);
            file_put_contents($barcode_file, $barcode);
        }
        return $barcode_file;
    }
}