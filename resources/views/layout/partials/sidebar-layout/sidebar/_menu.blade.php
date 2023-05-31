<!--begin::sidebar menu-->
<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
	<!--begin::Menu wrapper-->
	<div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true"
		data-kt-scroll-activate="true" data-kt-scroll-height="auto"
		data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
		data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">
		<!--begin::Menu-->
		<div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true"
			data-kt-menu-expand="false">

			<!--begin:Menu item-->
			<div class="menu-item">
				<!--begin:Menu link-->
				<a class="menu-link" href="/">
					<span class="menu-icon">{!! getSvgIcon('duotune/general/gen025.svg', 'svg-icon svg-icon-2') !!}</span>
					<span class="menu-title">Dashboards</span>
				</a>
				<!--end:Menu link-->
			</div>
			<!--end:Menu item-->


			<!--begin:Menu item-->
			@can('user_management_access')
			<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
				<!--begin:Menu link-->
				<span class="menu-link">
					<span class="menu-icon">{!! getSvgIcon('duotune/general/gen049.svg', 'svg-icon svg-icon-2') !!}</span>
					<span class="menu-title">User Management</span>
					<span class="menu-arrow"></span>
				</span>
				<!--end:Menu link-->
				<!--begin:Menu sub-->
				<div class="menu-sub menu-sub-accordion">

					<!--begin:Menu item-->
					@can('role_access')
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link" href="{{ route('roles.index') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Roles</span>
						</a>
						<!--end:Menu link-->
					</div>
					@endcan
					<!--end:Menu item-->

					<!--begin:Menu item-->
					@can('permission_access')
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link" href="{{ route('permissions.index') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Permissions</span>
						</a>
						<!--end:Menu link-->
					</div>
					@endcan
					<!--end:Menu item-->

					<!--begin:Menu item-->
					@can('user_access')
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link" href="{{ route('users.index') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Users</span>
						</a>
						<!--end:Menu link-->
					</div>
					@endcan
					<!--end:Menu item-->

				</div>
				<!--end:Menu sub-->
			</div>
			@endcan
			<!--end:Menu item-->

			<!--begin:Menu item-->
			@can('appointment_access')
			<div class="menu-item">
				<!--begin:Menu link-->
				<a class="menu-link" href="{{ route('appointments.index') }}">
					<span class="menu-icon">{!! getSvgIcon('duotune/general/gen066.svg', 'svg-icon svg-icon-2') !!}</span>
					<span class="menu-title">Appointment</span>
				</a>
				<!--end:Menu link-->
			</div>
			@endcan
			<!--end:Menu item-->

			<!--begin:Menu item-->
			@can('calendar_access')
			<div class="menu-item">
				<!--begin:Menu link-->
				<a class="menu-link" href="{{ route('calendar.index') }}">
					<span class="menu-icon">{!! getSvgIcon('duotune/communication/com003.svg', 'svg-icon svg-icon-2') !!}</span>
					<span class="menu-title">Calendar</span>
				</a>
				<!--end:Menu link-->
			</div>
			@endcan
			<!--end:Menu item-->

			<!--begin:Menu item-->
			@can('medical_record_access')
			<div class="menu-item">
				<!--begin:Menu link-->
				<a class="menu-link" href="{{ route('medical-records.index') }}">
					<span class="menu-icon">{!! getSvgIcon('duotune/general/gen014.svg', 'svg-icon svg-icon-2') !!}</span>
					<span class="menu-title">Medical Records</span>
				</a>
				<!--end:Menu link-->
			</div>
			@endcan
			<!--end:Menu item-->


			<!--begin:Menu item-->
			@can('patient_access')
			<div class="menu-item">
				<!--begin:Menu link-->
				<a class="menu-link" href="{{ route('patients.index') }}">
					<span class="menu-icon"><i class="fa-solid fa-paw fs-3"></i></span>
					<span class="menu-title">Patients</span>
				</a>
				<!--end:Menu link-->
			</div>
			@endcan
			<!--end:Menu item-->

			<!--begin:Menu item-->
			@can('client_access')
			<div class="menu-item">
				<!--begin:Menu link-->
				<a class="menu-link" href="{{ route('clients.index') }}">
					<span class="menu-icon">{!! getSvgIcon('duotune/abstract/abs025.svg', 'svg-icon svg-icon-2') !!}</i></span>
					<span class="menu-title">Clients</span>
				</a>
				<!--end:Menu link-->
			</div>
			@endcan
			<!--end:Menu item-->

			<!--begin:Menu item-->
			@can('staff_access')
			<div class="menu-item">
				<!--begin:Menu link-->
				<a class="menu-link" href="{{ route('staffs.index') }}">
					<span class="menu-icon"><i class="fa-solid fa-people-group fs-3"></i></span>
					<span class="menu-title">Staff</span>
				</a>
				<!--end:Menu link-->
			</div>
			@endcan
			<!--end:Menu item-->

			<div class="separator my-4"></div>

			<div class="menu-item">
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
				<a class="menu-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
					<span class="menu-icon">{!! getSvgIcon('duotune/arrows/arr076.svg', 'svg-icon svg-icon-2') !!}</span>
					<span class="menu-title">Logout</span>
				</a>
			</div>

			{{-- <div class="menu-item pt-5">
				<div class="menu-content">
					<span class="menu-heading fw-semibold text-uppercase fs-7">Help</span>
				</div>
			</div>

			<div class="menu-item">
				<a class="menu-link" href="#">
					<span class="menu-icon">{!! getSvgIcon('duotune/general/gen002.svg', 'svg-icon svg-icon-2') !!}</span>
					<span class="menu-title">Components</span>
				</a>
			</div>

			<div class="menu-item">
				<a class="menu-link" href="#">
					<span class="menu-icon">{!! getSvgIcon('duotune/abstract/abs027.svg', 'svg-icon svg-icon-2') !!}</span>
					<span class="menu-title">Documentation</span>
				</a>
			</div>

			<div class="menu-item">
				<a class="menu-link" href="#">
					<span class="menu-icon">{!! getSvgIcon('duotune/coding/cod003.svg', 'svg-icon svg-icon-2') !!}</span>
					<span class="menu-title">Changelog</span>
				</a>
			</div> --}}

		</div>
		<!--end::Menu-->
	</div>
	<!--end::Menu wrapper-->
</div>
<!--end::sidebar menu-->
