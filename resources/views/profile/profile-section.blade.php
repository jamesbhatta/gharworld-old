<div class="card z-depth-0">
	<div class="card-header bg-info text-white">
		My Profile
	</div>
	<div class="card-body">
		@if (Session::has('success'))
		<div class="container text-success p-3">
			<i class="fa fa-check mr-2"></i> Profile Updated
		</div>
		@endif

		@include('partials.danger')

		<form action="{{ route('profile.update', $user->id) }}" method="POST" class="form">
			@csrf
			<div class="form-row form-group form-inline">
				<div class="col-md-2"></div>
				<div class="col-md-10"><strong>User Details:</strong></div>
			</div>
			<div class="form-row form-group form-inline">
				<label class="col-md-2">Name</label>
				<input type="text" name="name" class="col-md-10 form-control w-responsive" value="{{ $user->name }}">
			</div>
			<div class="form-row form-group form-inline">
				<label class="col-md-2">Address</label>
				<input type="text" name="address" class="col-md-10 form-control w-responsive" value="{{ $user->address }}">
			</div>
			<div class="form-row form-group form-inline">
				<label class="col-md-2">Email</label>
				<input type="email" name="email" class="col-md-10 form-control w-responsive disabled" value="{{ $user->email }}" disabled="">
			</div>
			<div class="form-row form-group form-inline">
				<label class="col-md-2">Mobile</label>
				<input type="text" name="mobile" class="col-md-10 form-control w-responsive" value="{{ $user->mobile }}">
			</div>

			<div class="form-row form-group form-inline">
				<div class="col-md-2"></div>
				<div class="col-md-10"><strong>Change Password:</strong></div>
			</div>
			@if (auth()->user()->role == 'admin')
			<input type="password" name="password" value="thisisadmin" hidden>
			@else
			<div class="form-row form-group form-inline">
				<label class="col-md-2">Old Password</label>
				<input type="password" name="password" class="col-md-10 form-control w-responsive">
			</div>
			@endif
			<div class="form-row form-group form-inline">
				<label class="col-md-2">New Password</label>
				<input type="password" name="new_password" class="col-md-10 form-control w-responsive">
			</div>
			<div class="form-row form-group form-inline">
				<label class="col-md-2">Confirm New Password</label>
				<input type="password" name="new_password_confirmation" class="col-md-10 form-control w-responsive">
			</div>

			<div class="form-row form-group form-inline">
				<div class="col-md-2"></div>
				<button type="submit" class="btn btn-primary z-depth-0">Update</button>
			</div>

		</form>
	</div>
</div>