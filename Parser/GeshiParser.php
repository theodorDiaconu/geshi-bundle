<?php
/**
 * @author Theodor Diaconu <diaconu.theodor@gmail.com>
 */

namespace DT\Bundle\GeshiBundle\Parser;

use GeSHi\GeSHi;

class GeshiParser
{
    public function highlight($string, $language, $path = null) {
        $geshi = new GeSHi($string, $language, $path);
        $geshi->enable_line_numbers(GESHI_NORMAL_LINE_NUMBERS);
        $geshi->set_header_type(GESHI_HEADER_NONE);

        return $geshi->parse_code();
    }
}