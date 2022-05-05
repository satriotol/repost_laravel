<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .page-break {
            page-break-after: always;
        }

    </style>
</head>

<body>

    <div class="text-center">
        <h5>{{ $user->name }}</h5>
        <h5>{{ $user->nip }}</h5>
        <p>{{ $user->sector->agency->name ?? '' }} | {{ $user->sector->name ?? '' }}</p>
    </div>
    <hr>
    <br />
    @foreach ($user->posts as $post)
        <p>{{ $post->name }}</p>
        <p>{{ $post->date }}</p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Sosial Media</th>
                    <th scope="col">Photo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($post->post_images as $post_image)
                    <tr>
                        <td>{{ $post_image->social_media->name }}</td>
                        <td>
                            <img src="{{ public_path('storage/' . $post_image->image) }}" style="height: 300px"
                                alt="">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="page-break"></div>
    @endforeach

</body>

</html>
