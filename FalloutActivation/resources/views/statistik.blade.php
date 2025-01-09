@extends('layouts.main')
@section('content')
@include('partials.navbar')

<div class="d-flex justify-content-center" style="margin-top: 8rem;">
    <div class="container">
        <div class="d-flex justify-content-center" style="margin-left: 57rem; margin-bottom: 2rem;">
            <form id="filterForm" action="{{ url('statistik') }}" method="GET">
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label class="sr-only" for="bulan">Pilih Bulan</label>
                        <input type="month" class="form-control" id="bulan" name="bulan" onchange="saveAndSubmit()">
                    </div>
                </div>
            </form>
        </div>


        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="p-4 border rounded" style="background-color: #FFFFFF">
                    <h5 class="text-center mb-3">JUMLAH PENANGANAN GANGGUAN OLEH HELPDESK</h5>
                    <hr>
                    <div id="columnChart" style="width:100%; max-width:600px; height:278px;"></div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="p-4 border rounded" style="background-color: #FFFFFF">
                    <h5 class="text-center mb-3">GANGGUAN TERBANYAK</h5>
                    <hr>
                    <div id="pieGChart" style="width:100%; max-width:600px; height:278px;"></div>
                </div>
            </div>

            <div class="col-md-6" style="margin-top:15px;">
                <div class="p-4 border rounded" style="background-color: #FFFFFF">
                    <h5 class="text-center mb-3">RATA-RATA WAKTU PENANGANAN HELPDESK</h5>
                    <hr>
                    <div id="averageChart" style="width:100%; max-width:600px; height:300px;"></div>
                </div>
            </div>

            <div class="col-md-6" style="margin-top:15px;">
                <div class="p-4 border rounded" style="background-color: #FFFFFF">
                    <h5 class="text-center mb-3">RATA-RATA WAKTU PENANGANAN GANGGUAN</h5>
                    <hr>
                    <div id="averagePermintChart" style="width:100%; max-width:600px; height:300px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.footer')
<script>
    const averageHD = @json($averageHD);
    const averagePermint = @json($averagePermint);
    const statusCounts = @json($statusCounts);
    const helpdeskData = @json($helpdeskData);

    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
        drawChart();
        drawPieChart();
        drawColumnChart();
        drawPermintChart();
    }

    function drawColumnChart() {
        // Membuat DataTable untuk Google Charts
        const data = new google.visualization.DataTable();
        data.addColumn('string', 'Helpdesk');
        data.addColumn('number', 'Jumlah');

        // Mengisi data ke dalam DataTable
        helpdeskData.forEach(item => {
            data.addRow([item.name, parseFloat(item.closed_count)]);
        });

        const options = {
            title: '5 Helpdesk dengan penanganan paling banyak',
            hAxis: { title: 'Helpdesk' },
            vAxis: { title: 'Jumlah Closed Case' },
            legend: { position: 'none' },
            colors: ['#d62728']
        };

        const chart = new google.visualization.ColumnChart(document.getElementById('columnChart'));

        // Menggambar chart dengan menggunakan data dan opsi yang sudah disiapkan
        chart.draw(data, options);
    }

    function drawChart() {
        // Membuat DataTable untuk Google Charts
        const data = new google.visualization.DataTable();
        data.addColumn('string', 'Helpdesk');
        data.addColumn('number', 'Jam');

        // Mengisi data ke dalam DataTable
        averageHD.forEach(item => {
            data.addRow([item.oleh, parseFloat(item.average)]);
        });

        const options = {
            title: '10 Helpdesk dengan waktu penanganan paling lambat',
            hAxis: { title: 'Jam' },
            vAxis: { title: 'Helpdesk' },
            legend: { position: 'none' }
        };

        const chart = new google.visualization.BarChart(document.getElementById('averageChart'));

        // Menggambar chart dengan menggunakan data dan opsi yang sudah disiapkan
        chart.draw(data, options);
    }

    function drawPermintChart() {
        // Membuat DataTable untuk Google Charts
        const data = new google.visualization.DataTable();
        data.addColumn('string', 'Permint');
        data.addColumn('number', 'Jam');

        // Mengisi data ke dalam DataTable
        averagePermint.forEach(item => {
            data.addRow([item.permint, parseFloat(item.average)]);
        });

        const options = {
            hAxis: { title: 'Jam' },
            vAxis: { title: 'Gangguan' },
            legend: { position: 'none' },
            colors: ['#bcbd22']
        };

        const chart = new google.visualization.BarChart(document.getElementById('averagePermintChart'));

        // Menggambar chart dengan menggunakan data dan opsi yang sudah disiapkan
        chart.draw(data, options);
    }

    function drawPieChart() {
        const data = google.visualization.arrayToDataTable([
            ['Permintaan', 'Jumlah'],
            ['Config', statusCounts.config || 0],
            ['Fallout', statusCounts.fallout || 0],
            ['Hapus ONU', statusCounts.hapus_onu || 0],
            ['Cek Datek', statusCounts.cek_datek || 0],
            ['Datek ONU', statusCounts.datek_onu || 0]
        ]);

        const chart = new google.visualization.PieChart(document.getElementById('pieGChart'));
        chart.draw(data);
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const monthInput = document.getElementById('bulan');
        const storedMonth = localStorage.getItem('selectedMonth');

        if (storedMonth) {
            monthInput.value = storedMonth;
        } else {
            const currentDate = new Date();
            const month = String(currentDate.getMonth() + 1).padStart(2, '0');
            const year = currentDate.getFullYear();
            monthInput.value = `${year}-${month}`;
        }
    });

    function saveAndSubmit() {
        const monthInput = document.getElementById('bulan');
        localStorage.setItem('selectedMonth', monthInput.value);
        document.getElementById('filterForm').submit();
    }
</script>
@endsection