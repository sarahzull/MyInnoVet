@extends('layout.master')
@section('title', 'Calendar')
@section('header-button')
 
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    <h2 class="card-title fw-bold">Calendar</h2>
    <div class="card-toolbar">
      <button class="btn btn-flex btn-primary" data-kt-calendar="add">
      <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
      <span class="svg-icon svg-icon-2">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
          <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
        </svg>
      </span>
      <!--end::Svg Icon-->Add Event</button>
    </div>
  </div>
  <div class="card-body">
    <div id="kt_docs_fullcalendar_basic"></div>
  </div>
</div>
@endsection

@section('scripts')
  <script>
    "use strict";

  var KTGeneralFullCalendarBasic = function () {
      // Private functions
      var exampleBasic = function () {
          var todayDate = moment().startOf('day');
          var YM = todayDate.format('YYYY-MM');
          var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
          var TODAY = todayDate.format('YYYY-MM-DD');
          var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

          var calendarEl = document.getElementById('kt_docs_fullcalendar_basic');
          var calendar = new FullCalendar.Calendar(calendarEl, {
              headerToolbar: {
                  left: 'prev,next today',
                  center: 'title',
                  right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
              },

              height: 800,
              contentHeight: 780,
              aspectRatio: 3,  // see: https://fullcalendar.io/docs/aspectRatio

              nowIndicator: true,
              now: TODAY + 'T09:25:00', // just for demo

              views: {
                  dayGridMonth: { buttonText: 'month' },
                  timeGridWeek: { buttonText: 'week' },
                  timeGridDay: { buttonText: 'day' }
              },

              initialView: 'dayGridMonth',
              initialDate: TODAY,

              editable: true,
              dayMaxEvents: true, // allow "more" link when too many events
              navLinks: true,
              events: [
                  
              ],

              eventContent: function (info) {
                  var element = $(info.el);

                  if (info.event.extendedProps && info.event.extendedProps.description) {
                      if (element.hasClass('fc-day-grid-event')) {
                          element.data('content', info.event.extendedProps.description);
                          element.data('placement', 'top');
                          KTApp.initPopover(element);
                      } else if (element.hasClass('fc-time-grid-event')) {
                          element.find('.fc-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                      } else if (element.find('.fc-list-item-title').lenght !== 0) {
                          element.find('.fc-list-item-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                      }
                  }
              }
          });

          calendar.render();
      }

      return {
          // Public Functions
          init: function () {
              exampleBasic();
          }
      };
  }();

  // On document ready
  KTUtil.onDOMContentLoaded(function () {
      KTGeneralFullCalendarBasic.init();
  });

  </script>
@endsection




