<?php

namespace Tkotosz\ExtensionAttributeManager\Model\Product\Form;

class FieldSet
{
    /** @var string */
    private $id;

    /** @var string */
    private $label;

    public function __construct(string $id, string $label)
    {
        $this->id = $id;
        $this->label = $label;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getLabel(): string
    {
        return $this->label;
    }
}
