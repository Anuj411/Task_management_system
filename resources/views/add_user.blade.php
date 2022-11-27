<!DOCTYPE html>    
<html>    
    <head>    
        <title>Add user - Task management system</title>
        <script>
            @if(session()->has('msg'))
                alert("{{ session()->get('msg') }}");
            @endif
        </script>
    </head>    
    <body>
        @include('header')
        <div class="container">
            <h1>Add User</h1>
            <form action="{{ url('/') }}/insert_user" method="post">
                @csrf
                <table align="center">
                    <tr>
                        <th>Full name : </th>
                        <td><input type="text" name="name" placeholder="Enter full name" required></td>
                    </tr>
                    <tr>
                        <th>Email : </th>
                        <td><input type="email" name="email" placeholder="Enter Email" required></td>
                    </tr>
                    <tr>
                        <th>Password : </th>
                        <td><input type="password" name="pass" placeholder="Enter password" required></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="checkbox" id="suser" name="check">
                            <label for="suser">Is superuser</label>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><br><input type="submit"value="Add user"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>