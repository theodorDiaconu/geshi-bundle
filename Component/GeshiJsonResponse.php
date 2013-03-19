<?php
/**
 * @author Theodor Diaconu <diaconu.theodor@gmail.com>
 */

namespace dt\Bundle\GeshiBundle\Component;

use dt\Bundle\GeshiBundle\Parser\GeshiParser;

class GeshiJsonResponse extends GeshiResponse
{
    public function setContent($content)
    {
        $parser = new GeshiParser();
        $this->content = $parser->highlight(json_encode($content, JSON_PRETTY_PRINT), 'javascript');
    }
}