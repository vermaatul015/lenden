<div class="form-group {{ $errors->has('client_id') ? 'has-error' : ''}}">
    <label for="client_id" class="control-label">{{ trans('items.client') }}</label>
    <select name="client_id" class="form-control" id="id_item_client_id" required>
    <option value="">@lang('setup.select_dropdown',['field'=>'Client'])</option>
    @foreach ($data['clients'] as $optionKey => $optionValue)
        <option value="{{ $optionValue->id }}" {{ (isset($data['items']->client_id) && $data['items']->client_id == $optionValue->id) ? 'selected' : ''}}>{{$optionValue->name}}</option>
    @endforeach
</select>
    {!! $errors->first('client_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('rate') ? 'has-error' : ''}}">
    <label for="rate" class="control-label">{{ trans('items.rate') }}</label>
    <input class="form-control" name="rate" type="number" id="id_item_rate" value="{{ isset($data['items']->rate) ? $data['items']->rate : ''}}" required maxlength="150">
    {!! $errors->first('rate', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('nos') ? 'has-error' : ''}}">
    <label for="nos" class="control-label">{{ trans('items.nos') }}</label>
    <input class="form-control" name="nos" type="number" id="id_item_nos" value="{{ isset($data['items']->nos) ? $data['items']->nos : ''}}" required maxlength="150">
    {!! $errors->first('nos', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('size') ? 'has-error' : ''}}">
    <label for="size" class="control-label">{{ trans('items.size') }}</label>
    <input class="form-control" name="size" type="text" id="id_item_size" value="{{ isset($data['items']->size) ? $data['items']->size : ''}}" required maxlength="150">
    {!! $errors->first('size', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" id="crud_generator_submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
