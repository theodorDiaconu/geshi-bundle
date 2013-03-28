<?php
/**
 * @author Theodor Diaconu <diaconu.theodor@gmail.com>
 */

namespace DT\Bundle\GeshiBundle\Component;

use DT\Bundle\GeshiBundle\Highlighter\HighlighterInterface;
use Symfony\Component\HttpFoundation\Response;

class GeshiResponse extends Response
{
    protected $language;

    /** @var HighlighterInterface */
    protected $highlighter;

    /**
     * @param $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Sets content to the response
     *
     * @param mixed $content
     * @throws \Exception
     * @return $this|Response|void
     */
    public function setContent($content)
    {
        if (null !== $this->getHighlighter()) {
            $this->content = $this->getHighlighter()->highlight($content, $this->getLanguage());
        }
    }

    /**
     * @param \DT\Bundle\GeshiBundle\Highlighter\HighlighterInterface $highlighter
     */
    public function setHighlighter($highlighter)
    {
        $this->highlighter = $highlighter;
    }

    /**
     * @return \DT\Bundle\GeshiBundle\Highlighter\HighlighterInterface
     */
    public function getHighlighter()
    {
        return $this->highlighter;
    }
}