<?php

namespace Tkotosz\ExtensionAttributeManager\Model\Product\Form\Field;

use Magento\Ui\Component\Form\Element\DataType\Text;
use Magento\Ui\Component\Form\Element\Textarea;
use Magento\Ui\Component\Form\Field as UiComponentField;
use Tkotosz\ExtensionAttributeManager\Model\Product\Form\Field;

class TextareaField extends Field
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
                            'dataType' => Text::NAME,
                            'dataScope' => $this->id,
                            'sortOrder' => $this->sortOrder,
                            'notice' => $this->description,
                            'formElement' => Textarea::NAME
                        ],
                    ],
                ],
            ]
        ];
    }
}
