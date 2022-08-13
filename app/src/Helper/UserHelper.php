<?php

namespace App\Helper;

use App\Entity\User;
use Symfony\Component\HttpFoundation\File\File;

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

    public function __construct(string $uploadDirectory, FileUploadHelper $fileUploadHelper)
    {
        $this->fileUploadHelper = $fileUploadHelper;
        $this->uploadDirectory = $uploadDirectory;
    }

    public function getUserUploadDirectory(?User $user): ?string
    {
         return $this->uploadDirectory . $user->getId() . '/';
    }

    public function storeUserAsset(?File $file, ?User $user): ?string
    {
        return $this->fileUploadHelper->upload($file, $this->getUserUploadDirectory($user));
    }
}