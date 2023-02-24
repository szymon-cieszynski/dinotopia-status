<?php

namespace App\Tests\Unit\Entity;

use App\Entity\Dinosaur;
use PHPUnit\Framework\TestCase;

class DinosaurTest extends TestCase
{
//    public function testItWorks(): void
//    {
//        self::assertEquals("42", 42); //asseration in PHPUnit, compare two numbers.
//    }
//
//    public function testItWorksTheSame(): void
//    {
//        self::assertSame(42, "42");
//    }

    public function testItCanGetAndSetData(): void
    {

        $dino = new Dinosaur(
            name: 'Big Eaty',
            genus: 'Tyrannosaurus',
            length: 15,
            enclosure: 'Paddock A',
        );

//        self::assertGreaterThan(
//            $dino->getLength(),
//            10,
//            message: 'Dino is supposed to be bigger than 10 meters!'
//        );

        self::assertSame('Big Eaty', $dino->getName());
        self::assertSame('Tyrannosaurus', $dino->getGenus());
        self::assertSame(15, $dino->getLength());
        self::assertSame('Paddock A', $dino->getEnclosure());
    }

    //TDD - first create a test
    public function testDinosaurOver10MetersOrGreaterIsLarge(): void
    {
        $dino = new Dinosaur(name: 'Big Eaty', length: 10);

        self::assertSame('Large', $dino->getSizeDescription(),  'This is supposed to be a large Dinosaur');
    }

    public function testDinoBetween5And9MetersIsMedium(): void
    {
        $dino = new Dinosaur(name: 'Big Eaty', length: 5);
        self::assertSame('Medium', $dino->getSizeDescription(), 'This is supposed to be a medium Dinosaur');
    }
    public function testDinoUnder5MetersIsSmall(): void
    {
        $dino = new Dinosaur(name: 'Big Eaty', length: 4);
        self::assertSame('Small', $dino->getSizeDescription(), 'This is supposed to be a small Dinosaur');
    }
}