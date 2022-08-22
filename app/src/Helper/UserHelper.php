<?php

namespace App\Helper;

use App\Entity\Application;
use App\Entity\User;
use Psr\Container\ContainerInterface;
use Symfony\Component\Asset\Packages;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;

class UserHelper
{
    /**
     * @var FileUploadHelper
     */
    protected FileUploadHelper $fileUploadHelper;

    /**
     * @var string
     */
    protected string $uploadDirectory;

    /**
     * @var Packages
     */
    protected Packages $assetsManager;

    /**
     * @var RouterInterface
     */
    protected $route;


    public function __construct(string $uploadDirectory,
                                FileUploadHelper $fileUploadHelper,
                                Packages $assetsManager,
                                RouterInterface $router)
    {
        $this->uploadDirectory = $uploadDirectory;
        $this->fileUploadHelper = $fileUploadHelper;
        $this->assetsManager = $assetsManager;
        $this->router = $router;
    }

    public function getUserUploadDirectory(?User $user): ?string
    {
        $path = $this->uploadDirectory . '/public/users/' . $user->getId() . '/';
        if(!file_exists($path)) mkdir($path,0777,true);
         return $path;
    }

    public function getUserUploadTempDirectory(?User $user): ?string
    {
        $path = $this->uploadDirectory . '/public/users/' . $user->getId() . '/tmp/';
        if(!file_exists($path)) mkdir($path,0777,true);
        return $path;
    }


    public function removeUserUploadTempDirectory(?User $user): ?string
    {
        try {
            $path = $this->uploadDirectory . '/public/users/' . $user->getId() . '/tmp/';
            if(file_exists($path)) rmdir($path,0777);
            return true;
        } catch(\Exception $e){
            return false;
        }

    }

    public function getPublicDirectory(): ?string
    {
        return $this->uploadDirectory . "/plublic/";
    }

    public function getApplicationAttachmentsUrl(Application $application): ?array
    {
        $user = $application->getApplicant();
        $basePath = 'users/' . $user->getId() . '/';
        $url = $this->router->generate('app_home', [], urlGeneratorInterface::ABSOLUTE_URL);

        $data["applicant_dir"] = $this->getUserUploadDirectory($user);
        $data["site_dir_root"] = $this->getPublicDirectory();
        $data["photo_url"] = $application->getPhoto() ? $url . $basePath . $application->getPhoto() : null;

        $data["passport_scan"] = $application->getPassportScan() ? $url . $basePath . $application->getPassportScan() : null;
        $data["invitation_letter_scan"] = $application->getInvitationLetterScan() ?  $url . $basePath . $application->getInvitationLetterScan() : null;
        $data["hotel_reservation_scan"] = $application->getHotelReservationScan() ?  $url . $basePath .$application->getHotelReservationScan() : null;
        $data["flight_ticket_scan"] = $application->getFlightTicketScan() ? $url . $basePath . $application->getFlightTicketScan() : null;
        $data["visa"] = $url . $basePath . $application->getApplicationNumber() . '_visa.jpg';
        $data["barcode"] = $url . $basePath . $application->getApplicationNumber() . '_barcode.jpg';

        $data["evisa"] = $url .  'assets/images/evisa_bg.jpg';

        return $data;
    }

    public function storeUserAsset(?File $file, ?User $user): ?string
    {
        $this->removeUserUploadTempDirectory($user);
        return $this->fileUploadHelper->upload($file, $this->getUserUploadDirectory($user));
    }

    public function storeUserTempAsset(?File $file, ?User $user): ?string
    {
        return $this->fileUploadHelper->upload($file, $this->getUserUploadTempDirectory($user));
    }


}