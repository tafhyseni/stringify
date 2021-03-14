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

    public function convert_string_to_camel_case(): string
    {
        $string = preg_replace('/^[-_]+/', '', $this->string);

        $string = preg_replace_callback(
            '/[-_\s]+(.)?/u',
            function ($match){
                if (isset($match[1])) {
                    return \mb_strtoupper($match[1]);
                }

                return '';
            },
            $string
        );

        $string = preg_replace_callback(
            '/[\d]+(.)?/u',
            function ($match) {
                return \mb_strtoupper($match[0]);
            },
            $string
        );

        return $this->response = $string;
    }
}