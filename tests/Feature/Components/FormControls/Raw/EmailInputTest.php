<?php

namespace FormFactoryTests\Feature\Components\FormControls\Fields\Raw;

use FormFactoryTests\TestCase;

class EmailInputTest extends TestCase
{

    protected $viewBase = 'formfactory::raw';

    public function testSimple()
    {
        $element = \Form::email('myFieldName');

        $this->assertHtmlEquals(
            '
                <label for="myFormId_myFieldName">MyFieldName</label>
                <input type="email" name="myFieldName" id="myFormId_myFieldName" placeholder="MyFieldName" />
            ',
            $element->generate()
        );
    }

    public function testComplex()
    {
        $element = \Form::email('myFieldName')
            ->helpText('myHelpText')
            ->errors(['myFirstError', 'mySecondError'])
            ->rules('required|alpha|max:10');

        $this->assertHtmlEquals(
            '
                <label for="myFormId_myFieldName">MyFieldName<sup>*</sup></label>
                <div id="myFormId_myFieldName_errors">
                    <div>myFirstError</div>
                    <div>mySecondError</div>
                </div>
                <input type="email" name="myFieldName" id="myFormId_myFieldName" required aria-describedby="myFormId_myFieldName_errors myFormId_myFieldName_helpText" aria-invalid="true" pattern="[a-zA-Z]+" maxlength="10" placeholder="MyFieldName" />
                <small id="myFormId_myFieldName_helpText">myHelpText</small>
            ',
            $element->generate()
        );
    }

}