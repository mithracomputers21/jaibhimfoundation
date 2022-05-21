<?php

namespace App\Http\Livewire\Member;

use App\Models\Block;
use App\Models\District;
use App\Models\Habitation;
use App\Models\Member;
use App\Models\Panchayat;
use App\Models\Paymentmethod;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public Member $member;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function mount(Member $member)
    {
        $this->member = $member;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.member.create');
    }

    public function submit()
    {
        $this->validate();

        $this->member->save();
        $this->syncMedia();

        return redirect()->route('admin.members.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->member->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'member.category' => [
                'required',
                'in:' . implode(',', array_keys($this->listsForFields['category'])),
            ],
            'member.type' => [
                'required',
                'in:' . implode(',', array_keys($this->listsForFields['type'])),
            ],
            'member.name' => [
                'string',
                'required',
            ],
            'member.email' => [
                'string',
                'nullable',
            ],
            'member.phone' => [
                'string',
                'required',
            ],
            'member.address' => [
                'string',
                'nullable',
            ],
            'member.payment' => [
                'string',
                'nullable',
            ],
            'member.payment_method_id' => [
                'integer',
                'exists:paymentmethods,id',
                'required',
            ],
            'member.payment_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'member.amount' => [
                'string',
                'required',
            ],
            'member.transaction' => [
                'string',
                'nullable',
            ],
            'mediaCollections.member_payment_screenshot' => [
                'array',
                'nullable',
            ],
            'mediaCollections.member_payment_screenshot.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.member_photo' => [
                'array',
                'nullable',
            ],
            'mediaCollections.member_photo.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'member.district_id' => [
                'integer',
                'exists:districts,id',
                'nullable',
            ],
            'member.block_id' => [
                'integer',
                'exists:blocks,id',
                'nullable',
            ],
            'member.panchayat_id' => [
                'integer',
                'exists:panchayats,id',
                'nullable',
            ],
            'member.habitation_id' => [
                'integer',
                'exists:habitations,id',
                'nullable',
            ],
            'member.contact_person_name' => [
                'string',
                'nullable',
            ],
            'member.contact_person_number' => [
                'string',
                'nullable',
            ],
            'member.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['category']       = $this->member::CATEGORY_SELECT;
        $this->listsForFields['type']           = $this->member::TYPE_SELECT;
        $this->listsForFields['payment_method'] = Paymentmethod::pluck('name', 'id')->toArray();
        $this->listsForFields['district']       = District::pluck('name', 'id')->toArray();
        $this->listsForFields['block']          = Block::pluck('name', 'id')->toArray();
        $this->listsForFields['panchayat']      = Panchayat::pluck('name', 'id')->toArray();
        $this->listsForFields['habitation']     = Habitation::pluck('name', 'id')->toArray();
        $this->listsForFields['status']         = $this->member::STATUS_SELECT;
    }
}
