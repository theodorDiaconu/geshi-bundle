<?php
/**
 * @author Theodor Diaconu <diaconu.theodor@gmail.com>
 */

namespace DT\Bundle\GeshiBundle\Component;

use Symfony\Component\HttpFoundation\Response;
use DT\Bundle\GeshiBundle\Parser\GeshiParser;

class GeshiResponse extends Response
{
    protected $language;
    const LANGUAGE_FALLBACK = 'javascript';

    public function setLanguage($language)
    {
        $this->language = $language;
    }

    public function getLanguage()
    {
        if ($this->language === null) {

            return static::LANGUAGE_FALLBACK;
        }

        return $this->language;
    }

    public function setContent($content)
    {
        $parser = new GeshiParser();
        $this->content = $parser->highlight($content, $this->getLanguage());
    }
}