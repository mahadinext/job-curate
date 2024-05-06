<script src="{{ URL::asset('dashboard/assets/js/jquery.js') }}"></script>
<script src="{{ URL::asset('dashboard/assets/js/popper.min.js') }}"></script>
<script src="{{ URL::asset('dashboard/assets/js/chosen.min.js') }}"></script>
<script src="{{ URL::asset('dashboard/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('dashboard/assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ URL::asset('dashboard/assets/js/jquery.fancybox.js') }}"></script>
<script src="{{ URL::asset('dashboard/assets/js/jquery.modal.min.js') }}"></script>
<script src="{{ URL::asset('dashboard/assets/js/mmenu.polyfills.js') }}"></script>
<script src="{{ URL::asset('dashboard/assets/js/mmenu.js') }}"></script>
<script src="{{ URL::asset('dashboard/assets/js/appear.js') }}"></script>
{{-- <script src="{{ URL::asset('dashboard/assets/js/ScrollMagic.min.js') }}"></script> --}}
<script src="{{ URL::asset('dashboard/assets/js/rellax.min.js') }}"></script>
{{-- <script src="{{ URL::asset('dashboard/assets/js/owl.js') }}"></script> --}}
{{-- <script src="{{ URL::asset('dashboard/assets/js/wow.js') }}"></script> --}}
<script src="{{ URL::asset('dashboard/assets/js/script.js') }}"></script>

<!-- Chart.js // documentation: http://www.chartjs.org/docs/latest/ -->
<script src="{{ URL::asset('dashboard/assets/js/chart.min.js') }}"></script>
<script>
    Chart.defaults.global.defaultFontFamily = "Sofia Pro";
    Chart.defaults.global.defaultFontColor = '#888';
    Chart.defaults.global.defaultFontSize = '14';

    var ctx = document.getElementById('chart').getContext('2d');

    var chart = new Chart(ctx, {

        type: 'line',
        // The data for our dataset
        data: {
            labels: ["January", "February", "March", "April", "May", "June"],
            // Information about the dataset
            datasets: [{
                label: "Views",
                backgroundColor: 'transparent',
                borderColor: '#1967D2',
                borderWidth: "1",
                data: [196, 132, 215, 362, 210, 252],
                pointRadius: 3,
                pointHoverRadius: 3,
                pointHitRadius: 10,
                pointBackgroundColor: "#1967D2",
                pointHoverBackgroundColor: "#1967D2",
                pointBorderWidth: "2",
            }]
        },

        // Configuration options
        options: {

            layout: {
                padding: 10,
            },

            legend: {
                display: false
            },
            title: {
                display: false
            },

            scales: {
                yAxes: [{
                    scaleLabel: {
                        display: false
                    },
                    gridLines: {
                        borderDash: [6, 10],
                        color: "#d8d8d8",
                        lineWidth: 1,
                    },
                }],
                xAxes: [{
                    scaleLabel: {
                        display: false
                    },
                    gridLines: {
                        display: false
                    },
                }],
            },

            tooltips: {
                backgroundColor: '#333',
                titleFontSize: 13,
                titleFontColor: '#fff',
                bodyFontColor: '#fff',
                bodyFontSize: 13,
                displayColors: false,
                xPadding: 10,
                yPadding: 10,
                intersect: false
            }
        },
    });
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Function to load notifications
    function loadNotifications() {
        // console.log('Loading notifications');
        $.ajax({
            url: "{{ route('fetch.notifications') }}",
            type: "GET",
            dataType: "json",
            success: function(response) {
                // Update UI with notifications
                updateNotificationUI(response.notifications);
            },
            error: function(xhr, status, error) {
                console.error("Error fetching notifications: " + error);
            }
        });
    }

    // Function to update notification UI
    function updateNotificationUI(notifications) {
        var notificationDropdown = $('#notification-dropdown');
        notificationDropdown.empty();

        var unreadCount = 0;

        // Iterate through notifications
        $.each(notifications, function(index, notification) {
            var notificationItem = $('<a>', {
                href: "javascript:void(0)",
                class: notification.read ? 'dropdown-item' : 'dropdown-item unread',
                'data-id': notification.id,
                // style: 'font-size: 11px; font-weight: 500;'
            }).text(notification.message);

            var listItem = $('<li>').append(notificationItem); // Wrapping <a> inside <li>
            notificationDropdown.append(listItem);

            if (notification.read == null) {
                unreadCount++;
            }
        });

        // Update unread count
        $('#unread-count').text(unreadCount);

        // Highlight unread notifications
        $('.unread').css('color', '#1967D2');
    }

    // Function to mark notification as read
    $(document).on('click', '#notification-dropdown .unread', function(e) {
        e.preventDefault();

        var notification = $(this);
        var notificationId = notification.data('id');

        $.ajax({
            url: "{{ route('mark.notification.read') }}",
            type: "POST",
            data: { id: notificationId },
            dataType: "json",
            success: function(response) {
                // Update UI
                notification.removeClass('unread').addClass('read');
                notification.css('font-weight', 'normal');
                var unreadCount = parseInt($('#unread-count').text());
                if (unreadCount > 0) {
                    $('#unread-count').text(unreadCount - 1);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error marking notification as read: " + error);
            }
        });
    });

    // Load notifications on page load
    $(document).ready(function() {
        loadNotifications();

        // Update notifications every 6 seconds
        setInterval(function() {
            loadNotifications();
        }, 6000);
    });

</script>

@yield('script')
@yield('script-bottom')
