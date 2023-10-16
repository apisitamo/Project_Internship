document.addEventListener('DOMContentLoaded', function () {
  var calendarEl = document.getElementById('calendar1');

  var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      events: {
          url: 'course_date.php',
          method: 'GET',
      },
  });

  calendar.render();
});
