    <!-- jQuery library js -->
    <script src="{{ asset('assets/js/lib/jquery-3.7.1.min.js') }}"></script>
    <!-- Apex Chart js -->
    <script src="{{ asset('assets/js/lib/apexcharts.min.js') }}"></script>
    <!-- Data Table js -->
    <script src="{{ asset('assets/js/lib/simple-datatables.min.js') }}"></script>
    <!-- Iconify Font js -->
    <script src="{{ asset('assets/js/lib/iconify-icon.min.js') }}"></script>
    <!-- jQuery UI js -->
    <script src="{{ asset('assets/js/lib/jquery-ui.min.js') }}"></script>
    <!-- Vector Map js -->
    <script src="{{ asset('assets/js/lib/jquery-jvectormap-2.0.5.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- Popup js -->
    <script src="{{ asset('assets/js/lib/magnifc-popup.min.js') }}"></script>
    <!-- Slick Slider js -->
    <script src="{{ asset('assets/js/lib/slick.min.js') }}"></script>
    <!-- prism js -->
    <script src="{{ asset('assets/js/lib/prism.js') }}"></script>
    <!-- file upload js -->
    <script src="{{ asset('assets/js/lib/file-upload.js') }}"></script>
    <!-- audio player -->
    <script src="{{ asset('assets/js/lib/audioplayer.js') }}"></script>

    <script src="{{ asset('assets/js/flowbite.min.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php echo (isset($script) ? $script   : '')?>

    <script>
        document.addEventListener('livewire:load', function() {
        
        // Alternative: Play sound when polling detects new notifications
        let lastCount = 0;
        
        Livewire.hook('message.processed', (message, component) => {
            if (component.name === 'notifications') {
                const currentCount = component.get('unreadCount');
                if (currentCount > lastCount) {
                    const sound = document.getElementById('notificationSound');
                    sound.currentTime = 0;
                    sound.play().catch(e => console.log("Audio play failed:", e));
                }
                lastCount = currentCount;
            }
        });
    });
    </script>
    <script>
    function confirmDelete(event, url) {
        event.preventDefault(); // Prevent the default link behavior

        Swal.fire({
            title: 'Are you sure?',
            text: 'You are about to delete this record. This action cannot be undone!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to the delete URL if confirmed
                window.location.href = url;
            }
        });
    }
</script>
@if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#3b82f6',
                });
            });
        </script>
@endif

<script>
    function toggleNotifications() {
        document.getElementById('notificationsDropdown').classList.toggle('hidden');
    }
</script>

<script>
    // ================== Password Show Hide Js Start ==========
    function initializePasswordToggle(toggleSelector) {
        $(toggleSelector).on("click", function() {
            console.log("i have been clicked");
            $(this).toggleClass("ri-eye-line");
            var input = $($(this).attr("data-toggle"));
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    }
    // Call the function
    initializePasswordToggle(".toggle-password");
    // ========================= Password Show Hide Js End ===========================
</script>

@if(request()->is('/') || request()->routeIs('/'))

    <script>

                        // Wait for DOM to be fully loaded
                        document.addEventListener('DOMContentLoaded', function() {
                            console.log("chart script initialized");
                            // Fetch visitor stats data
                            fetch("{{ asset('/visitor-stats') }}")
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error('Network response was not ok');
                                    }
                                    return response.json();
                                })
                                .then(data => {
                                    console.log('Received data:', data);

                                    // Create chart with the fetched data
                                    createVisitorTypeChart(
                                        'visitorTypeChart', // chart container ID
                                        '#3B82F6',          // color for pre-registered
                                        '#10B981',          // color for walk-in
                                        data.preRegistered, // pre-registered data
                                        data.walkIn         // walk-in data
                                    );
                                })
                                .catch(error => {
                                    console.error('Error fetching visitor stats:', error);
                                    // Create chart with empty data if fetch fails
                                    createVisitorTypeChart(
                                        'visitorTypeChart',
                                        '#3B82F6',
                                        '#10B981',
                                        Array(12).fill(0),
                                        Array(12).fill(0)
                                    );
                                });
                        });
                        // ===================== Average Enrollment Rate Start =============================== 
                        function createVisitorTypeChart(chartId, color1, color2, series1Data, series2Data) {
                            var options = {
                                series: [{
                                    name: "Pre-registered",
                                    data: series1Data
                                }, {
                                    name: "Walk-in",
                                    data: series2Data
                                }],
                                chart: {
                                    type: "area",
                                    height: 350,
                                    toolbar: { show: false }
                                },
                                colors: [color1, color2],
                                dataLabels: { enabled: false },
                                stroke: {
                                    curve: "smooth",
                                    width: 2
                                },
                                fill: {
                                    type: "gradient",
                                    gradient: {
                                        shadeIntensity: 1,
                                        opacityFrom: 0.7,
                                        opacityTo: 0.3,
                                        stops: [0, 100]
                                    }
                                },
                                xaxis: {
                                    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                                    labels: {
                                        style: {
                                            colors: '#6B7280',
                                            fontSize: '12px'
                                        }
                                    },
                                    axisBorder: { show: false },
                                    axisTicks: { show: false }
                                },
                                yaxis: {
                                    labels: {
                                        style: {
                                            colors: '#6B7280',
                                            fontSize: '12px'
                                        },
                                        formatter: function(value) {
                                            return value; // Remove the $ and k suffix since these are counts
                                        }
                                    }
                                },
                                tooltip: {
                                    y: {
                                        formatter: function(value) {
                                            return value + " visitors";
                                        }
                                    }
                                },
                                legend: {
                                    position: 'top',
                                    horizontalAlign: 'right',
                                    markers: {
                                        radius: 12
                                    }
                                },
                                grid: {
                                    borderColor: '#F3F4F6',
                                    strokeDashArray: 4,
                                    yaxis: {
                                        lines: {
                                            show: true
                                        }
                                    }
                                }
                            };

                            var chart = new ApexCharts(document.querySelector(`#${chartId}`), options);
                            chart.render();
                        }

    </script>
@endif