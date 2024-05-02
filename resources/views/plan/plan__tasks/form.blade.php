
<div class="form-group {{ $errors->has('task_name') ? 'has-error' : '' }}">
    <label for="task_name" class="col-md-2 control-label">Task Name</label>
    <div class="col-md-10">
        <input class="form-control" name="task_name" type="text" id="task_name" value="{{ old('task_name', optional($planTask)->task_name) }}" minlength="1" placeholder="Enter task name here...">
        {!! $errors->first('task_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('progress') ? 'has-error' : '' }}">
    <label for="progress" class="col-md-2 control-label">Progress</label>
    <div class="col-md-10">
        <input class="form-control" name="progress" type="text" id="progress" value="{{ old('progress', optional($planTask)->progress) }}" minlength="1" placeholder="Enter progress here...">
        {!! $errors->first('progress', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('percent') ? 'has-error' : '' }}">
    <label for="percent" class="col-md-2 control-label">Percent</label>
    <div class="col-md-10">
        <input class="form-control" name="percent" type="text" id="percent" value="{{ old('percent', optional($planTask)->percent) }}" minlength="1" placeholder="Enter percent here...">
        {!! $errors->first('percent', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <textarea class="form-control" name="description" cols="50" rows="10" id="description" minlength="1" maxlength="1000">{{ old('description', optional($planTask)->description) }}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('challenge') ? 'has-error' : '' }}">
    <label for="challenge" class="col-md-2 control-label">Challenge</label>
    <div class="col-md-10">
        <input class="form-control" name="challenge" type="text" id="challenge" value="{{ old('challenge', optional($planTask)->challenge) }}" minlength="1" placeholder="Enter challenge here...">
        {!! $errors->first('challenge', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('approved_by') ? 'has-error' : '' }}">
    <label for="approved_by" class="col-md-2 control-label">Approved By</label>
    <div class="col-md-10">
        <select class="form-control" id="approved_by" name="approved_by">
        	    <option value="" style="display: none;" {{ old('approved_by', optional($planTask)->approved_by ?: '') == '' ? 'selected' : '' }} disabled selected>Select approved by</option>
        	@foreach ($approvedBies as $key => $approvedBy)
			    <option value="{{ $key }}" {{ old('approved_by', optional($planTask)->approved_by) == $key ? 'selected' : '' }}>
			    	{{ $approvedBy }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('approved_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('reject_reason') ? 'has-error' : '' }}">
    <label for="reject_reason" class="col-md-2 control-label">Reject Reason</label>
    <div class="col-md-10">
        <input class="form-control" name="reject_reason" type="text" id="reject_reason" value="{{ old('reject_reason', optional($planTask)->reject_reason) }}" minlength="1" placeholder="Enter reject reason here...">
        {!! $errors->first('reject_reason', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id">
        	    <option value="" style="display: none;" {{ old('user_id', optional($planTask)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($planTask)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('team_id') ? 'has-error' : '' }}">
    <label for="team_id" class="col-md-2 control-label">Team</label>
    <div class="col-md-10">
        <select class="form-control" id="team_id" name="team_id">
        	    <option value="" style="display: none;" {{ old('team_id', optional($planTask)->team_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select team</option>
        	@foreach ($teams as $key => $team)
			    <option value="{{ $key }}" {{ old('team_id', optional($planTask)->team_id) == $key ? 'selected' : '' }}>
			    	{{ $team }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('team_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('directorate_id') ? 'has-error' : '' }}">
    <label for="directorate_id" class="col-md-2 control-label">Directorate</label>
    <div class="col-md-10">
        <select class="form-control" id="directorate_id" name="directorate_id">
        	    <option value="" style="display: none;" {{ old('directorate_id', optional($planTask)->directorate_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select directorate</option>
        	@foreach ($directorates as $key => $directorate)
			    <option value="{{ $key }}" {{ old('directorate_id', optional($planTask)->directorate_id) == $key ? 'selected' : '' }}>
			    	{{ $directorate }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('directorate_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('center_id') ? 'has-error' : '' }}">
    <label for="center_id" class="col-md-2 control-label">Center</label>
    <div class="col-md-10">
        <select class="form-control" id="center_id" name="center_id">
        	    <option value="" style="display: none;" {{ old('center_id', optional($planTask)->center_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select center</option>
        	@foreach ($centers as $key => $center)
			    <option value="{{ $key }}" {{ old('center_id', optional($planTask)->center_id) == $key ? 'selected' : '' }}>
			    	{{ $center }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('center_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('plan_task_id') ? 'has-error' : '' }}">
    <label for="plan_task_id" class="col-md-2 control-label">Plan Task</label>
    <div class="col-md-10">
        <select class="form-control" id="plan_task_id" name="plan_task_id">
        	    <option value="" style="display: none;" {{ old('plan_task_id', optional($planTask)->plan_task_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select plan task</option>
        	@foreach ($planTasks as $key => $planTask)
			    <option value="{{ $key }}" {{ old('plan_task_id', optional($planTask)->plan_task_id) == $key ? 'selected' : '' }}>
			    	{{ $planTask }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('plan_task_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
    <label for="date" class="col-md-2 control-label">Date</label>
    <div class="col-md-10">
        <input class="form-control" name="date" type="text" id="date" value="{{ old('date', optional($planTask)->date) }}" minlength="1" placeholder="Enter date here...">
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('progress_time') ? 'has-error' : '' }}">
    <label for="progress_time" class="col-md-2 control-label">Progress Time</label>
    <div class="col-md-10">
        <input class="form-control" name="progress_time" type="text" id="progress_time" value="{{ old('progress_time', optional($planTask)->progress_time) }}" minlength="1" placeholder="Enter progress time here...">
        {!! $errors->first('progress_time', '<p class="help-block">:message</p>') !!}
    </div>
</div>

