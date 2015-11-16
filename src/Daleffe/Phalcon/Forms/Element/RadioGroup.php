<?php

namespace Daleffe\Phalcon\Forms\Element;

class RadioGroup extends \Phalcon\Forms\Element
{
	private $checked = null;

	private $html = "";

	public function render($attributes = [])
	{
		if (isset($attributes)) {
			foreach ($attributes as $key => $value) {
				$this->setAttribute($key, $value);
			}
		} else {
			$attributes = $this->getAttributes();
		}

		foreach ($attributes['elements'] as $key => $value) {
			if ($key == $this->getValue()) {
				$checked = ' checked';
			} else {
				$checked = null;
			}

			$html .= '<div class="' . $attributes['class'][$key] .'">';
			$html .= '<input type="radio" id="' . $this->getName() . $key . '" name="' . $this->getName() . '" value="' . $key . '"' . $checked . ' />';
			$html .= '<label for="' . $this->getName() . $key . '">' . $value . '</label>';
			$html .= "</div>";
		}

		return $html;
	}
}