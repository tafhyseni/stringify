<?php

namespace Tafhyseni\Stringify\Tests\Actions;

use Tafhyseni\Stringify\Actions\Manipulation;
use PHPUnit\Framework\TestCase;
use Tafhyseni\Stringify\Exceptions\StringException;
use Tafhyseni\Stringify\Stringify;

class ManipulationTest extends TestCase
{
    /** @test */
    public function remove_from_character_returns_string()
    {
        $string = (new Manipulation(substr(str_shuffle("qwertyuiopasdfghjklzxcvbnm"),0, 6)))
                ->remove_character_from_string(substr(str_shuffle("qwertyuiopasdfghjklzxcvbnm"),0, 1));

        $this->assertIsString($string);
    }

    /** @test */
    public function manipulation_no_string_exception()
    {
        $this->expectException(StringException::class);

        (new Manipulation())->remove_character_from_string(substr(str_shuffle("qwertyuiopasdfghjklzxcvbnm"), 0,1 ));
    }

    /** @test */
    public function manipulation_no_character_exception()
    {
        $this->expectException(StringException::class);

        (new Manipulation(substr(str_shuffle("qwertyuiopasdfghjklzxcvbnm"), 0, 5)))->remove_character_from_string();
    }

    /** @test */
    public function removes_character_from_string()
    {
        $string = (new Manipulation('helloworld'))->remove_character_from_string('d');

        return $this->assertEquals('helloworl', $string);
    }

    /** @test */
    public function chunks_string_into_pieces()
    {
        $string = Stringify::parse('helloworld')->chunk(4);

        return $this->assertEquals('hell owor ld ', $string);
    }

    /** @test  */
    public function chunk_string_into_words()
    {
        $string = Stringify::parse('hello world')->chunk(4);

    }
}
