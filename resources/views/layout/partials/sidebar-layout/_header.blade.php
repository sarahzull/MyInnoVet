<!--begin::Header-->
<div id="kt_app_header" class="app-header bg-white">
	<!--begin::Header container-->
	<div class="app-container container-fluid d-flex align-items-stretch justify-content-between">
		<!--begin::sidebar mobile toggle-->
		<div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show sidebar menu">
			<div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
				{!! getSvgIcon('duotune/abstract/abs015.svg', 'svg-icon svg-icon-1') !!}</div>
		</div>
		<!--end::sidebar mobile toggle-->
		<!--begin::Mobile logo-->
		<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
			<a href="/" class="d-lg-none">
				<img alt="Logo" src="{{ asset('images/myinnovet-default-small.svg') }}" class="h-30px" />
			</a>
		</div>
		<!--end::Mobile logo-->
		<!--begin::Header wrapper-->
		<div class="d-flex align-items-stretch justify-content-end flex-lg-grow-1" id="kt_app_header_wrapper">

			{{-- @include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/sidebar-layout/header._menu._menu') --}}

			@include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/sidebar-layout/header/_navbar')

		</div>
		<!--end::Header wrapper-->
	</div>
	<!--end::Header container-->
</div>
<!--end::Header-->
