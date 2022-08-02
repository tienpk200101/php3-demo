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
                <th>Ngày Nhập Học</th>
                <th>Địa Chỉ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $student)
            <tr>
                <td>{{$student->id}}</td>
                <td>{{$student->ten_sinh_vien}}</td>
                <td>{{$student->ngay_nhap_hoc}}</td>
                <td>{{$student->dia_chi}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>