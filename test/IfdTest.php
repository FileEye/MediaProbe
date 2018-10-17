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

        $ifd = new Ifd($tiff_mock, 'ifd0', 0, 'IFD0', Spec::getFormatIdFromName('Long'));

        $this->assertCount(0, $ifd->getMultipleElements('tag'));

        $tag1 = new Tag($ifd, 'tag', 0x010E, 'ImageDescription', Spec::getFormatIdFromName('Ascii'), 1);
        $desc = new Ascii($tag1, ['Hello?']);

        $tag2 = new Tag($ifd, 'tag', 0x0132, 'DateTime', Spec::getFormatIdFromName('Ascii'), 1);
        $date = new Time($tag2, [12345678]);

        $this->assertCount(2, $ifd->getMultipleElements('tag'));

        $tags = [];
        foreach ($ifd->getMultipleElements('tag') as $tag) {
            $tags[$tag->getAttribute('id')] = $tag->getElement("entry");
        }

        $this->assertSame($tags[0x010E]->getValue(), $desc->getValue());
        $this->assertSame($tags[0x0132]->getValue(), $date->getValue());
    }
}
