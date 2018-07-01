<?php

namespace ExifEye\Test\core;

use ExifEye\core\Block\Ifd;
use ExifEye\core\Block\Tag;
use ExifEye\core\Block\Tiff;
use ExifEye\core\Entry\Core\Ascii;
use ExifEye\core\Entry\Time;
use ExifEye\core\Spec;

class IfdTest extends ExifEyeTestCaseBase
{
    public function testIfd()
    {
        $tiff_mock = $this->getMockBuilder('ExifEye\core\Block\Tiff')
            ->disableOriginalConstructor()
            ->getMock();

        $ifd = new Ifd($tiff_mock, 'IFD0');

        $this->assertCount(0, $ifd->getMultipleElements('tag'));

        $desc = new Ascii($ifd, ['Hello?']);
        new Tag($ifd, 0x010E, 'ExifEye\core\Entry\Core\Ascii', ['Hello?']);

        $date = new Time($ifd, [12345678]);
        new Tag($ifd, 0x0132, 'ExifEye\core\Entry\Time', [12345678]);

        $this->assertCount(2, $ifd->getMultipleElements('tag'));

        $tags = [];
        foreach ($ifd->getMultipleElements('tag') as $tag) {
            $tags[$tag->getAttribute('id')] = $tag->getElement("entry");
        }

        $this->assertSame($tags[0x010E]->getValue(), $desc->getValue());
        $this->assertSame($tags[0x0132]->getValue(), $date->getValue());
    }
}
