<?php


namespace Tafhyseni\Stringify\Actions;


use Tafhyseni\Stringify\Exceptions\StringException;

class Manipulation
{
    /**
     * User's input
     * @var
     */
    private $string;

    /**
     * Manipulated string
     * @var $response
     */
    private $response;

    public function __construct(
        string $usersString = ''
    )
    {
        if(!$usersString)
            throw StringException::noString();

        $this->string = $usersString;
    }

    public function remove_character_from_string(string $character = ''): string
    {
        if(!$character)
            throw StringException::noCharacter();

        $this->response = str_replace($character, '', $this->string);
        return $this->response;
    }

    public function chunk_string(int $chunklength, string $end): string
    {
        return $this->response = chunk_split($this->string, $chunklength, $end);
    }

    public function string_to_array(int $length): array
    {
        return $this->response = str_split($this->string, $length);
    }

    public function count_words($format = 0)
    {
        return $this->response = str_word_count($this->string, $format);
    }

    public function string_to_array_by(string $delimiter): array
    {
        return $this->response = explode($delimiter, $this->string);
    }

    public function remove_portion_of_string_after_char(string $clause): string
    {
        return $this->response = strstr($this->string, $clause, true) ?: $this->string;
    }

    public function remove_first_character(int $removedChars = 1): string
    {
        return $this->response = substr($this->string, $removedChars);
    }

    public function remove_last_characters(int $removedChars = -1): string
    {
        return $this->response = substr($this->string, 0, $removedChars);
    }

    public function remove_html_tags_from_string($except = ''): string
    {
        return $this->response = strip_tags($this->string, $except);
    }

    public function count_length_of_string(): int
    {
        return $this->response = strlen($this->string);
    }

    public function to_uppercace(): string
    {
        return $this->response = strtoupper($this->string);
    }

    public function to_lowercase(): string
    {
        return $this->response = strtolower($this->string);
    }

    public function start_with_uppercase(): string
    {
        return $this->response = ucfirst($this->string);
    }

    public function start_with_lowercase(): string
    {
        return $this->response = lcfirst($this->string);
    }

    public function reverse_string(): string
    {
        return $this->response = strrev($this->string);
    }

    public function repeat_string(int $times = 1): string
    {
        return $this->response = str_repeat($this->string, $times);
    }

    public function compare_with_string(string $string): bool
    {
        return $this->response = !strcmp($this->string, $string);
    }

    public function get_string_between(string $start = '', string $end = '')
    {
        if(!$start || !$end)
            throw StringException::startAndEnd();

        var_dump(strpos($this->string, $start));

        if(strpos($this->string, $start) === false)
            return $this->response = $this->string;

        $startChars = strpos($this->string, $start) + strlen($start);
        $firstPart = substr($this->string, $startChars, strlen($this->string));
        $endChars = strpos($firstPart, $end);
        if ($endChars == 0) {
            $endChars = strlen($firstPart);
        }

        return substr($firstPart, 0, $endChars);
    }
}