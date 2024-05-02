
<div class="form-group {{ $errors->has('qoute') ? 'has-error' : '' }}">
    <label for="qoute" class="col-md-2 control-label">Qoute <b style="color:red">*</b></label>
    <div class="col-md-10">
        <input class="form-control" name="qoute" type="text" id="qoute" value="{{ old('qoute', optional($motivation)->qoute) }}" minlength="1" placeholder="Enter qoute here...">
        {!! $errors->first('qoute', '<p class="help-block">:message</p>') !!}
    </div>
</div>

