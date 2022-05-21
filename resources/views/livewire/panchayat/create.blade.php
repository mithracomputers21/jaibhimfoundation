<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('panchayat.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.panchayat.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="panchayat.name">
        <div class="validation-message">
            {{ $errors->first('panchayat.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.panchayat.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('panchayat.block_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="block">{{ trans('cruds.panchayat.fields.block') }}</label>
        <x-select-list class="form-control" required id="block" name="block" :options="$this->listsForFields['block']" wire:model="panchayat.block_id" />
        <div class="validation-message">
            {{ $errors->first('panchayat.block_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.panchayat.fields.block_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.panchayats.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>