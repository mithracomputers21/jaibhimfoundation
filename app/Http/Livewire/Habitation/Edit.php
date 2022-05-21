<?php

namespace App\Http\Livewire\Habitation;

use App\Models\Habitation;
use App\Models\Panchayat;
use Livewire\Component;

class Edit extends Component
{
    public Habitation $habitation;

    public array $listsForFields = [];

    public function mount(Habitation $habitation)
    {
        $this->habitation = $habitation;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.habitation.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->habitation->save();

        return redirect()->route('admin.habitations.index');
    }

    protected function rules(): array
    {
        return [
            'habitation.name' => [
                'string',
                'required',
            ],
            'habitation.panchayat_id' => [
                'integer',
                'exists:panchayats,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['panchayat'] = Panchayat::pluck('name', 'id')->toArray();
    }
}
