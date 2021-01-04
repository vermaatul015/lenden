<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ trans('clients.name') }}</label>
    <input class="form-control" name="name" type="text" id="id_client_name" value="{{ isset($data['client']->name) ? $data['client']->name : ''}}" required maxlength="150">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('is_active') ? 'has-error' : ''}}">
    <label for="is_active" class="control-label">{{ trans('clients.is_active') }}</label>
    <div class="radio-group required">
@php
$i = 0;
@endphp
@foreach (json_decode('{"y":"Y","n":"N"}', true) as $optionKey => $optionValue)
<div class="radio">
    <label><input name="is_active" type="radio" value="{{ $optionKey }}" @if($i == 0) required @endif @if (isset($data['client'])) {{ (isset($data['client']->is_active) && $data['client']->is_active == $optionKey) ? 'checked' : ''}}  @else {{ $i == 0 ? 'checked' : '' }} @endif> @lang('clients.is_active_'.strtolower(str_replace(" ","_",$optionValue)))</label>
</div>
@php
$i++;
@endphp
@endforeach
<label class="error" for="is_active"></label>
</div>
    {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" id="crud_generator_submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
