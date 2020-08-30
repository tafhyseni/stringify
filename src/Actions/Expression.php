<?php


namespace Tafhyseni\Stringify\Actions;


use Tafhyseni\Stringify\Exceptions\StringException;

class Expression
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

    public function remove_numbers_from_string(): string
    {
        return $this->response = preg_replace('/\d+/u', '', $this->string);
    }
}