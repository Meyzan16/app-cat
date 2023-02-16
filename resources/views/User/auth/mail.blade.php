
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
            <p style="text-align: left;">Yang terhormat saudara/i</p>
            <p style="text-align: left;">Dengan mahasiswa kami yang bersangkutan<br />Nama&nbsp; &nbsp; &nbsp;: {{ $nama }}<br /></p>


            <p class="small mb-0" style="text-align: center;">veirfikasi email anda,
                <a href="{{route('aktivasi.token',$token)}}">Aktivasi</a>
            </p>



</body>
</html>


