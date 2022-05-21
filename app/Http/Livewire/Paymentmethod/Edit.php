<?php

namespace App\Http\Livewire\Paymentmethod;

use App\Models\Paymentmethod;
use Livewire\Component;

class Edit extends Component
{
    public Paymentmethod $paymentmethod;

    public function mount(Paymentmethod $paymentmethod)
    {
        $this->paymentmethod = $paymentmethod;
    }

    public function render()
    {
        return view('livewire.paymentmethod.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->paymentmethod->save();

        return redirect()->route('admin.paymentmethods.index');
    }

    protected function rules(): array
    {
        return [
            'paymentmethod.name' => [
                'string',
                'required',
            ],
        ];
    }
}
