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

        $desc = new Ascii(['Hello?'], $ifd);
        $tag = new Tag($ifd, 0x010E, 'ExifEye\core\Entry\Core\Ascii', ['Hello?']);
        $ifd->xxAddSubBlock($tag);

        $date = new Time([12345678], $ifd);
        $tag_1 = new Tag($ifd, 0x0132, 'ExifEye\core\Entry\Time', [12345678]);
        $ifd->xxAddSubBlock($tag_1);

        $this->assertCount(2, $ifd->xxGetSubBlocks('Tag'));

        $entries = [];
        foreach ($ifd->xxGetSubBlocks('Tag') as $tag) {
            $entries[$tag->getId()] = $tag->getEntry();
        }

        $this->assertSame($entries[0x010E], $desc);
        $this->assertSame($entries[0x0132], $date);
    }
}
