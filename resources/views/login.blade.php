<html>
<head>
    <title>Login - Task management system</title>
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
    <script>
        @if(session()->has('msg'))
            alert("{{ session()->get('msg') }}");
        @endif
    </script>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="{{ url('/') }}/postlogin" method="post">
            @csrf
            <table align="center">
                <tr>
                    <th>Email : </th>
                    <td><input type="email" placeholder="Enter email" name="email" required></td>
                </tr>

                <tr>
                    <th>Password : </th>
                    <td><input type="password" placeholder="Enter password" name="password" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><br><input type="submit" value="Login"/></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>