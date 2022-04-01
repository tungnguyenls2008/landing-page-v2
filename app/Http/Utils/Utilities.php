<?php

namespace App\Http\Utils;

class Utilities
{
    public function processHighlightText($src = '', $highlight = '')
    {
        if (!isset($src)) {
            return [
                'first' => '',
                'middle' => $highlight,
                'last' => ''
            ];
        }

        if (!isset($highlight)) {
            return [
                'first' => $src,
                'middle' => '',
                'last' => ''
            ];
        }

        $pos = strpos($src, $highlight);
        $first = substr($src, 0, $pos);
        $second = substr($src, $pos + strlen($highlight));

        return [
            'first' => $first,
            'middle' => $highlight,
            'last' => $second
        ];
    }
}
