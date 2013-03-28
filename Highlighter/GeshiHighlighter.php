<?php
/**
 * @author Theodor Diaconu <diaconu.theodor@gmail.com>
 */

namespace DT\Bundle\GeshiBundle\Highlighter;

use DT\Bundle\GeshiBundle\Component\GeshiResponse;
use GeSHi\GeSHi;

class GeshiHighlighter implements HighlighterInterface
{
    protected $defaultOptions;

    public function setDefaultOptions($defaultOptions)
    {
        $this->defaultOptions = $defaultOptions;
    }

    public function getDefaultOptions()
    {
        return $this->defaultOptions;
    }

    /**
     * @param $string
     * @param $language
     * @param $callback
     * @return mixed
     */
    public function highlight($string, $language, $callback = null) {
        $geshi = new GeSHi($string, $language, null);
        $geshi->enable_line_numbers(GESHI_NORMAL_LINE_NUMBERS);
        $geshi->set_header_type(GESHI_HEADER_NONE);

        if (is_callable($callback)) {
            $callback($geshi);
        }

        if (is_callable($this->getDefaultOptions())){
            $_callback = $this->getDefaultOptions();
            $_callback($geshi);
        }

        return $geshi->parse_code();
    }

    /**
     * @param null $content
     * @param string $language
     * @param int $statusCode
     * @return GeshiResponse
     */
    public function createResponse($content = null, $language = 'javascript', $statusCode = 200)
    {
        $response = new GeshiResponse();
        $response->setLanguage($language);
        $response->setHighlighter($this);

        if ($content !== null) {
            $response->setContent($content);
        }

        $response->setStatusCode($statusCode);

        return $response;
    }

    /**
     * @param $array
     * @param int $statusCode
     * @return GeshiResponse
     */
    public function createJSONResponse($array, $statusCode = 200)
    {
        return $this->createResponse(json_encode($array, JSON_PRETTY_PRINT), 'javascript', $statusCode);
    }
}