@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-lg-8 offset-lg-2">
		<div class="card">
			<div class="card-header text-center">
				{{ _lang('Change Tele Banking Pin') }}
			</div>

			<div class="card-body">
				<form action="{{ route('profile.update_tele_bank_pin') }}" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
					@csrf
					<div class="row">
						

						<div class="col-12">
							<div class="form-group">
								<label class="control-label">{{ _lang('New Pin') }}</label>
								<input type="text" class="form-control" name="pin" required>
							</div>
						</div>

					

						<div class="col-12">
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block"><i class="icofont-check-circled"></i> {{ _lang('Update Pin') }}</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

