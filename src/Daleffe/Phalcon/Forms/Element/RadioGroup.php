<?php

namespace Daleffe\Phalcon\Forms\Element;

class RadioGroup extends \Phalcon\Forms\Element\AbstractElement
{
    public function render(array $attributes = NULL): string
    {
        $checked = null;
        $html = '';

        if (is_array($attributes)) {
            foreach ($attributes as $key => $value) $this->setAttribute($key, $value);
        } else { $attributes = $this->getAttributes(); }

        foreach ($attributes['elements'] as $key => $value) {
            $checked = ($key == $this->getValue()) ? ' checked' : null;

            $html .= '<div' . (isset($attributes['class']) ? ' class="' . (is_array($attributes['class']) ? $attributes['class'][$key] : $attributes['class']) . '"' : '') . '>';
            $html .= '<label for="' . $this->getName() . $key . '" class="form-check-label">';
            $html .= '<input type="radio" id="' . $this->getName() . $key . '" name="' . $this->getName() . '" value="' . $key . '"' . $checked . '>' . $value;
            $html .= '</label></div>';
        }

        return $html;
    }
}