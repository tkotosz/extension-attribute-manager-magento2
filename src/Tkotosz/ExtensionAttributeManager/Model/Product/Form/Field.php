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

    /** @var string */
    protected $description;

    public function __construct(string $id, string $label, int $sortOrder = 1, string $description = '')
    {
        $this->id = $id;
        $this->label = $label;
        $this->sortOrder = $sortOrder;
        $this->description = $description;
    }

    abstract public function toUiComponentConfigArray(): array;
}
