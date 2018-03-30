<?php

namespace ExifEye\Test\core;

use ExifEye\core\Block\Ifd;
use ExifEye\core\Block\Tag;
use ExifEye\core\Entry\Ascii;
use ExifEye\core\Entry\Time;
use ExifEye\core\Spec;

class IfdTest extends ExifEyeTestCaseBase
{
    public function testIfd()
    {
        $ifd = new Ifd(Spec::getIfdIdByType('IFD0'));

        $this->assertCount(0, $ifd->xxGetSubBlocks());

        $desc = new Ascii(['Hello?']);
        $ifd->xxAddSubBlock(new Tag($ifd->getType(), 0x010E, $desc->getFormat(), $desc->getComponents(), $desc));

        $date = new Time([12345678]);
        $ifd->xxAddSubBlock(new Tag($ifd->getType(), 0x0132, $date->getFormat(), $date->getComponents(), $date));

        $this->assertCount(2, $ifd->xxGetSubBlocks());

        $entries = [];
        foreach ($ifd->xxGetSubBlocks() as $tag) {
            $entries[$tag->getId()] = $tag->getEntry();
        }

        $this->assertSame($entries[0x010E], $desc);
        $this->assertSame($entries[0x0132], $date);
    }
}
