<?php
/**
 * @author Theodor Diaconu <diaconu.theodor@gmail.com>
 */

namespace DT\Bundle\GeshiBundle\Extension;

use GeSHi\GeSHi;
use DT\Bundle\GeshiBundle\Parser\GeshiParser;

class GeshiTwigExtension extends \Twig_Extension
{
    const LANGUAGE_FALLBACK = 'javascript';

    /** @var \DT\Bundle\GeshiBundle\Extension\HighlighterInterface */
    private $highlighter;

    public function __construct(HighlighterInterface $highlighter)
    {
        $this->highlighter = $highlighter;
    }

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

    /**
     * @param $string
     * @param string $language
     * @param null $path
     * @return mixed
     */
    public function highlight($string, $language = self::LANGUAGE_FALLBACK, $path = null)
    {
        return $this->highlighter->highlight($string, $language, $path);
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