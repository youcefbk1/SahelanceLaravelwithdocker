<?php

namespace App\View\Components;

use App\Models\Form;
use Illuminate\View\Component;

class PhinixForm extends Component
{
    public string $identifier;
    public string $identifierValue;
    public Form $form;
    public mixed $formData;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($identifier, $identifierValue)
    {
        $this->identifier      = $identifier;
        $this->identifierValue = $identifierValue;
        $this->form            = Form::where($this->identifier, $this->identifierValue)->first();
        $this->formData        = @$this->form->form_data ?? [];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.phinixForm');
    }
}
