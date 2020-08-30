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

    public function remove_character_from_string(string $character): string
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

    public function remove_last_characters(int $removedChars = 1): string
    {
        return $this->response = substr($this->string, 0, $removedChars);
    }

    public function remove_html_tags_from_string($except = ''): string
    {
        return $this->response = strip_tags($this->string, $except);
    }
}