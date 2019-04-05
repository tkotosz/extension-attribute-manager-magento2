<?php

namespace Tkotosz\ExtensionAttributeManager\Model\Product\Form;

class Field
{
    /** @var string */
    private $id;

    /** @var string */
    private $label;

    /** @var array */
    private $options;

    public function __construct(string $id, string $label, array $options)
    {
        $this->id = $id;
        $this->label = $label;
        $this->options = $options;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }
}
