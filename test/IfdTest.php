<?php

namespace ExifEye\Test\core;

use ExifEye\core\Block\Ifd;
use ExifEye\core\Block\IfdItem;
use ExifEye\core\Block\Tag;
use ExifEye\core\Block\Tiff;
use ExifEye\core\Entry\Core\Ascii;
use ExifEye\core\Entry\Time;
use ExifEye\core\Collection;

class IfdTest extends ExifEyeTestCaseBase
{
    public function testIfd()
    {
        $tiff_mock = $this->getMockBuilder('ExifEye\core\Block\Tiff')
            ->disableOriginalConstructor()
            ->getMock();

        $ifd = new Ifd($tiff_mock, new IfdItem('tiff', 0, Collection::getFormatIdFromName('Long')));

        $this->assertCount(0, $ifd->getMultipleElements('tag'));

        $tag1 = new Tag($ifd, new IfdItem('ifd0', 0x010E, Collection::getFormatIdFromName('Ascii')));
        $desc = new Ascii($tag1, ['Hello?']);

        $tag2 = new Tag($ifd, new IfdItem('ifd0', 0x0132, Collection::getFormatIdFromName('Ascii'), 20));
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
