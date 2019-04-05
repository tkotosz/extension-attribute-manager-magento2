<?php

namespace Tkotosz\ExtensionAttributeManager\Model\Product\Form;

abstract class Field
{
    /** @var string */
    protected $id;

    /** @var string */
    protected $label;

    /** @var int*/
    protected $sortOrder;

    public function __construct(string $id, string $label, int $sortOrder = 1)
    {
        $this->id = $id;
        $this->label = $label;
        $this->sortOrder = $sortOrder;
    }

    abstract public function toUiComponentConfigArray(): array;
}
