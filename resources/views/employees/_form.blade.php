<div class="card-body">
	<input type="hidden" name="id" value="{{$employee->id ?? '' }}">
	<div class="form-group">
		<label for="first_name">First Name</label>
		<input type="text" class="form-control" name="first_name" value="{{ $employee->first_name ?? ''}}" placeholder="Please enter a first name.">
	</div>
	<div class="form-group">
		<label for="last_name">Last Name</label>
		<input type="text" class="form-control" name="last_name" value="{{ $employee->last_name ?? ''}}" placeholder="Please enter a last name.">
	</div>
	<div class="form-group">
		@if (isset($companies) && count($companies) > 0)
			<select class="js-example-basic-single" name="company_id">
				@foreach ($companies as $company)
					<option value="{{ $company->id }}"
						@if (isset($employee->company_id) && $company->id == $employee->company->id)
						selected="selected"
    					@endif>{{ $company->name}}</option>

				@endforeach
			</select>
		@endif
	</div>
	<div class="form-group">
		<label for="email">Email address</label>
		<input type="email" class="form-control" name="email" value="{{ $employee->email ?? ''}}" placeholder="Please enter an email.">
	</div>
	<div class="form-group">
		<label for="phone">Phone number</label>
		<input type="text" class="form-control" name="phone" value="{{ $employee->phone ?? ''}}" placeholder="Please enter a phone number.">
	</div>
</div>
