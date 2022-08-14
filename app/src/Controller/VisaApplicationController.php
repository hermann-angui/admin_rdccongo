<?php

namespace App\Controller;

use App\Entity\Application;
use App\Helper\VisaHelper;
use App\Repository\ApplicationRepository;
use App\Repository\UserRepository;
use App\Service\EVisaImageGenerator;
use http\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/visa')]
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

    #[Route('/', name: 'app_visa_applications', methods: ['GET','POST'])]
    public function findAll(Request $request): Response
    {
        $all = $this->applicationRepository->findAll();
        return $this->render('visa_application/index.html.twig', ['applications' => $all]);
    }

    #[Route('/detail/{id}', name: 'app_visa_application_details', methods: ['GET'])]
    public function approve(Request $request, Application $application): Response
    {
        $client = HttpClient::create();
        $result = $client->request('POST','http://nte.test.xo-dmp.com:85/api/visa/attached_document/' . $application->getId());

        $documents = json_decode($result->getContent());
        return $this->render('visa_application/details.html.twig', ['application' => $application, "documents" => $documents]);
    }


    #[Route('/approve/{id}', name: 'app_visa_application_approve', methods: ['GET'])]
    public function changeStatus(Request $request, Application $application): Response
    {
        $application->setStatus('APPROVED');
        $this->applicationRepository->add($application, true);

        return $this->redirectToRoute('app_visa_application_details', ['id' => $application->getId()]);
    }

    #[Route('/deny/{id}', name: 'app_visa_application_deny', methods: ['GET'])]
    public function denyStatus(Request $request, Application $application): Response
    {
        $status = $request->query->get('DENIED');

        $application->setStatus($status);
        $this->applicationRepository->add($application, true);

        return $this->redirectToRoute('app_visa_application_details', ['id' => $application->getId()]);
    }

    #[Route('/needmore/{id}', name: 'app_visa_application_needmore', methods: ['GET'])]
    public function needMoreStatus(Request $request, Application $application): Response
    {
        $application->setStatus('NEED_MORE_INFO');
        $this->applicationRepository->add($application, true);

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
