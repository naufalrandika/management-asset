<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        var data = {
            labels: ["Berwujud", "Tidak Berwujud"],
            datasets: [{
                data: [{{ $totalBerwujud }}, {{ $totalTidakBerwujud }}],
                backgroundColor: ["#36a2eb", "#ff6384"],
            }],
        };

        var options = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            var label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            var value = context.parsed || 0;
                            var percentage = (value / context.dataset.data.reduce((a, b) => a + b) *
                                100).toFixed(2);
                            return label + value + ' (' + percentage + '%)';
                        }
                    }
                }
            }
        };

        var ctx = document.getElementById("pie-chart").getContext("2d");

        var myPieChart = new Chart(ctx, {
            type: "doughnut",
            data: data,
            options: options,
        });

        var ctxPieNilai = document.getElementById('pie-chart-nilai').getContext('2d');
        new Chart(ctxPieNilai, {
            type: 'doughnut',
            data: {
                labels: ['Total Nilai Berwujud', 'Total Nilai Tidak Berwujud'],
                datasets: [{
                    data: [@json($totalNilaiBerwujud), @json($totalNilaiTidakBerwujud)],
                    backgroundColor: [
                        '#FF6384',
                        '#36A2EB',
                    ],
                }]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'right'
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                var label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                var value = context.parsed || 0;
                                var percentage = (value / context.dataset.data.reduce((a, b) => a +
                                    b) * 100).toFixed(2);
                                return label + value + ' (' + percentage + '%)';
                            }
                        }
                    }
                }
            }
        });

        // Chart berdasarkan jenis
        var dataJenis = {
            labels: @json($dataJenis), // Gunakan data jenis dari controller
            datasets: [{
                data: [ /* ... */ ], // Ganti dengan data jumlah jenis yang sesuai
                backgroundColor: [
                    "#FF6384",
                    "#36A2EB",
                    "#FFCE56",
                    // Tambahkan warna sesuai dengan jumlah jenis yang Anda punya
                ],
                borderWidth: 1
            }]
        };

        var optionsJenis = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            var label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            var value = context.parsed || 0;
                            var percentage = (value / context.dataset.data.reduce((a, b) => a + b) *
                                100).toFixed(2);
                            return label + value + ' (' + percentage + '%)';
                        }
                    }
                }
            }
        };

        var ctxJenis = document.getElementById("pie-chart-jenis").getContext("2d");

        var myPieChartJenis = new Chart(ctxJenis, {
            type: "doughnut",
            data: dataJenis,
            options: optionsJenis,
        });

    });
</script>
