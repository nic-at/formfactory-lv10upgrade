<?php

namespace Nicat\FormFactory\Components\Traits;

use Nicat\FormFactory\Utilities\FieldLabels\FieldLabel;

/**
 * This traits provides a default implementation
 * for the LabelInterface.
 *
 * @package Nicat\FormFactory
 */
trait LabelTrait
{

    /**
     * The FieldLabel object used to manage the label for this field.
     *
     * @var FieldLabel
     */
    public $label = null;

    /**
     * Set content to be used for the label.
     * Omit for auto-translation.
     * Set to false to avoid rendering of label.
     *
     * @param string|false $label
     * @return $this
     */
    public function label($label)
    {
        if (is_string($label)) {
            $this->label->setText($label);
        }
        if ($label === false) {
            $this->label->hideLabel();
        }
        return $this;
    }

}