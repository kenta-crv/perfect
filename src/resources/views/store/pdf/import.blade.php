<!DOCTYPE html>
<html lang="en">
    <?php $is_production = env('APP_ENV') === 'production' ? true : false; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{$is_production ? secure_asset('css/pdf.css') : asset('css/pdf.css') }}">
</head>
<body>
  <form action="{{ route('importPdf') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="ssh" />
    <input type="submit" />
  </form>
</body>
</html>