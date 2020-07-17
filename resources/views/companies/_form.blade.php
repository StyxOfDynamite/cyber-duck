<div class="card-body">
	<input type="hidden" name="id" value="{{$company->id ?? '' }}">
	<div class="form-group">
		<label for="company_name">Name</label>
		<input type="text" class="form-control" name="company_name" value="{{ $company->name ?? ''}}" placeholder="Please enter a name.">
	</div>
	<div class="form-group">
		<label for="company_website">Website</label>
		<input type="url" class="form-control" name="company_website" value="{{ $company->website ?? ''}}" placeholder="Please enter a url.">
	</div>
	<div class="form-group">
		<label for="company_email">Email address</label>
		<input type="email" class="form-control" name="company_email" value="{{ $company->email ?? ''}}" placeholder="Please enter as email.">
	</div>
	<div class="form-group">
		<label for="company_logo">Company Logo</label>
		<div class="input-group">
			<div class="custom-file">
				<input type="file" class="custom-file-input" id="file-upload" name="company_logo">
				<label class="custom-file-label" for="file-upload"></label>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	window.addEventListener('load', function() {
		$('#file-upload').change(function() {
			var i = $(this).next('label').clone();
			var file = $('#file-upload')[0].files[0].name;
			$(this).next('label').text(file);
		});
	});
</script>