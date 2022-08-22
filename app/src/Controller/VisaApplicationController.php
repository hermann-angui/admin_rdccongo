<?php

namespace App\Controller;

use App\Entity\Application;
use App\Helper\VisaHttpClient;
use App\Repository\ApplicationRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/visa')]
class VisaApplicationController extends AbstractController
{
    protected UserRepository $userRepository;
    protected ApplicationRepository $applicationRepository;
    protected VisaHttpClient $visaHttpClient;

    public function __construct(UserRepository $userRepository,
                                ApplicationRepository $applicationRepository,
                                VisaHttpClient $visaHttpClient,)
    {
        $this->visaHttpClient = $visaHttpClient;
        $this->userRepository = $userRepository;
        $this->applicationRepository = $applicationRepository;
    }

    #[Route('/', name: 'app_visa_applications', methods: ['GET','POST'])]
    public function findAll(Request $request): Response
    {
        $all = $this->applicationRepository->findAll();
        return $this->render('visa_application/index.html.twig', ['applications' => $all]);
    }

    #[Route('/detail/{id}', name: 'app_visa_application_details', methods: ['GET'])]
    public function approve(Request $request, Application $application): Response
    {
        $documents = $this->visaHttpClient->getApplicationById($application->getId());
        return $this->render('visa_application/details.html.twig', ['application' => $application, "documents" => $documents]);
    }

    #[Route('/generate/{id}', name: 'app_visa_application_generate', methods: ['GET'])]
    public function generate(Request $request, Application $application): Response
    {
        $result = $this->visaHttpClient->generateVisa($application->getId());
        $documents = $this->visaHttpClient->getApplicationById($application->getId());
        return $this->render('visa_application/show_generate_visa.html.twig', ['application' => $application, "documents" => $documents]);
    }

    #[Route('/updatestatus/{id}', name: 'app_visa_application_updatestatus', methods: ['GET'])]
    public function updateStatus(Request $request, Application $application): Response
    {
        $result = $this->visaHttpClient->changeApplicationStatus($application->getId(), $request->query->get('status'));
        return $this->redirectToRoute('app_visa_application_details', ['id' => $application->getId()]);
    }

    #[Route('/display_visa/{id}', name: 'app_visa_application_display', methods: ['GET'])]
    public function displayVisa(Request $request, Application $application): Response
    {
        $status = $request->query->get('status');

        $application->setStatus($status);
        $this->applicationRepository->add($application, true);

        return $this->redirectToRoute('app_visa_application_details', ['id' => $application->getId()]);
    }
}
