<?php

namespace Tkotosz\ExtensionAttributeManager\Model\Product\Form;

use Magento\Ui\Component\Form\Fieldset as UiComponentFieldSet;

class FieldSet
{
    /** @var string */
    private $id;

    /** @var string */
    private $label;

    /**
     * @var int
     */
    private $sortOrder;
    /**
     * @var bool
     */
    private $collapsible;

    public function __construct(string $id, string $label, int $sortOrder = 1000, bool $collapsible = true)
    {
        $this->id = $id;
        $this->label = $label;
        $this->sortOrder = $sortOrder;
        $this->collapsible = $collapsible;
    }

    public function toUiComponentConfigArray(): array
    {
        return [
            $this->id => [
                'arguments' => [
                    'data' => [
                        'config' => [
                            'label' => $this->label,
                            'componentType' => UiComponentFieldSet::NAME,
                            'dataScope' => 'data.product.' . $this->id,
                            'collapsible' => $this->collapsible,
                            'sortOrder' => $this->sortOrder
                        ]
                    ]
                ]
            ]
        ];
    }
}
