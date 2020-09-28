<?php

namespace Tafhyseni\Stringify;

use Tafhyseni\Stringify\Actions\Expression;
use Tafhyseni\Stringify\Actions\Manipulation;
use Tafhyseni\Stringify\Exceptions\StringException;

class Stringify
{

    /**
     * Defined string
     * @var
     */
    protected $string;

    public function __construct(
        string $string
    )
    {
        $this->string = $string;
    }

    /**
     * @param string $string
     * @return static
     */
    public static function parse(string $string)
    {
        return new static($string);
    }

    /**
     * Removes character from string
     */
    public function removeCharacter(string $character): string
    {
        return (new Actions\Manipulation($this->string))->remove_character_from_string($character);
    }

    /**
     * Splits a string into space separated chunks
     * @param int $length
     * @param string $endWith
     * @throws Exceptions\StringException
     */
    public function chunk(int $length = 1): string
    {
        return (new Actions\Manipulation($this->string))->chunk_string($length, ' ');
    }

    /**
     * Splits a string into "desire" separated chunks
     * @param int $length
     * @param string $endWith
     * @throws Exceptions\StringException
     */
    public function chunkBy(string $splitBy, int $length = 1): string
    {
        return (new Actions\Manipulation($this->string))->chunk_string($length, $splitBy);
    }

    /**
     * @param int $length
     * @return array
     * @throws StringException
     */
    public function toArray(int $length = 1)
    {
        return (new Actions\Manipulation($this->string))->string_to_array($length);
    }

    /**
     * @param string $delimiter
     * @return array
     * @throws StringException
     */
    public function toArrayBy(string $delimiter = " "): array
    {
        return (new Actions\Manipulation($this->string))->string_to_array_by($delimiter);
    }

    /**
     * @return int
     * @throws StringException
     */
    public function countWords(): int
    {
        return (new Actions\Manipulation($this->string))->count_words();
    }

    /**
     * @return string
     * @throws StringException
     */
    public function toUpperCase()
    {
        return (new Actions\Manipulation($this->string))->to_uppercace();
    }

    /**
     * @return string
     * @throws StringException
     */
    public function toLowerCase()
    {
        return (new Actions\Manipulation($this->string))->to_lowercase();
    }

    /**
     * @return string
     * @throws StringException
     */
    public function startWithUpperCase()
    {
        return (new Actions\Manipulation($this->string))->start_with_uppercase();
    }

    /**
     * @return string
     * @throws StringException
     */
    public function startWithLowerCase()
    {
        return (new Actions\Manipulation($this->string))->start_with_lowercase();
    }

    /**
     * Removes a portion of string after a defined character
     * @param string $clause
     * @return false|string
     * @throws StringException
     */
    public function removeAfter(string $clause = "")
    {
        if(!$clause)
            throw StringException::noClause();

        return (new Manipulation($this->string))->remove_portion_of_string_after_char($clause);
    }

    /**
     * @return string
     * @throws StringException
     */
    public function removeFirstChar(): string
    {
        return (new Manipulation($this->string))->remove_first_character(1);
    }

    /**
     * @param int $chars
     * @return string
     * @throws StringException
     */
    public function removeFirstChars(int $chars = 0): string
    {
        if(!$chars)
            throw StringException::removedChars();

        return (new Manipulation($this->string))->remove_first_character($chars);
    }

    /**
     * @return string
     * @throws StringException
     */
    public function removeLastChar(): string
    {
        return (new Manipulation($this->string))->remove_last_characters();
    }

    /**
     * @param int $chars
     * @return string
     * @throws StringException
     */
    public function removeLastChars(int $chars = 0): string
    {
        if(!$chars)
            throw StringException::removedChars();

        return (new Manipulation($this->string))->remove_last_characters($chars);
    }

    /**
     * @return string
     * @throws StringException
     */
    public function removeHTML(): string
    {
        return (new Manipulation($this->string))->remove_html_tags_from_string();
    }

    /**
     * @param string $allowedTags
     * @return string
     * @throws StringException
     */
    public function removeHtmlExpect($allowedTags = '')
    {
        return (new Manipulation($this->string))->remove_html_tags_from_string($allowedTags);
    }

    /**
     * @return int
     * @throws StringException
     */
    public function count()
    {
        return (new Manipulation($this->string))->count_length_of_string();
    }

    /**
     * @return string
     * @throws StringException
     */
    public function reverse()
    {
        return (new Actions\Manipulation($this->string))->reverse_string();
    }

    /**
     * @EXPRESSIONS
     */

    /**
     * @return string
     * @throws StringException
     */
    public function removeNumbers(): string
    {
        return (new Expression($this->string))->remove_numbers_from_string();
    }



    //TODO: Remove all specials from a string
    // https://stackoverflow.com/questions/14114411/remove-all-special-characters-from-a-string
    //TODO: Remove all html tags from a string
}