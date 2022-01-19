<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div class="m-5">
    {!! DNS1D::getBarcodeSVG('4445645656', 'C39',4,40) !!} 
    <br>
    {!! DNS2D::getBarcodeHTML('https://www.google.com/', 'QRCODE') !!}  
</div>

<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data" class="border border-faded rounded bg-white p-4">
                @csrf
                <label for="">Photo Upload</label>
                <div class="form-inline">
                    <input type="file" name="photo" class="form-control p-1 mr-2" required> 
                    <button class="btn btn-primary">Upload</button>
                </div>
            </form>
            <div class="border border-faded rounded bg-white p-4 mt-5">
                <h4>Photo List</h4>
                <div class="card-columns">
                    @foreach(File::files('edited') as $photo)
                        <div class="card">
                            <img src="{{ asset($photo) }}" class="w-100" class="card-img" alt="">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>