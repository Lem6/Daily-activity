
<div class="form-group {{ $errors->has('date_from') ? 'has-error' : '' }}">
    <label for="date_from" class="col-md-2 control-label">Date From</label>
    <div class="col-md-10">
        <input class="form-control" name="date_from" type="date" id="date_from" value="{{ old('date_from', optional($latePlanningPermission)->date_from) }}" placeholder="Enter date from here...">
        {!! $errors->first('date_from', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('date_to') ? 'has-error' : '' }}">
    <label for="date_to" class="col-md-2 control-label">Date To</label>
    <div class="col-md-10">
        <input class="form-control" name="date_to" type="date" id="date_to" value="{{ old('date_to', optional($latePlanningPermission)->date_to) }}" placeholder="Enter date to here...">
        {!! $errors->first('date_to', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id">
        	    <option value="" style="display: none;" {{ old('user_id', optional($latePlanningPermission)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($latePlanningPermission)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('deadline') ? 'has-error' : '' }}">
    <label for="deadline" class="col-md-2 control-label">Deadline</label>
    <div class="col-md-10">
        <input class="form-control" name="deadline" type="text" id="deadline" value="{{ old('deadline', optional($latePlanningPermission)->deadline) }}" minlength="1" placeholder="Enter deadline here...">
        {!! $errors->first('deadline', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status_activation') ? 'has-error' : '' }}">
    <label for="status_activation" class="col-md-2 control-label">Status Activation</label>
    <div class="col-md-10">
        <input class="form-control" name="status_activation" type="text" id="status_activation" value="{{ old('status_activation', optional($latePlanningPermission)->status_activation) }}" minlength="1" placeholder="Enter status activation here...">
        {!! $errors->first('status_activation', '<p class="help-block">:message</p>') !!}
    </div>
</div>

