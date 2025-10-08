<!DOCTYPE html>
<html>
<head>
    <title>Form Message</title>
</head>
<body>
    <h2>Kirim Pesan</h2>

    <form action="{{ route('submit') }}" method="POST">
        @csrf
        <label for="message">Tulis Pesan:</label><br>
        <input type="text" name="message" id="message" placeholder="Ketik sesuatu..."><br><br>
        <button type="submit">Kirim</button>
    </form>
</body>
</html>
