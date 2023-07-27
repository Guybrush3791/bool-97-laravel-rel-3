<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">

        @csrf
        <input type="file" name="image" id="image">
        <input type="submit" value="TEST">
    </form>
    <img src="{{ asset('storage/uploads/7fRVdnmGpGRtK5UeBHfo5c1Vgewb7CXT0LiEQmeJ.png') }}" alt="error">
</body>
</html>
