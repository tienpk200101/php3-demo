<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Sinh Viên</th>
                <th>Khoa</th>
                <th>Tuổi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sinh_vien as $sv)
            <tr>
                <td>{{$sv->id}}</td>
                <td>{{$sv->tensv}}</td>
                <td>{{$sv->khoa}}</td>
                <td>{{$sv->tuoi}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>