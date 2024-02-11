<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Block\Jpeg\Exif;
use FileEye\MediaProbe\Block\Tiff\Ifd;
use FileEye\MediaProbe\Block\Jpeg\Jpeg;
use FileEye\MediaProbe\Block\Tiff\Tag;
use FileEye\MediaProbe\Block\Tiff\Tiff;
use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\Data\DataString;
use FileEye\MediaProbe\Entry\Core\Ascii;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Media;

class Bug3017880Test extends MediaProbeTestCaseBase
{
    public function testThisDoesNotWorkAsExpected()
    {
        $filename = dirname(__FILE__) . '/media-samples/image/bug3017880.jpg';
        try {
            $exif = null;
            $resave_file = 0;
            $media = Media::parseFromFile($filename);
            $jpeg = $media->getElement("jpeg");
            $this->assertInstanceOf(Jpeg::class, $jpeg);

            // should all exif data on photo be cleared (gd and iu will always
            // strip it anyway, so only force strip if you know the image you're
            // branding is an original)

            if ($exif === null) {
                $app1_segment_mock = $this->getStubRoot();
                $exif_definition = new ItemDefinition(CollectionFactory::get('Jpeg\Exif'));
                $exif = new Exif($exif_definition, $app1_segment_mock);
                $tiff_definition = new ItemDefinition(CollectionFactory::get('Tiff\Tiff'));
                new Tiff($tiff_definition, $exif);
            }

            $tiff = $exif->getElement("tiff");
            $ifd0 = $exif->getElement("tiff/ifd[@name='IFD0']");
            if ($ifd0 === null) {
                $ifd0 = new Ifd(new ItemDefinition(CollectionFactory::get('Tiff\Ifd0'), DataFormat::LONG), $tiff);
            }

            $software_name = 'Example V2';
            $software_tag = $ifd0->getElement("tag[@name='Software']");

            if ($software_tag === null) {
                $tag = new Tag(new ItemDefinition($ifd0->getCollection()->getItemCollection(0x0131), DataFormat::ASCII), $ifd0);
                new Ascii($tag, new DataString($software_name));
                $resave_file = 1;
            } else {
                $software_tag->getElement("entry")->setDataElement([$software_name]);
                $resave_file = 1;
            }

            if ($resave_file == 1 && !$media->saveToFile($filename)) {
                // if it was okay to resave the file, but it did not save correctly
            }
        } catch (Exception $e) {
            $this->fail('Test should not throw an exception');
        }
    }
}
