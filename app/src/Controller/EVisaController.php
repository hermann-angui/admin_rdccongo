<?php

namespace App\Controller;

use App\Entity\Application;
use App\Helper\VisaHelper;
use App\Repository\ApplicationRepository;
use App\Repository\UserRepository;
use App\Service\EVisaImageGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/evisa')]
class EVisaController extends AbstractController
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

    #[Route('/generate/{id}', name: 'evisa_generate', methods: ['GET'])]
    public function generate(Request $request, Application $application, ApplicationRepository $applicationRepository): Response
    {
        $application->setStatus('APPROVED');
        $applicationRepository->add($application, true);

        $visaParams = $this->visaHelper->mapApplicationToVisa($application);
        return $this->eVisaImageGenerator->generate($visaParams);
    }
    #[Route('/approve/{id}', name: 'evisa_approve', methods: ['GET'])]
    public function approve(Request $request, Application $application, ApplicationRepository $applicationRepository): Response
    {
        $application->setStatus('APPROVED');
        $applicationRepository->add($application, true);

        $visaParams = $this->visaHelper->mapApplicationToVisa($application);
        return $this->eVisaImageGenerator->generate($visaParams);
    }

    #[Route('/deny/{id}', name: 'evisa_deny', methods: ['GET'])]
    public function deny(Request $request, Application $application, ApplicationRepository $applicationRepository): Response
    {
        $application->setStatus('DENIED');
        $applicationRepository->add($application, true);

        return $this->redirectToRoute('app_visa_applications');
    }

    #[Route('/needmore/{id}', name: 'evisa_need_more', methods: ['GET'])]
    public function needMore(Request $request, Application $application, ApplicationRepository $applicationRepository): Response
    {
        $application->setStatus('NEED_MORE_INFO');
        $applicationRepository->add($application, true);
        return $this->redirectToRoute('app_visa_applications');
    }

    #[Route('/show/{id}', name: 'evisa_show', methods: ['GET'])]
    public function index(Request $request, Application $application, ApplicationRepository $applicationRepository): Response
    {
        $visaParams = $this->visaHelper->mapApplicationToVisa($application);
        return $this->render('evisa/print.html.twig', ['user' => $visaParams]);
    }
}
