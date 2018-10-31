<?php

namespace FormFactoryTests\Feature\Components\FormControls\Fields\Bootstrap4Vue2;

use FormFactoryTests\TestCase;

class TimeInputTest extends TestCase
{

    protected $viewBase = 'formfactory::bootstrap4_vue2';
    protected $decorators = ['bootstrap:v4'];
    protected $enableVue = true;

    public function testSimple()
    {
        $element = \Form::time('time');

        $this->assertHtmlEquals(
            '
                <div class="form-group" v-bind:class="{ \'has-error\': fieldHasError(\'text\') }">
                    <label for="myFormId_time">Time</label>
                    <input type="time" name="time" id="myFormId_time" class="form-control" />
                </div>
            ',
            $element->generate()
        );
    }

    public function testComplex()
    {
        $element = \Form::time('time')
            ->helpText('myHelpText')
            ->errors(['myFirstError', 'mySecondError'])
            ->rules('required|alpha|max:10');

        $this->assertHtmlEquals(
            '
                <div class="form-group" v-bind:class="{ \'has-error\': fieldHasError(\'text\') }">
                    <label for="myFormId_time">Time<sup v-if="fields.week.isRequired">*</sup></label>
                    <div id="myFormId_time_errors">
                        <div>myFirstError</div>
                        <div>mySecondError</div>
                    </div>
                    <input type="time" name="time" id="myFormId_time" class="form-control" required pattern="[a-zA-Z]+" aria-describedby="myFormId_time_errors myFormId_time_helpText" aria-invalid="true" />
                    <small id="myFormId_time_helpText">myHelpText</small>
                </div>
            ',
            $element->generate()
        );
    }

}