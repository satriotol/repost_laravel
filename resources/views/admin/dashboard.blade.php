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
                            <h4>Jenis Post</h4>
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
                            <h4>Jumlah Foto Repost</h4>
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
                        <h4>Jenis Repost</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart3"></canvas>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Jumlah Foto Repost</h4>
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

        const data2 = {
            labels: labels2,
            datasets: [{
                label: 'Foto Postingan',
                data: [
                    @foreach ($users_count as $uc)
                        {{ $uc->post_images_count }},
                    @endforeach
                ],
                backgroundColor: [
                    @foreach ($users_count as $uc)
                        'rgba(255, 159, 64, 0.2)',
                    @endforeach
                ],
                borderColor: [
                    @foreach ($users_count as $uc)
                        'rgb(255, 159, 64)',
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

    <script>
        const labels3 = [
            @foreach ($users_post_count as $upc)
                '{!! $upc->name !!}',
            @endforeach
        ];

        const data3 = {
            labels: labels3,
            datasets: [{
                label: 'Jenis Repost',
                data: [
                    @foreach ($users_post_count as $upc)
                        {{ $upc->posts_count }},
                    @endforeach
                ],
                backgroundColor: [
                    @foreach ($users_post_count as $upc)
                        'rgba(255, 99, 132, 0.2)',
                    @endforeach
                ],
                borderColor: [
                    @foreach ($users_count as $uc)
                        'rgb(255, 99, 132)',
                    @endforeach
                ],
                borderWidth: 1
            }]
        };

        const config3 = {
            type: 'bar',
            data: data3,
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
        const myChart3 = new Chart(
            document.getElementById('myChart3'),
            config3
        );
    </script>
@endpush
