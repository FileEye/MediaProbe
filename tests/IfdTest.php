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

        $tag1 = new Tag(
            ifdEntry: new IfdEntryValueObject(
                collection: $ifd->getCollection()->getItemCollection(0x010E),
                dataFormat: DataFormat::ASCII,
            ),
            parent: $ifd,
        );
        $ifd->graftBlock($tag1);
        $desc = new Ascii($tag1, new DataString('Hello?' . chr(0)));

        $tag2 = new Tag(
            ifdEntry: new IfdEntryValueObject(
                collection: $ifd->getCollection()->getItemCollection(0x0132),
                dataFormat: DataFormat::ASCII,
                countOfComponents: 20,
            ),
            parent: $ifd,
        );
        $ifd->graftBlock($tag2);
        $date = new Time($tag2, new DataString('12345678' . chr(0)));

        $this->assertCount(2, $ifd->getMultipleElements('tag'));

        /** @var non-empty-array<int,Tag> $tags */
        $tags = [];
        foreach ($ifd->getMultipleElements('tag') as $tag) {
            $tags[$tag->getAttribute('id')] = $tag->getElement("entry");
        }

        $this->assertSame($tags[0x010E]->getValue(), $desc->getValue());
        $this->assertSame($tags[0x0132]->getValue(), $date->getValue());
    }
}
