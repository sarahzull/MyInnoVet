@extends('layout.master')
@section('title', 'Calendar')
@section('header-button')

@endsection

@section('content')
<div class="card">
  {{-- <div class="card-header">
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
  </div> --}}
  <div class="card-body">
    <div id="fullcalendar"></div>
  </div>
</div>
@endsection

@section('scripts')
  <script>
    "use strict";

    var appointments = @json($appointments);
    var KTGeneralFullCalendarBasic = function () {
        // Private functions
        var exampleBasic = function () {
          var todayDate = moment().startOf('day');
          var YM = todayDate.format('YYYY-MM');
          var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
          var TODAY = todayDate.format('YYYY-MM-DD');
          var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');
          var calendarEl = document.getElementById('fullcalendar');
          var events = [];
          appointments.forEach(function(appointment) {
            if(appointment.slots && appointment.slots.slot_details) {
                // extract date and time
                let startDate = new Date(appointment.slots.date);
                let startTime = appointment.slots.slot_details.start.split('.0000000')[0].split(':');
                let endTime = appointment.slots.slot_details.end.split('.0000000')[0].split(':');

                // create new date objects for start and end
                let start = new Date(startDate.getFullYear(), startDate.getMonth(), startDate.getDate(), startTime[0], startTime[1], startTime[2]);
                let end = new Date(startDate.getFullYear(), startDate.getMonth(), startDate.getDate(), endTime[0], endTime[1], endTime[2]);

                events.push({
                    title: 'Appointment for ' + appointment.patient.name,
                    start: start.toISOString(),
                    end: end.toISOString(),
                    extendedProps: {
                        description: 'Type: ' + appointment.type
                    }
                });
            }
          });

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
              events: events,

              views: {
                  dayGridMonth: { buttonText: 'month' },
                  timeGridWeek: { buttonText: 'week' },
                  timeGridDay: { buttonText: 'day' }
              },

              initialView: 'timeGridWeek',
              initialDate: TODAY,
              slotMinTime: '9:00:00',
              slotMaxTime: '19:00:00',

              editable: true,
              dayMaxEvents: true, // allow "more" link when too many events
              navLinks: true,

              eventContent: function (arg) {
                  var element = $(arg.el);
                  var title = arg.event.title;
                  var description = arg.event.extendedProps.description;

                  if (arg.view.type === 'dayGridMonth') {
                      // For month view, show only the title
                      return {
                          html: '<div class="fc-event-title">' + title + '</div>'
                      };
                  } else {
                      // For other views, show title and description
                      var html = '<div class="fc-event-title">' + title + '</div>';
                      if (description) {
                          html += '<div class="fc-description">' + description + '</div>';
                      }
                      return {
                          html: html
                      };
                  }
              },

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
