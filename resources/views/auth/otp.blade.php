<!DOCTYPE html>
<html>
<head>
    <title>Enter OTP</title>
</head>
<body>
    <h2>Enter OTP sent to {{ $email }}</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('verify.otp') }}">
        @csrf
        <input type="hidden" name="email" value="{{ $email }}">

        <label for="otp">OTP Code:</label>
        <input type="text" name="otp" required>
        <br><br>

        <button type="submit">Verify OTP</button>
    </form>
</body>
</html>
