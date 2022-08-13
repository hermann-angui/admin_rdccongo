<?php

namespace App\Controller\Api;

use App\Entity\Application;
use App\Helper\VisaHelper;
use App\Repository\ApplicationRepository;
use App\Repository\UserRepository;
use App\Service\EVisaImageGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/visa')]
class VisaApplicationController extends AbstractController
{
    protected UserRepository $userRepository;
    protected ApplicationRepository $applicationRepository;
    protected EVisaImageGenerator $eVisaImageGenerator;
    protected VisaHelper $visaHelper;

    public function __construct(UserRepository $userRepository,
                                ApplicationRepository $applicationRepository,
                                VisaHelper $visaHelper,
                                EVisaImageGenerator $eVisaImageGenerator)
    {
        $this->visaHelper = $visaHelper;
        $this->userRepository = $userRepository;
        $this->applicationRepository = $applicationRepository;
        $this->eVisaImageGenerator = $eVisaImageGenerator;
    }

    #[Route('/', name: 'api_visa_applications', methods: ['GET','POST'])]
    public function findAll(Request $request): JsonResponse
    {
        $all = $this->applicationRepository->findAll();
        $serializer = $this->container->get('serializer');
        $serializer->setCircularReferenceLimit(2);
        $data = $serializer->serialize($all, 'json');
        return $this->json($data);
    }

    #[Route('/{id}', name: 'api_visa_applications', methods: ['GET','POST'])]
    public function getApplication(Request $request, Application $application): JsonResponse
    {
        $serializer = $this->container->get('serializer');
        $serializer->setCircularReferenceLimit(2);
        $data = $serializer->serialize($application, 'json');
        return $this->json($data);
    }

    #[Route('/validate/{id}', name: 'api_visa_validate_application', methods: ['GET','POST'])]
    public function validateApplication(Request $request, Application $application): JsonResponse
    {
        $application->setStatus('APPROVED');
        $this->applicationRepository->add($application, true);

        $visaParams = $this->visaHelper->mapApplicationToVisa($application);
        $data = $this->eVisaImageGenerator->ajaxGenerate($visaParams);
        return $this->json($data);
    }

}
