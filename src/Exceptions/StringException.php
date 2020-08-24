<?php


namespace Tafhyseni\Stringify\Exceptions;


class StringException extends \Exception
{
    public static function noString(): self
    {
        return new static('Missing string value', 400);
    }
}