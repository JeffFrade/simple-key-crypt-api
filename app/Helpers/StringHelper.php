<?php

namespace App\Helpers;

class StringHelper
{
    public static function removeAccents(string $text)
    {
        return preg_replace(array(
            '/(á|à|ã|â|ä)/',
            '/(Á|À|Ã|Â|Ä)/',
            '/(é|è|ê|ë)/',
            '/(É|È|Ê|Ë)/',
            '/(í|ì|î|ï)/',
            '/(Í|Ì|Î|Ï)/',
            '/(ó|ò|õ|ô|ö)/',
            '/(Ó|Ò|Õ|Ô|Ö)/',
            '/(ú|ù|û|ü)/',
            '/(Ú|Ù|Û|Ü)/',
            '/(ñ)/',
            '/(Ñ)/',
            '/(ç)/',
            '/(Ç)/'
        ), explode(' ', 'a A e E i I o O u U n N c C'), $text);
    }

    public static function toUpperCase(string $text)
    {
        return strtoupper($text);
    }

    public static function removeSpaces(string $text)
    {
        return preg_replace('/\s+/i', '', $text);
    }

    public static function removePunctuation(string $text)
    {
        return str_replace(self::getPunctation(), '', $text);;
    }

    public static function getPunctation()
    {
        return [
            '?',
            '!',
            '.',
            ',',
            '\'',
            '"',
            '|',
            '(',
            ')',
            '[',
            ']',
            '{',
            '}',
            ':',
            '-',
            ';',
            '&'
        ];
    }

    public static function explodeText(string $text)
    {
        return str_split($text);
    }
}
