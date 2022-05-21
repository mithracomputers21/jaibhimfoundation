<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('block.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.block.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="block.name">
        <div class="validation-message">
            {{ $errors->first('block.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.block.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('block.district_id') ? 'invalid' : '' }}">
        <label class="form-label" for="district">{{ trans('cruds.block.fields.district') }}</label>
        <x-select-list class="form-control" id="district" name="district" :options="$this->listsForFields['district']" wire:model="block.district_id" />
        <div class="validation-message">
            {{ $errors->first('block.district_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.block.fields.district_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.blocks.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>