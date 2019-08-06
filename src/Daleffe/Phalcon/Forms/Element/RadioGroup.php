<?php

namespace Daleffe\Phalcon\Forms\Element;

class RadioGroup extends \Phalcon\Forms\Element
{
    public function render($attributes = [])
    {
        $checked = null;
        $html = '';

        if (is_array($attributes)) {
            foreach ($attributes as $key => $value) {
                $this->setAttribute($key, $value);
            }
        } else {
            $attributes = $this->getAttributes();
        }

        foreach ($attributes['elements'] as $key => $value) {
            $checked = ($key == $this->getValue()) ? ' checked' : null;

            $html .= '<div' . (isset($attributes['class']) ? ' class="' . (is_array($attributes['class']) ? $attributes['class'][$key] : $attributes['class']) . '"' : '') . '>';
            $html .= '<input type="radio" id="' . $this->getName() . $key . '" name="' . $this->getName() . '" value="' . $key . '"' . $checked . ' />';
            $html .= '<label for="' . $this->getName() . $key . '">' . $value . '</label>';
            $html .= "</div>";
        }

        return $html;
    }
}
