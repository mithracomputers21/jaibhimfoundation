<?php

namespace App\Http\Livewire\Block;

use App\Models\Block;
use App\Models\District;
use Livewire\Component;

class Create extends Component
{
    public Block $block;

    public array $listsForFields = [];

    public function mount(Block $block)
    {
        $this->block = $block;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.block.create');
    }

    public function submit()
    {
        $this->validate();

        $this->block->save();

        return redirect()->route('admin.blocks.index');
    }

    protected function rules(): array
    {
        return [
            'block.name' => [
                'string',
                'required',
            ],
            'block.district_id' => [
                'integer',
                'exists:districts,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['district'] = District::pluck('name', 'id')->toArray();
    }
}
