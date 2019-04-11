<?php

namespace Tkotosz\ExtensionAttributeManager\Model\Product\Form\Field;

use Magento\Ui\Component\Form\Element\DataType\Text;
use Magento\Ui\Component\Form\Element\Select;
use Magento\Ui\Component\Form\Field as UiComponentField;
use Tkotosz\ExtensionAttributeManager\Model\Product\Form\Field;

class SelectField extends Field
{
    /** @var array */
    private $options;

    public function __construct(string $id, string $label, array $options, int $sortOrder = 1, string $description = '')
    {
        parent::__construct($id, $label, $sortOrder, $description);
        $this->options = $options;
    }

    public function toUiComponentConfigArray(): array
    {
        return [
            $this->id => [
                'arguments' => [
                    'data' => [
                        'config' => [
                            'label' => $this->label,
                            'componentType' => UiComponentField::NAME,
                            'dataType' => Text::NAME,
                            'dataScope' => $this->id,
                            'sortOrder' => $this->sortOrder,
                            'notice' => $this->description,
                            'formElement' => Select::NAME,
                            'options' => $this->options,
                        ],
                    ],
                ],
            ]
        ];
    }
}
