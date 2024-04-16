<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        p {
            color: #666;
        }

        .button {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Email Notification</h2>
        <h3>Chào: {{ $account->user_name }}</h3>
        <p>Bạn đã đăng ký thành công. Hãy kích hoạt để có thể sử dụng tài khoản</p>
        <p>登録完了した。有効のアカウントのため、ごアクティベートください。</p>
        <a href="{{ route('nguoidung.verifyMail', $account->email) }}" class="button text-bg-light">Nhấp vào link sau để kích hoạt.</a>
    </div>
</body>

</html>
