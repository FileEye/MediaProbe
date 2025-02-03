<?php declare(strict_types=1);

namespace FileEye\MediaProbe\Block\Exif\Vendor\Canon;

use FileEye\MediaProbe\Block\ListBase;
use FileEye\MediaProbe\Block\Tiff\Tag;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Model\BlockInterface;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class representing a Filter, for Canon Filter segments.
 *
 * Data segment structure:
 *
 * Id       Lenght   P count  P#1 Idx  P#1 cnt  P#1 val  P#2 Idx  P#2 cnt  P#2 val  ...
 * 04000000 38000000 04000000 01040000 01000000 FFFFFFFF 02040000 01000000 00000000 03040000 01000000 00000000 04040000 01000000 00000000
 */
class Filter extends ListBase
{
    /**
     * The number of parameters for this filter.
     */
    protected int $paramsCount;

    public function __construct(
        ItemDefinition $definition,
        FilterInfoIndex $parent,
        ?BlockInterface $reference = null,
    ) {
        parent::__construct($definition, $parent, $reference);
        $this->setAttribute('name', $this->getParentElement()->getAttribute('name') . '.' . $definition->sequence);
    }

    protected function doParseData(DataElement $data): void
    {
        $offset = 0;

        // The id of the filter is at offset 0.
        $this->setAttribute('id', (string) $data->getLong($offset));

        // The count of filter parameters is at offset 8.
        $this->paramsCount = $data->getLong($offset + 8);
        $offset += 12;

        assert($this->debugInfo(['dataElement' => $data]));

        // Loop and parse through the parameters.
        for ($p = 0; $p < $this->paramsCount; $p++) {
            $id = (string) $data->getLong($offset);
            $val_count = $data->getLong($offset + 4);
            $offset += 8;

            // The items are defined in the collection of the parent element.
            $tag = $this->addBlock(new ItemDefinition(
                $this->getParentElement()->getCollection()->getItemCollection($id),
                DataFormat::SIGNED_LONG,
                $val_count,
                0,
                $offset,
                $p,
            ));
            assert($tag instanceof Tag, get_class($tag));
            $tag->parseData(new DataWindow(
                $data,
                $offset,
                $val_count * DataFormat::getSize(DataFormat::SIGNED_LONG),
            ));

            $offset += 4 * $val_count;
        }
    }

    public function toBytes(int $byte_order = ConvertBytes::LITTLE_ENDIAN, int $offset = 0, $has_next_ifd = false): string
    {
        $bytes = '';

        // The id of the filter.
        $bytes .= ConvertBytes::fromLong((int) $this->getAttribute('id'), $byte_order);

        // Build the parameters.
        $params = $this->getMultipleElements('*');
        $data_area_bytes = '';
        foreach ($params as $param) {
            assert($param instanceof Tag, get_class($param));
            $data_area_bytes .= ConvertBytes::fromLong((int)  $param->getAttribute('id'), $byte_order);
            $data_area_bytes .= ConvertBytes::fromLong($param->getComponents(), $byte_order);
            $data_area_bytes .= $param->toBytes($byte_order);
        }

        // The length of the filter.
        $bytes .= ConvertBytes::fromLong(strlen($data_area_bytes) + 8, $byte_order);

        // The number of filter parameters.
        $bytes .= ConvertBytes::fromLong(count($params), $byte_order);

        // Append data area.
        $bytes .= $data_area_bytes;

        return $bytes;
    }

    public function collectInfo(array $context = []): array
    {
        return array_merge(parent::collectInfo($context), [
            '_msg' =>'#{seq}.{name} @{offset}, {parmetersCount} parameter(s), size {size} bytes',
            'seq' => $this->getDefinition()->sequence + 1,
            'parmetersCount' => $this->paramsCount,
        ]);
    }

    protected function getContextPathSegmentPattern(): string
    {
        return '/{DOMNode}:{id}';
    }

    public function getParentElement(): FilterInfoIndex
    {
        return parent::getParentElement();
    }
}
