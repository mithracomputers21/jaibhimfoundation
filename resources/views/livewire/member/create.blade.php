<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('member.category') ? 'invalid' : '' }}">
        <label class="form-label required">{{ trans('cruds.member.fields.category') }}</label>
        <select class="form-control" wire:model="member.category">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['category'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('member.category') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.member.fields.category_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('member.type') ? 'invalid' : '' }}">
        <label class="form-label required">{{ trans('cruds.member.fields.type') }}</label>
        <select class="form-control" wire:model="member.type">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['type'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('member.type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.member.fields.type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('member.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.member.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="member.name">
        <div class="validation-message">
            {{ $errors->first('member.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.member.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('member.email') ? 'invalid' : '' }}">
        <label class="form-label" for="email">{{ trans('cruds.member.fields.email') }}</label>
        <input class="form-control" type="text" name="email" id="email" wire:model.defer="member.email">
        <div class="validation-message">
            {{ $errors->first('member.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.member.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('member.phone') ? 'invalid' : '' }}">
        <label class="form-label required" for="phone">{{ trans('cruds.member.fields.phone') }}</label>
        <input class="form-control" type="text" name="phone" id="phone" required wire:model.defer="member.phone">
        <div class="validation-message">
            {{ $errors->first('member.phone') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.member.fields.phone_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('member.address') ? 'invalid' : '' }}">
        <label class="form-label" for="address">{{ trans('cruds.member.fields.address') }}</label>
        <textarea class="form-control" name="address" id="address" wire:model.defer="member.address" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('member.address') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.member.fields.address_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('member.payment') ? 'invalid' : '' }}">
        <label class="form-label" for="payment">{{ trans('cruds.member.fields.payment') }}</label>
        <input class="form-control" type="text" name="payment" id="payment" wire:model.defer="member.payment">
        <div class="validation-message">
            {{ $errors->first('member.payment') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.member.fields.payment_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('member.payment_method_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="payment_method">{{ trans('cruds.member.fields.payment_method') }}</label>
        <x-select-list class="form-control" required id="payment_method" name="payment_method" :options="$this->listsForFields['payment_method']" wire:model="member.payment_method_id" />
        <div class="validation-message">
            {{ $errors->first('member.payment_method_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.member.fields.payment_method_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('member.payment_date') ? 'invalid' : '' }}">
        <label class="form-label required" for="payment_date">{{ trans('cruds.member.fields.payment_date') }}</label>
        <x-date-picker class="form-control" required wire:model="member.payment_date" id="payment_date" name="payment_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('member.payment_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.member.fields.payment_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('member.amount') ? 'invalid' : '' }}">
        <label class="form-label required" for="amount">{{ trans('cruds.member.fields.amount') }}</label>
        <input class="form-control" type="text" name="amount" id="amount" required wire:model.defer="member.amount">
        <div class="validation-message">
            {{ $errors->first('member.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.member.fields.amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('member.transaction') ? 'invalid' : '' }}">
        <label class="form-label" for="transaction">{{ trans('cruds.member.fields.transaction') }}</label>
        <input class="form-control" type="text" name="transaction" id="transaction" wire:model.defer="member.transaction">
        <div class="validation-message">
            {{ $errors->first('member.transaction') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.member.fields.transaction_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.member_payment_screenshot') ? 'invalid' : '' }}">
        <label class="form-label" for="payment_screenshot">{{ trans('cruds.member.fields.payment_screenshot') }}</label>
        <x-dropzone id="payment_screenshot" name="payment_screenshot" action="{{ route('admin.members.storeMedia') }}" collection-name="member_payment_screenshot" max-file-size="5" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.member_payment_screenshot') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.member.fields.payment_screenshot_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.member_photo') ? 'invalid' : '' }}">
        <label class="form-label" for="photo">{{ trans('cruds.member.fields.photo') }}</label>
        <x-dropzone id="photo" name="photo" action="{{ route('admin.members.storeMedia') }}" collection-name="member_photo" max-file-size="5" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.member_photo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.member.fields.photo_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('member.district_id') ? 'invalid' : '' }}">
        <label class="form-label" for="district">{{ trans('cruds.member.fields.district') }}</label>
        <x-select-list class="form-control" id="district" name="district" :options="$this->listsForFields['district']" wire:model="member.district_id" />
        <div class="validation-message">
            {{ $errors->first('member.district_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.member.fields.district_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('member.block_id') ? 'invalid' : '' }}">
        <label class="form-label" for="block">{{ trans('cruds.member.fields.block') }}</label>
        <x-select-list class="form-control" id="block" name="block" :options="$this->listsForFields['block']" wire:model="member.block_id" />
        <div class="validation-message">
            {{ $errors->first('member.block_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.member.fields.block_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('member.panchayat_id') ? 'invalid' : '' }}">
        <label class="form-label" for="panchayat">{{ trans('cruds.member.fields.panchayat') }}</label>
        <x-select-list class="form-control" id="panchayat" name="panchayat" :options="$this->listsForFields['panchayat']" wire:model="member.panchayat_id" />
        <div class="validation-message">
            {{ $errors->first('member.panchayat_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.member.fields.panchayat_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('member.habitation_id') ? 'invalid' : '' }}">
        <label class="form-label" for="habitation">{{ trans('cruds.member.fields.habitation') }}</label>
        <x-select-list class="form-control" id="habitation" name="habitation" :options="$this->listsForFields['habitation']" wire:model="member.habitation_id" />
        <div class="validation-message">
            {{ $errors->first('member.habitation_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.member.fields.habitation_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('member.contact_person_name') ? 'invalid' : '' }}">
        <label class="form-label" for="contact_person_name">{{ trans('cruds.member.fields.contact_person_name') }}</label>
        <input class="form-control" type="text" name="contact_person_name" id="contact_person_name" wire:model.defer="member.contact_person_name">
        <div class="validation-message">
            {{ $errors->first('member.contact_person_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.member.fields.contact_person_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('member.contact_person_number') ? 'invalid' : '' }}">
        <label class="form-label" for="contact_person_number">{{ trans('cruds.member.fields.contact_person_number') }}</label>
        <input class="form-control" type="text" name="contact_person_number" id="contact_person_number" wire:model.defer="member.contact_person_number">
        <div class="validation-message">
            {{ $errors->first('member.contact_person_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.member.fields.contact_person_number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('member.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.member.fields.status') }}</label>
        <select class="form-control" wire:model="member.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('member.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.member.fields.status_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.members.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>