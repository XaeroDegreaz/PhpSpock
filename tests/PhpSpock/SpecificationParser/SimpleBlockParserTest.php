<?php
/**
 * This file is part of PhpSpock.
 *
 * PhpSpock is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * PhpSpock is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with PhpSpock.  If not, see <http://www.gnu.org/licenses/>.
 *
 * Copyright 2011 Aleksandr Rudakov <ribozz@gmail.com>
 *
 **/

/**
 * Date: 11/3/11
 * Time: 1:29 PM
 * @author Aleksandr Rudakov <ribozz@gmail.com>
 */

namespace PhpSpock\SpecificationParser;
 
class SimpleBlockParserTest extends \PHPUnit\Framework\TestCase {

    /**
     * @var \PhpSpock\SpecificationParser\ThenBlockParser
     */
    protected $parser;

    protected function setUp():void
    {
        parent::setUp();

        $this->parser = new SimpleBlockParser();
    }

    protected function tearDown():void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function parseSeveralLines()
    {
        $code = '1 * $service->call();
                $test == 123;';

        $result = $this->parser->parse($code);

        $this->assertInstanceOf('PhpSpock\Specification\SimpleBlock', $result);

        $this->assertEquals($code, $result->getCode());
    }
}
