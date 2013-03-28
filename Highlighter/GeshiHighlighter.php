<?php
/**
 * @author Theodor Diaconu <diaconu.theodor@gmail.com>
 */

namespace DT\Bundle\GeshiBundle\Highlighter;

use DT\Bundle\GeshiBundle\Component\GeshiResponse;
use GeSHi\GeSHi;

class GeshiHighlighter implements HighlighterInterface
{
    /**
     * @param $string
     * @param $language
     * @param null $path
     * @return mixed
     */
    public function highlight($string, $language, $path = null) {
        $geshi = new GeSHi($string, $language, $path);
        $geshi->enable_line_numbers(GESHI_NORMAL_LINE_NUMBERS);
        $geshi->set_header_type(GESHI_HEADER_NONE);

        return $geshi->parse_code();
    }

    /**
     * @param string $language
     * @param null $content
     * @return GeshiResponse
     */
    public function createResponse($language = 'javascript', $content = null)
    {
        $response = new GeshiResponse();
        $response->setLanguage($language);

        if ($content !== null) {
            $response->setContent($content);
        }

        return $response;
    }

    /**
     * @param $array
     * @return GeshiResponse
     */
    public function createJSONResponse($array)
    {
        return $this->createResponse('javascript', json_encode($array, JSON_PRETTY_PRINT));
    }
}