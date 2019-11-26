<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Block\Ifd;
use FileEye\MediaProbe\ItemFormat;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Block\Tag;
use FileEye\MediaProbe\Block\Tiff;
use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Entry\Core\Ascii;
use FileEye\MediaProbe\Entry\Time;

class IfdTest extends MediaProbeTestCaseBase
{
    public function testIfd()
    {
        $tiff_mock = $this->getMockBuilder('FileEye\MediaProbe\Block\Tiff')
            ->disableOriginalConstructor()
            ->getMock();

        $ifd = new Ifd(new ItemDefinition(Collection::get('Ifd\Ifd0'), ItemFormat::LONG), $tiff_mock);

        $this->assertCount(0, $ifd->getMultipleElements('tag'));

        $tag1 = new Tag(new ItemDefinition($ifd->getCollection()->getItemCollection(0x010E), ItemFormat::ASCII), $ifd);
        $desc = new Ascii($tag1, ['Hello?']);

        $tag2 = new Tag(new ItemDefinition($ifd->getCollection()->getItemCollection(0x0132), ItemFormat::ASCII, 20), $ifd);
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
