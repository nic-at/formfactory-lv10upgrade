<?php

namespace Nicat\FormFactory\Components\FormControls;

use Nicat\FormFactory\Components\FormControls\Traits\FieldTrait;
use Nicat\FormFactory\Components\FormControls\Contracts\FieldInterface;
use Nicat\FormFactory\Components\FormControls\Traits\FormControlTrait;
use Nicat\FormFactory\Components\FormControls\Contracts\FormControlInterface;
use Nicat\FormFactory\Components\FormControls\Traits\HelpTextTrait;
use Nicat\FormFactory\Components\FormControls\Traits\LabelTrait;
use Nicat\FormFactory\Components\FormControls\Contracts\AutoTranslationInterface;
use Nicat\FormFactory\Components\FormControls\Traits\AutoTranslationTrait;
use Nicat\HtmlFactory\Components\DateInputComponent;

class DateInput
    extends DateInputComponent
    implements FormControlInterface, FieldInterface,   AutoTranslationInterface
{
    use FormControlTrait,
        FieldTrait,
        LabelTrait,
        HelpTextTrait,
        AutoTranslationTrait;

    /**
     * DateInput constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        parent::__construct();
        $this->name($name);
        $this->setupFormControl();
    }

    /**
     * Gets called after applying decorators.
     * Overwrite to perform manipulations.
     */
    protected function afterDecoration()
    {
        parent::afterDecoration();
        $this->processFormControl();
    }

}