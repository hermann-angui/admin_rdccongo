<?php

namespace App\Service;

use Knp\Snappy\Image;
use Symfony\Component\Asset\Packages;
use Symfony\Component\Routing\RouterInterface as Router;
use Symfony\Contracts\Translation\TranslatorInterface;
use Twig\Environment;

abstract class ImageRenderer
{
    const DEFAULT_FILE_NAME = 'evisa.jpg';
    const HTML_SUFFIX = 'html';

    /**
     * @var Image
     */
    protected $snappy;

    /**
     * @var Environment
     */
    protected $twig;

    /**
     * @var Router
     */
    protected $router;

    /**
     * @var Packages
     */
    protected $assetsManager;

    /**
     * @var TranslatorInterface
     */
    protected $translator;

    public function __construct(
        Image $snappy,
        Environment $twig,
        Router $router,
        Packages $assetsManager,
        TranslatorInterface $translator
    ) {
        $this->snappy = $snappy;
        $this->twig = $twig;
        $this->router = $router;
        $this->assetsManager = $assetsManager;
        $this->translator = $translator;
    }
}