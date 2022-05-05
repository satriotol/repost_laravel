@extends('admin.layouts.main')
@section('content')
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Post</h4>
                        </div>
                        <div class="card-body">
                            {{ $posts }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>User</h4>
                        </div>
                        <div class="card-body">
                            {{ $users }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-image"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Image Posted</h4>
                        </div>
                        <div class="card-body">
                            {{ $post_images }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Social Media</h4>
                        </div>
                        <div class="card-body">
                            {{ $social_medias }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Postingan Pengguna</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Media Sosial</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = [
            @foreach ($social_media_count as $smc)
                '{!! $smc->name !!}',
            @endforeach
        ];

        const data = {
            labels: labels,
            datasets: [{
                label: 'Media Sosial',
                data: [
                    @foreach ($social_media_count as $smc)
                        {{ $smc->post_images_count }},
                    @endforeach
                ],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                hoverOffset: 4
            }]
        };

        const config = {
            type: 'doughnut',
            data: data,
        };
    </script>
    <script>
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

    <script>
        const labels2 = [
            @foreach ($users_count as $uc)
                '{!! $uc->name !!}',
            @endforeach
        ];

        function random_rgba() {
            var o = Math.round,
                r = Math.random,
                s = 255;
            return 'rgba(' + o(r() * s) + ',' + o(r() * s) + ',' + o(r() * s) + ',' + r().toFixed(1) + ')';
        }
        const data2 = {
            labels: labels2,
            datasets: [{
                label: 'Postingan',
                data: [
                    @foreach ($users_count as $uc)
                        {{ $uc->post_images_count }},
                    @endforeach
                ],
                backgroundColor: [
                    @foreach ($users_count as $uc)
                        random_rgba(),
                    @endforeach
                ],
                borderWidth: 1
            }]
        };

        const config2 = {
            type: 'bar',
            data: data2,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };
    </script>
    <script>
        const myChart2 = new Chart(
            document.getElementById('myChart2'),
            config2
        );
    </script>
@endpush
