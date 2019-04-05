<?php

namespace Tkotosz\ExtensionAttributeManager\Model\Product\Form;

class FieldList
{
    /** @var Field[] */
    private $fields;

    public function __construct(array $fields)
    {
        $this->fields = $fields;
    }

    /**
     * @return Field[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }
}
