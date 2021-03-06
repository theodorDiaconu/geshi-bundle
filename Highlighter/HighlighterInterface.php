<?php
/**
 * @author Theodor Diaconu <diaconu.theodor@gmail.com>
 */

namespace DT\Bundle\GeshiBundle\Highlighter;

interface HighlighterInterface
{
    public function highlight($string, $language, $callback = null);

    public function createResponse($language = 'javascript', $content = null);
}