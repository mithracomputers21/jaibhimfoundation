<?php

namespace App\Http\Livewire\Panchayat;

use App\Models\Block;
use App\Models\Panchayat;
use Livewire\Component;

class Edit extends Component
{
    public Panchayat $panchayat;

    public array $listsForFields = [];

    public function mount(Panchayat $panchayat)
    {
        $this->panchayat = $panchayat;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.panchayat.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->panchayat->save();

        return redirect()->route('admin.panchayats.index');
    }

    protected function rules(): array
    {
        return [
            'panchayat.name' => [
                'string',
                'required',
            ],
            'panchayat.block_id' => [
                'integer',
                'exists:blocks,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['block'] = Block::pluck('name', 'id')->toArray();
    }
}
