<?php


namespace Tafhyseni\Stringify\Exceptions;


class StringException extends \Exception
{
    public static function noString(): self
    {
        return new static('Missing string value', 400);
    }

    public static function noCharacter(): self
    {
        return new static('Missing character value', 400);
    }

    public static function noClause(): self
    {
        return new static('No character was provided. We were unsure when to cut your string!', 400);
    }

    public static function removedChars(): self
    {
        return new static('Total chars to be removed are missing!', 400);
    }

    public static function startAndEnd(): self
    {
        return new static('Start and End are required for fetching between string', 400);
    }
}