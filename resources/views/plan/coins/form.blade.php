
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id">
        	    <option value="" style="display: none;" {{ old('user_id', optional($coin)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($coin)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('coin') ? 'has-error' : '' }}">
    <label for="coin" class="col-md-2 control-label">Coin</label>
    <div class="col-md-10">
        <input class="form-control" name="coin" type="text" id="coin" value="{{ old('coin', optional($coin)->coin) }}" minlength="1" placeholder="Enter coin here...">
        {!! $errors->first('coin', '<p class="help-block">:message</p>') !!}
    </div>
</div>

