<?php

namespace App\Services;

use App\Helpers\StringHelper;

class CryptService
{
    private $alphabet = [
        'A',
        'B',
        'C',
        'D',
        'E',
        'F',
        'G',
        'H',
        'I',
        'J',
        'K',
        'L',
        'M',
        'N',
        'O',
        'P',
        'Q',
        'R',
        'S',
        'T',
        'U',
        'V',
        'W',
        'X',
        'Y',
        'Z'
    ];

    private $encrypted = [];

    public function setKey(int $key)
    {
        $this->key = count($this->alphabet) - $key;
        $this->mountEncrypted();
    }

    private function mountEncrypted()
    {
        $end = array_slice($this->alphabet, $this->key);
        $start = array_diff($this->alphabet, $end);

        $this->encrypted = array_merge($end, $start);
    }

    public function getEncryptedRelation()
    {
        return array_combine($this->alphabet, $this->encrypted);
    }

    public function encryptText(string $text, bool $removeSpaces = true, bool $removePunctation = true)
    {
        $text = StringHelper::removeAccents($text);
        $text = StringHelper::toUpperCase($text);

        if ($removeSpaces) {
            $text = StringHelper::removeSpaces($text);
        }

        if ($removePunctation) {
            $text = StringHelper::removePunctuation($text);
        }

        return $this->convert($text, $this->getEncryptedRelation());
    }

    public function decryptText(string $text)
    {
        return $this->convert($text, array_flip($this->getEncryptedRelation()));
    }

    private function convert(string $text, array $crypt)
    {
        $text = StringHelper::explodeText($text);
        $punctations = StringHelper::getPunctation();
        $encrypted = '';

        foreach ($text as $letter) {
            if (in_array($letter, $punctations) || $letter == ' ') {
                $encrypted .= $letter;
                continue;
            }

            $encrypted .= $crypt[$letter];
        }

        return $encrypted;
    }
}
