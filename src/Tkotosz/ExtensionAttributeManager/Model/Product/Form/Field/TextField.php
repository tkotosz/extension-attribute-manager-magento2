<?php

namespace Tkotosz\ExtensionAttributeManager\Model\Product\Form\Field;

use Magento\Ui\Component\Form\Element\DataType\Text;
use Magento\Ui\Component\Form\Element\Input;
use Magento\Ui\Component\Form\Field as UiComponentField;
use Tkotosz\ExtensionAttributeManager\Model\Product\Form\Field;

class TextField extends Field
{
    public function toUiComponentConfigArray(): array
    {
        return [
            $this->id => [
                'arguments' => [
                    'data' => [
                        'config' => [
                            'label' => $this->label,
                            'componentType' => UiComponentField::NAME,
                            'formElement' => Input::NAME,
                            'dataType' => Text::NAME,
                            'dataScope' => $this->id,
                            'sortOrder' => $this->sortOrder
                        ],
                    ],
                ],
            ]
        ];
    }
}
