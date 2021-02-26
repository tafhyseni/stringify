<?php

namespace Tafhyseni\Stringify\Tests\Actions;

use Tafhyseni\Stringify\Actions\Manipulation;
use PHPUnit\Framework\TestCase;
use Tafhyseni\Stringify\Exceptions\StringException;
use Tafhyseni\Stringify\Stringify;

class ManipulationTest extends TestCase
{
    /** @test */
    public function parse_exception()
    {
        $this->expectException(StringException::class);
        Stringify::parse();
    }

    /** @test */
    public function returns_array()
    {
        $this->assertIsArray(Stringify::parse('array')->toArray()->getArray());
    }

    /** @test */
    public function get_returns_string()
    {
        $this->assertIsString(Stringify::parse('test')->get());
    }

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

        $this->assertEquals('helloworl', $string);
    }

    /** @test */
    public function chunks_string_into_pieces()
    {
        $string = Stringify::parse('helloworld')->chunk(4)->get();

        $this->assertEquals('hell owor ld ', $string);
    }

    /** @test  */
    public function chunk_string_into_words()
    {
        $this->assertEquals('ch un kt hi s ', Stringify::parse('chunkthis')->chunk(2)->get());
    }

    /** @test */
    public function chain_two_methods()
    {
        $this->assertEquals('tinuphptinuphp', Stringify::parse('phpunit')->repeat(2)->reverse()->get());
    }

    /** @test */
    public function string_to_array()
    {
        $this->assertIsArray(Stringify::parse('this is an element')->toArray()->getArray());
    }

    /** @test */
    public function to_array_by_comma()
    {
        $this->assertEquals(['php', 'unit'], Stringify::parse('php,unit')->toArrayBy(',')->getArray());
    }

    /** @test */
    public function chunk_string_with_length()
    {
        $this->assertEquals('php uni t ', Stringify::parse('phpunit')->chunk(3)->get());
    }

    /** @test */
    public function chunk_by_split()
    {
        $this->assertEquals('te,st', Stringify::parse('test')->chunkBy(',', 2)->removeLastChar()->get());
    }
}
