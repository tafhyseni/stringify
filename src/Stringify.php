<?php

namespace Tafhyseni\Stringify;

use Tafhyseni\Stringify\Actions\Check;
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
    public static function parse(string $string = '')
    {
        if(!$string)
            throw StringException::noString();

        return new self($string);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->string;
    }

    /**
     * @return array|string
     */
    public function getArray(): array
    {
        return $this->string;
    }


    /**
     * Returns first number of characters
     * @param int $length
     * @return $this
     */
    public function first(int $length = 1): self
    {
        $this->string = (new Actions\Manipulation($this->string))->get_first_number_of_characters($length);
        return $this;
    }

    /**
     * Return last number of characters
     * @param int $length
     * @return $this
     * @throws StringException
     */
    public function last(int $length = 1): self
    {
        $this->string = (new Manipulation($this->string))->get_last_number_of_characters($length);
        return $this;
    }

    /**
     * Removes character from string
     */
    public function removeCharacter(string $character): self
    {
        $this->string = (new Actions\Manipulation($this->string))->remove_character_from_string($character);
        return $this;
    }

    /**
     * Splits a string into space separated chunks
     * @param int $length
     * @param string $endWith
     * @throws Exceptions\StringException
     */
    public function chunk(int $length = 1): self
    {
        $this->string = (new Actions\Manipulation($this->string))->chunk_string($length, ' ');
        return $this;
    }

    /**
     * Splits a string into "desire" separated chunks
     * @param int $length
     * @param string $endWith
     * @throws Exceptions\StringException
     */
    public function chunkBy(string $splitBy, int $length = 1): self
    {
        $this->string = (new Actions\Manipulation($this->string))->chunk_string($length, $splitBy);
        return $this;
    }

    /**
     * @param int $length
     * @return array
     * @throws StringException
     */
    public function toArray(int $length = 1): self
    {
        $this->string = (new Actions\Manipulation($this->string))->string_to_array($length);
        return $this;
    }

    /**
     * @param string $delimiter
     * @return array
     * @throws StringException
     */
    public function toArrayBy(string $delimiter = " "): self
    {
        $this->string = (new Actions\Manipulation($this->string))->string_to_array_by($delimiter);
        return $this;
    }

    /**
     * @return int
     * @throws StringException
     */
    public function countWords(): self
    {
        $this->string = (new Actions\Manipulation($this->string))->count_words();
        return $this;
    }

    /**
     * @return string
     * @throws StringException
     */
    public function toUpperCase(): self
    {
        $this->string = (new Actions\Manipulation($this->string))->to_uppercace();
        return $this;
    }

    /**
     * @return string
     * @throws StringException
     */
    public function toLowerCase(): self
    {
        $this->string = (new Actions\Manipulation($this->string))->to_lowercase();
        return $this;
    }

    /**
     * @return string
     * @throws StringException
     */
    public function startWithUpperCase(): self
    {
        $this->string = (new Actions\Manipulation($this->string))->start_with_uppercase();
        return $this;
    }

    /**
     * @return string
     * @throws StringException
     */
    public function startWithLowerCase(): self
    {
        $this->string = (new Actions\Manipulation($this->string))->start_with_lowercase();
        return $this;
    }

    /**
     * Removes a portion of string after a defined character
     * @param string $clause
     * @return false|string
     * @throws StringException
     */
    public function removeAfter(string $clause = ""): self
    {
        if(!$clause)
            throw StringException::noClause();

        $this->string = (new Manipulation($this->string))->remove_portion_of_string_after_char($clause);
        return $this;
    }

    /**
     * Removes first character from a string
     * @return string
     * @throws StringException
     */
    public function removeFirstChar(): self
    {
        $this->string = (new Manipulation($this->string))->remove_first_character(1);
        return $this;
    }

    /**
     * Removes first $chars from a string
     * @param int $chars
     * @return string
     * @throws StringException
     */
    public function removeFirstChars(int $chars = 0): self
    {
        if(!$chars)
            throw StringException::removedChars();

        $this->string = (new Manipulation($this->string))->remove_first_character($chars);
        return $this;
    }

    /**
     * @return string
     * @throws StringException
     */
    public function removeLastChar(): self
    {
        $this->string = (new Manipulation($this->string))->remove_last_characters();
        return $this;
    }

    /**
     * @param int $chars
     * @return string
     * @throws StringException
     */
    public function removeLastChars(int $chars = 1): self
    {
        if(!$chars)
            throw StringException::removedChars();

        $this->string = (new Manipulation($this->string))->remove_last_characters(-abs($chars));
        return $this;
    }

    /**
     * @return string
     * @throws StringException
     */
    public function removeHTML(): self
    {
        $this->string = (new Manipulation($this->string))->remove_html_tags_from_string();
        return $this;
    }

    /**
     * @param string $allowedTags
     * @return string
     * @throws StringException
     */
    public function removeHtmlExpect($allowedTags = ''): self
    {
        $this->string = (new Manipulation($this->string))->remove_html_tags_from_string($allowedTags);
        return $this;
    }

    /**
     * @return int
     * @throws StringException
     */
    public function count(): self
    {
        $this->string = (new Manipulation($this->string))->count_length_of_string();
        return $this;
    }

    /**
     * @return string
     * @throws StringException
     */
    public function reverse(): self
    {
        $this->string = (new Actions\Manipulation($this->string))->reverse_string();
        return $this;
    }

    /**
     * @param int $times
     * @return string
     * @throws StringException
     */
    public function repeat(int $times = 1): self
    {
        $this->string = (new Manipulation($this->string))->repeat_string($times);
        return $this;
    }

    /**
     * @param string $string
     * @return bool
     * @throws StringException
     */
    public function compareTo(string $string): self
    {
        $this->string = (new Manipulation($this->string))->compare_with_string($string);
        return $this;
    }

    /**
     * Returns string between start and end parameters
     * @param string $start
     * @param string $end
     * @return $this
     * @throws StringException
     */
    public function between(string $start = '', string $end = ''): self
    {
        $this->string = (new Manipulation($this->string))->get_string_between($start, $end);
        return $this;
    }

    /**
     * Encodes string to base64
     * @return $this
     */
    public function base64Encode(): self
    {
        $this->string = base64_encode($this->string);
        return $this;
    }

    /**
     * Decodes string from base64
     * @return $this
     */
    public function base64Decode(): self
    {
        $this->string = base64_decode($this->string);
        return $this;
    }

    /**
     * Append to string
     * @return $this
     */
    public function append(string $string): self
    {
        $this->string = $this->string . $string;
        return new self($this->string);
    }

    /**
     * @EXPRESSIONS
     */

    /**
     * Removes numbers from string
     * @return string
     * @throws StringException
     */
    public function removeNumbers(): self
    {
        $this->string = (new Expression($this->string))->remove_numbers_from_string();
        return $this;
    }

    /**
     * Takes your string and returns it in camelCase version.
     * @return $this
     */
    public function toCamelCase(): self
    {
        $this->string = (new Expression($this->string))->convert_string_to_camel_case();
        return $this;
    }

    /**
     * Check Ups
     */
    public function isNumeric(): self
    {
        $this->string = (new Check($this->string))->string_is_numeric();
        return $this;
    }

    /**
     * @return bool
     */
    public function isAlphaNumeric(): self
    {
        $this->string = (new Check($this->string))->string_is_alpha_numeric();
        return $this;
    }

    /**
     * @return bool
     */
    public function isAlpha(): self
    {
        $this->string = (new Check($this->string))->string_is_alpha();
        return $this;
    }

    /**
     * Checks whether a json format is found
     * @return bool
     */
    public function isJSON(): self
    {
        $this->string = (new Check($this->string))->string_is_json();
        return $this;
    }


    /**
     * Encoding
     *
     * getEncoding
     * htmlEncoding
     * htmlDecoding
     */

    public function htmlEncode(): self
    {
        $this->string = htmlentities($this->string);
        return $this;
    }

    /**
     * Decodes encoded html string elements
     * @return $this
     */
    public function htmlDecode(): self
    {
        $this->string = html_entity_decode($this->string);
        return $this;
    }
}