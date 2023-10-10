document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth', // เลือกวิวที่แสดงเป็นเดือน
        events: {
            url: 'booking_process.php', // ระบุ URL ของ API
            method: 'GET', // ระบุวิธี HTTP ที่ใช้เรียก API (GET)
        },
        eventRender: function (info) {
            if (info.event.extendedProps.isBooked) {
                info.el.classList.add('booked'); // เพิ่มคลาส 'booked' เพื่อเปลี่ยนสีพื้นหลัง
            }
        }
    });

    calendar.render();
});
