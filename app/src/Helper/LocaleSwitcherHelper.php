<?php

namespace App\Helper;

use Symfony\Component\Translation\Locale;

class LocaleSwitcherHelper
{
    private LocaleSwitcher $localeSwitcher;

    public function __construct(LocaleSwitcher $localeSwitcher)
    {
        $this->localeSwitcher = $localeSwitcher;
    }

    public function switchToLanguage(string $language='fr')
    {
        // you can get the current application locale like this:
        $currentLocale = $this->localeSwitcher->getLocale();

        // you can set the locale for the entire application like this:
        // (from now on, the application will use 'fr' (French) as the
        // locale; including the default locale used to translate Twig templates)
        $this->localeSwitcher->setLocale($language);

        // reset the current locale of your application to the configured default locale
        // in config/packages/translation.yaml, by option 'default_locale'
        $this->localeSwitcher->reset();

        // you can also run some code with a certain locale, without
        // changing the locale for the rest of the application
        $this->localeSwitcher->runWithLocale('es', function() {

            // e.g. render here some Twig templates using 'es' (Spanish) locale

        });

        // ...
    }


}