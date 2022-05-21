<?php

namespace App\Http\Livewire\District;

use App\Models\District;
use Livewire\Component;

class Create extends Component
{
    public District $district;

    public function mount(District $district)
    {
        $this->district = $district;
    }

    public function render()
    {
        return view('livewire.district.create');
    }

    public function submit()
    {
        $this->validate();

        $this->district->save();

        return redirect()->route('admin.districts.index');
    }

    protected function rules(): array
    {
        return [
            'district.name' => [
                'string',
                'required',
            ],
        ];
    }
}
