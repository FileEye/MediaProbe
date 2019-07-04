<?php

namespace ExifEye\Test\core;

use ExifEye\core\Block\Ifd;
use ExifEye\core\Block\IfdFormat;
use ExifEye\core\Block\IfdItem;
use ExifEye\core\Block\Tag;
use ExifEye\core\Block\Tiff;
use ExifEye\core\Collection;
use ExifEye\core\Entry\Core\Ascii;
use ExifEye\core\Entry\Time;

class IfdTest extends ExifEyeTestCaseBase
{
    public function testIfd()
    {
        $tiff_mock = $this->getMockBuilder('ExifEye\core\Block\Tiff')
            ->disableOriginalConstructor()
            ->getMock();

        $ifd = new Ifd(new IfdItem(Collection::get('ifd0'), IfdFormat::getFromName('Long')), $tiff_mock);

        $this->assertCount(0, $ifd->getMultipleElements('tag'));

        $tag1 = new Tag(new IfdItem($ifd->getCollection()->getItemCollection(0x010E), IfdFormat::getFromName('Ascii')), $ifd);
        $desc = new Ascii($tag1, ['Hello?']);

        $tag2 = new Tag(new IfdItem($ifd->getCollection()->getItemCollection(0x0132), IfdFormat::getFromName('Ascii'), 20), $ifd);
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
