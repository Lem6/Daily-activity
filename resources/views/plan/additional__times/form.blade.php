<div class="row">
<div class="col-md-6 {{ $errors->has('color_id') ? 'has-error' : '' }}">
    <label for="color_id" class="col-md-2 control-label">Planning Time <b style="color:red">*</b></label>
    <div class="col-md-10">
        <select class="form-control" id="color_id" required name="color_id">
        	    <option value="" style="display: none;" {{ old('color_id', optional($user)->color_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select Planning Time</option>

            @if($user)
            @foreach ($colors as $key => $color)
			    <option value="{{ $color->id }}" {{ old('color_id', optional($user->permission)->color_id) == $color->id ? 'selected' : '' }}>
			    	{{ $color->name }}
			    </option>
			@endforeach
            @else
                     @foreach ($colors as $key => $color)
			    <option value="{{ $color->id }}" >
			    	{{ $color->name }}
			    </option>
			@endforeach
            @endif

        </select>

        {!! $errors->first('color_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="col-md-6  {{ $errors->has('reason') ? 'has-error' : '' }}">
    <label for="reason" class="col-md-2 control-label">Reason <b style="color:red">*</b></label>
    <div class="col-md-10">
    @if($user)
    <input type="hidden" value="{{ $user->id }}" name="user">
    <input type="hidden" value="{{ $user->permission->id }}" name="pid">
    <textarea class="form-control" name="reason" type="text" id="reason" minlength="1" required placeholder="Enter reason here...">{{ old('reason', optional($user->permission)->reason) }}</textarea>
        {!! $errors->first('reason', '<p class="help-block">:message</p>') !!}
        @else
        <textarea class="form-control" name="reason" type="text" id="reason" minlength="1" required placeholder="Enter reason here...">{{ old('reason') }}</textarea>
        {!! $errors->first('reason', '<p class="help-block">:message</p>') !!}
    @endif

    </div>
</div>

</div>
