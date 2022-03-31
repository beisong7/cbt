<div>
	@if (session()->has('success'))
		@include('_shared-components._partials._success_alert')
	@endif

	@if (session()->has('error'))
		@include('_shared-components._partials._error_alert')
	@endif

	@if (session()->has('info'))
		@include('_shared-components._partials._info_alert')
	@endif

	@if (session()->has('warning'))
		@include('_shared-components._partials._warning_alert')
	@endif

	@if (isset($errors) && $errors->count() != 0)
		@include('_shared-components._partials._form_error')
	@endif
</div>
