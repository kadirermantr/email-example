<!DOCTYPE html>
<html>
<head>
    <title>Notifications</title>

    <style>
        body {
            padding-top: 50px;
            padding-left: 30px;
            padding-right: 30px;
        }
    </style>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<h2>Bildirimler</h2><br>

<table class="table table-striped">
    <tr>
        <th>No</th>
        <th>Adı</th>
        <th>Geçerlilik Tarihi</th>
        <th>Oluşturulma Tarihi</th>
        <th>Güncelleme Tarihi</th>
    </tr>

    @foreach($notifications as $notification)
        <tr>
            <td>{{$notification->id}}</td>
            <td>{{$notification->name}}</td>
            <td>{{$notification->effectiveDate}}</td>
            <td>{{$notification->created_at}}</td>
            <td>{{$notification->updated_at}}</td>
        </tr>
    @endforeach
</table>

</body>
</html>
