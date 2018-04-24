<?php

namespace ExifEye\Test\core;

use ExifEye\core\Block\Ifd;
use ExifEye\core\Block\Tag;
use ExifEye\core\Entry\Core\Ascii;
use ExifEye\core\Entry\Time;
use ExifEye\core\Spec;

class IfdTest extends ExifEyeTestCaseBase
{
    public function testIfd()
    {
        $ifd = new Ifd(Spec::getIfdIdByType('IFD0'));

        $this->assertCount(0, $ifd->xxGetSubBlocks('Tag'));

        $desc = new Ascii(['Hello?']);
        $ifd->xxAddSubBlock(new Tag($ifd, 0x010E, 'ExifEye\core\Entry\Core\Ascii', ['Hello?']));

        $date = new Time([12345678]);
        $ifd->xxAddSubBlock(new Tag($ifd, 0x0132, 'ExifEye\core\Entry\Time', [12345678]));

        $this->assertCount(2, $ifd->xxGetSubBlocks('Tag'));

        $tags = [];
        foreach ($ifd->xxGetSubBlocks('Tag') as $tag) {
            $tags[$tag->getId()] = $tag->getEntry();
        }

        $this->assertSame($tags[0x010E]->getValue(), $desc->getValue());
        $this->assertSame($tags[0x0132]->getValue(), $date->getValue());
    }
}
