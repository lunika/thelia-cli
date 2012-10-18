<?php

namespace Thelia\Component\Toolbox;


class Toolbox {    
    /**
    * Returns a camelized string from a lower case and underscored string by replaceing slash with
    * double-colon and upper-casing each letter preceded by an underscore.
    *
    * @param  string $lower_case_and_underscored_word  String to camelize.
    *
    * @return string Camelized string.
    */
    public static function camelize($lower_case_and_underscored_word)
    {
        $tmp = $lower_case_and_underscored_word;
        $tmp = self::pregtr($tmp, array('#/(.?)#e'    => "'::'.strtoupper('\\1')",
                                             '/(^|_|-)+(.)/e' => "strtoupper('\\2')"));

        return $tmp;
    }
   
    /**
    * Returns subject replaced with regular expression matchs
    *
    * @param mixed $search        subject to search
    * @param array $replacePairs  array of search => replace pairs
    */
    public static function pregtr($search, $replacePairs)
    {
        return preg_replace(array_keys($replacePairs), array_values($replacePairs), $search);
    }
}
?>
