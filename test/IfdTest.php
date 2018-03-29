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


        $desc = new Ascii($ifd->getType(), 0x010E, ['Hello?']);
        $tag = new Tag($desc->getIfdType(), $desc->getId(), $desc->getFormat(), $desc->getComponents(), null/* xx */);
        $ifd->xxAddSubBlock($tag);
        $tag->xxAddEntry($desc);

        $date = new Time($ifd->getType(), 0x0132, [12345678]);
        $tag = new Tag($date->getIfdType(), $date->getId(), $date->getFormat(), $date->getComponents(), null/* xx */);
        $ifd->xxAddSubBlock($tag);
        $tag->xxAddEntry($date);


        $this->assertCount(2, $ifd->xxGetSubBlocks());

        $entries = [];
        foreach ($ifd->xxGetSubBlocks() as $tag) {
            $entries[$tag->getId()] = $tag->xxGetEntry()->getValue();
        }

        $this->assertSame($entries[0x010E], $desc);
        $this->assertSame($entries[0x0132], $date);
    }
}
