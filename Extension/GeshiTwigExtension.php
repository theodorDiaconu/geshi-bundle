<?php
/**
 * @author Theodor Diaconu <diaconu.theodor@gmail.com>
 */

namespace dt\Bundle\GeshiBundle\Extension;

use GeSHi\GeSHi;
use dt\Bundle\GeshiBundle\Parser\GeshiParser;

class GeshiTwigExtension extends \Twig_Extension
{
    const LANGUAGE_FALLBACK = 'javascript';

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('geshi_highlight', array($this, 'highlight'))
        );
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('geshi_highlight', array($this, 'highlight'))
        );
    }

    public function highlight($string, $language = self::LANGUAGE_FALLBACK, $path = null)
    {
        $parser = new GeshiParser();

        return $parser->highlight($string, $language, $path);
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'dt_geshi.twig_extension';
    }
}