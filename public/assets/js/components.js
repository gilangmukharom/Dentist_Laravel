$(document).ready(function () {
    // Toggle sidebar on small screens
    $("#sidebarToggle").on("click", function (e) {
        e.preventDefault()
        $("#sidebar").toggleClass("d-none");
    });
});

$(document).ready(function() {
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        events: [
            // Tambahkan data kegiatan sesuai kebutuhan Anda
            {
                title: 'Event 1',
                start: '2022-01-01'
            },
            {
                title: 'Event 2',
                start: '2022-01-05'
            },
            // ...
        ]
        // Konfigurasi FullCalendar sesuai kebutuhan Anda
    });
});