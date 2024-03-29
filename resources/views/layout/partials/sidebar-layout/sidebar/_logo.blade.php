<!--begin::Logo-->
<div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
	<!--begin::Logo image-->
	<a href="/">
		@php $bodyAttribute = getHtmlAttribute('body', 'data-kt-app-layout') @endphp
		@if ($bodyAttribute === 'dark-sidebar')
			<img alt="Logo" src="{{ asset('images/myinnovet-logo-2.svg') }}" class="h-35px app-sidebar-logo-default" />
        @elseif($bodyAttribute === 'light-sidebar')
				<img alt="Logo" src="{{ asset('images/myinnovet-logo-2.svg') }}" class="theme-light-show h-25px app-sidebar-logo-default" />
				<img alt="Logo" src="{{ asset('images/myinnovet-logo-2.svg') }}" class="theme-dark-show h-25px app-sidebar-logo-default" />
		@endif
		
		<img alt="Logo" src="{{ asset('images/myinnovet-default-small.svg') }}" class="h-20px app-sidebar-logo-minimize" />
	</a>
	<!--end::Logo image-->
	<!--begin::Sidebar toggle-->
	<div id="kt_app_sidebar_toggle"
		class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm bg-body btn-color-muted btn-active-icon-primary h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
		data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
		data-kt-toggle-name="app-sidebar-minimize">{!! getSvgIcon('duotune/arrows/arr079.svg', 'svg-icon svg-icon-2 rotate-180') !!}</div>
	<!--end::Sidebar toggle-->
</div>
<!--end::Logo-->
