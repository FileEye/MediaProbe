<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Block\Media\Tiff\Ifd;
use FileEye\MediaProbe\Block\Media\Tiff\IfdEntryValueObject;
use FileEye\MediaProbe\Block\Tiff\Tag;
use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\Data\DataString;
use FileEye\MediaProbe\Entry\Core\Ascii;
use FileEye\MediaProbe\Entry\Time;
use FileEye\MediaProbe\ItemDefinition;

class IfdTest extends MediaProbeTestCaseBase
{
    public function testIfd()
    {
        $tiff_mock = $this->getStubRoot('tiff');
        $ifd = new Ifd(
            ifdEntry: new IfdEntryValueObject(
                collection: CollectionFactory::get('Media\Tiff\\Ifd0'),
                dataFormat: DataFormat::LONG,
                countOfComponents: 1,
                data: 0,
            ),
            parent: $tiff_mock,
        );
        $tiff_mock->graftBlock($ifd);

        $this->assertCount(0, $ifd->getMultipleElements('tag'));

        $tag1 = new Tag(new ItemDefinition($ifd->getCollection()->getItemCollection(0x010E), DataFormat::ASCII), $ifd);
        $desc = new Ascii($tag1, new DataString('Hello?' . chr(0)));

        $tag2 = new Tag(new ItemDefinition($ifd->getCollection()->getItemCollection(0x0132), DataFormat::ASCII, 20), $ifd);
        $date = new Time($tag2, new DataString('12345678' . chr(0)));

        $this->assertCount(2, $ifd->getMultipleElements('tag'));

        $tags = [];
        foreach ($ifd->getMultipleElements('tag') as $tag) {
            $tags[$tag->getAttribute('id')] = $tag->getElement("entry");
        }

        $this->assertSame($tags[0x010E]->getValue(), $desc->getValue());
        $this->assertSame($tags[0x0132]->getValue(), $date->getValue());
    }
}
