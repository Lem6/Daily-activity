
<div class="form-group {{ $errors->has('activity') ? 'has-error' : '' }}">
    <label for="activity" class="col-md-2 control-label">Activity</label>
    <div class="col-md-10">
        <input class="form-control" name="activity" type="text" id="activity" value="{{ old('activity', optional($outOfPlan)->activity) }}" minlength="1" placeholder="Enter activity here...">
        {!! $errors->first('activity', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
    <label for="date" class="col-md-2 control-label">Date</label>
    <div class="col-md-10">
        <input class="form-control" name="date" type="text" id="date" value="{{ old('date', optional($outOfPlan)->date) }}" minlength="1" placeholder="Enter date here...">
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id">
        	    <option value="" style="display: none;" {{ old('user_id', optional($outOfPlan)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($outOfPlan)->user_id) == $key ? 'selected' : '' }}>
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
        	    <option value="" style="display: none;" {{ old('team_id', optional($outOfPlan)->team_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select team</option>
        	@foreach ($teams as $key => $team)
			    <option value="{{ $key }}" {{ old('team_id', optional($outOfPlan)->team_id) == $key ? 'selected' : '' }}>
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
        	    <option value="" style="display: none;" {{ old('directorate_id', optional($outOfPlan)->directorate_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select directorate</option>
        	@foreach ($directorates as $key => $directorate)
			    <option value="{{ $key }}" {{ old('directorate_id', optional($outOfPlan)->directorate_id) == $key ? 'selected' : '' }}>
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
        	    <option value="" style="display: none;" {{ old('center_id', optional($outOfPlan)->center_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select center</option>
        	@foreach ($centers as $key => $center)
			    <option value="{{ $key }}" {{ old('center_id', optional($outOfPlan)->center_id) == $key ? 'selected' : '' }}>
			    	{{ $center }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('center_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('approved_by') ? 'has-error' : '' }}">
    <label for="approved_by" class="col-md-2 control-label">Approved By</label>
    <div class="col-md-10">
        <select class="form-control" id="approved_by" name="approved_by">
        	    <option value="" style="display: none;" {{ old('approved_by', optional($outOfPlan)->approved_by ?: '') == '' ? 'selected' : '' }} disabled selected>Select approved by</option>
        	@foreach ($approvedBies as $key => $approvedBy)
			    <option value="{{ $key }}" {{ old('approved_by', optional($outOfPlan)->approved_by) == $key ? 'selected' : '' }}>
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
        <input class="form-control" name="reject_reason" type="text" id="reject_reason" value="{{ old('reject_reason', optional($outOfPlan)->reject_reason) }}" minlength="1" placeholder="Enter reject reason here...">
        {!! $errors->first('reject_reason', '<p class="help-block">:message</p>') !!}
    </div>
</div>

