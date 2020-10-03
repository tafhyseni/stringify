<?php


namespace Tafhyseni\Stringify\Actions;


class Check
{
    /**
     * User's input
     * @var
     */
    private $string;

    /**
     * @var $response return object
     */
    private $response;

    public function __construct(
        string $userString = ''
    )
    {
        $this->string = $userString;
    }

    /**
     * @return bool
     */
    public function string_is_numeric(): bool
    {
        return $this->response = is_numeric($this->string);
    }

    /**
     * @return bool
     */
    public function string_is_alpha_numeric(): bool
    {
        return $this->response = preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $this->string);
    }

    /**
     * @return bool
     */
    public function string_is_alpha(): bool
    {
        return $this->response = ctype_alpha($this->string);
    }

    public function string_is_json(): bool
    {
        json_decode($this->string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}