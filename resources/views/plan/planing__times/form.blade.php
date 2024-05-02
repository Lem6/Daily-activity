
<div class="form-group {{ $errors->has('plan_start_time') ? 'has-error' : '' }}">
    <label for="plan_start_time" class="col-md-2 control-label">Plan Start Time</label>
    <div class="col-md-10">
        <input class="form-control" name="plan_start_time" type="text" id="plan_start_time" value="{{ old('plan_start_time', optional($planingTime)->plan_start_time) }}" minlength="1" placeholder="Enter plan start time here...">
        {!! $errors->first('plan_start_time', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('plan_end_time') ? 'has-error' : '' }}">
    <label for="plan_end_time" class="col-md-2 control-label">Plan End Time</label>
    <div class="col-md-10">
        <input class="form-control" name="plan_end_time" type="text" id="plan_end_time" value="{{ old('plan_end_time', optional($planingTime)->plan_end_time) }}" minlength="1" placeholder="Enter plan end time here...">
        {!! $errors->first('plan_end_time', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('progress_start_time') ? 'has-error' : '' }}">
    <label for="progress_start_time" class="col-md-2 control-label">Progress Start Time</label>
    <div class="col-md-10">
        <input class="form-control" name="progress_start_time" type="text" id="progress_start_time" value="{{ old('progress_start_time', optional($planingTime)->progress_start_time) }}" minlength="1" placeholder="Enter progress start time here...">
        {!! $errors->first('progress_start_time', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('progress_end_time') ? 'has-error' : '' }}">
    <label for="progress_end_time" class="col-md-2 control-label">Progress End Time</label>
    <div class="col-md-10">
        <input class="form-control" name="progress_end_time" type="text" id="progress_end_time" value="{{ old('progress_end_time', optional($planingTime)->progress_end_time) }}" minlength="1" placeholder="Enter progress end time here...">
        {!! $errors->first('progress_end_time', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('additional_time') ? 'has-error' : '' }}">
    <label for="additional_time" class="col-md-2 control-label">Additional Time</label>
    <div class="col-md-10">
        <input class="form-control" name="additional_time" type="text" id="additional_time" value="{{ old('additional_time', optional($planingTime)->additional_time) }}" minlength="1" placeholder="Enter additional time here...">
        {!! $errors->first('additional_time', '<p class="help-block">:message</p>') !!}
    </div>
</div>

