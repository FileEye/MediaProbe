<?php

namespace ExifEye\core;

/**
 * Base class for ElementInterface objects.
 *
 * As this class is abstract you cannot instantiate objects from it. It only
 * serves as a common ancestor to define the methods common to all ExifEye
 * elements (Block and Entry objects).
 */
abstract class ElementBase implements ElementInterface
{
    /**
     * The parent Element object of this element.
     *
     * @var \ExifEye\core\ElementInterface
     */
    protected $parentElement;

    /**
     * The type of this element.
     *
     * @var string
     */
    protected $type;

    /**
     * The id of this element.
     *
     * @var int
     */
    protected $id;

    /**
     * The name of this element.
     *
     * @var string
     */
    protected $name;

    /**
     * Whether this element is valid.
     *
     * @var bool
     */
    protected $valid = true;

    /**
     * Constructs an Element object.
     *
     * @param \ExifEye\core\ElementInterface $parent
     *            the parent element of this element.
     */
    public function __construct(ElementInterface $parent = null)
    {
        $this->parentElement = $parent;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setParentElement(ElementInterface $parent)
    {
        $this->parentElement = $parent;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getParentElement()
    {
        return $this->parentElement;
    }

    /**
     * {@inheritdoc}
     */
    public function getElementPath()
    {
        $path[] = $this->getType() . ':' . $this->getName();
        $tmp = $this->getParentElement();
        while ($tmp) {
            $path[] = $tmp->getType() . ':' . $tmp->getName();
            $tmp = $tmp->getParentElement();
        }
        return implode('/', array_reverse($path));
    }

    /**
     * {@inheritdoc}
     */
    public function isValid()
    {
        return $this->valid;
    }

    /**
     * {@inheritdoc}
     */
    public function toDumpArray()
    {
        return [
            'path' = $this->getElementPath(),
            'class' = get_class($this),
            'id' = $this->getId(),
            'name' = $this->getName(),
            'valid' = $this->isValid(),
        ];
    }
}
