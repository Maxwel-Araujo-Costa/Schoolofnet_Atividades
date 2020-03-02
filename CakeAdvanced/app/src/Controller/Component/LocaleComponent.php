<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\I18n\I18n;

/**
 * Locale component
 */
class LocaleComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public $components = ['Cookie'];

    public function initialize(array $config)
    {
        $locale = $config['user_preference'] ?? null;
        $localeExists = $this->Cookie->check('locale');

        if ($localeExists) {
            $locale = $this->Cookie->read('locale');
        }

        if ($locale) {
            I18n::locale($locale);
        }
    }
}
