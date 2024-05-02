
<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
    <label for="date" class="col-md-2 control-label">Date</label>
    <div class="col-md-10">
        <input class="form-control" name="date" type="text" id="date" value="{{ old('date', optional($activity)->date) }}" minlength="1" placeholder="Enter date here...">
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('plan_task_id') ? 'has-error' : '' }}">
    <label for="plan_task_id" class="col-md-2 control-label">Plan Task</label>
    <div class="col-md-10">
        <select class="form-control" id="plan_task_id" name="plan_task_id">
        	    <option value="" style="display: none;" {{ old('plan_task_id', optional($activity)->plan_task_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select plan task</option>
        	@foreach ($planTasks as $key => $planTask)
			    <option value="{{ $key }}" {{ old('plan_task_id', optional($activity)->plan_task_id) == $key ? 'selected' : '' }}>
			    	{{ $planTask }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('plan_task_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id">
        	    <option value="" style="display: none;" {{ old('user_id', optional($activity)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($activity)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('color_id') ? 'has-error' : '' }}">
    <label for="color_id" class="col-md-2 control-label">Color</label>
    <div class="col-md-10">
        <select class="form-control" id="color_id" name="color_id">
        	    <option value="" style="display: none;" {{ old('color_id', optional($activity)->color_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select color</option>
        	@foreach ($colors as $key => $color)
			    <option value="{{ $key }}" {{ old('color_id', optional($activity)->color_id) == $key ? 'selected' : '' }}>
			    	{{ $color }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('color_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

