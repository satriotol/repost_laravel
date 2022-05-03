<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="text-center">
        <h5>{{ $user->name }}</h5>
    </div>
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
                            <img src="{{ public_path('storage/' . $post_image->image) }}" style="height: 100px"
                                alt="">
                        </td>
                        {{-- <td> <img src="{{ $post_image->image }}" style="height: 100px" alt=""></td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach

</body>

</html>
