<!DOCTYPE html>
<html>
<head>
    <title>Add task - Task management system</title>
    <script>
        @if(session()->has('msg'))
            alert("{{ session()->get('msg') }}");
        @endif
    </script>
</head>
<body>
    @include('header')
    <div class="container">  
        <h1>Add Task</h1>
        <form action="{{ url('/') }}/insert_task" method="post">
            @csrf
            <table align="center">
                <tr>
                    <th>Title : </th>
                    <td><input type="text" name="title" size="30" placeholder="Enter task title" required></td>
                </tr>
                <tr>
                    <th>Description : </th>
                    <td>
                        <textarea name="desc" cols="30" rows="5"></textarea>
                    </td>
                </tr>
                <tr>
                    <th>Priority : </th>
                    <td style="text-align:left">
                        <select name="priority">
                            <option value="1">High</option>
                            <option value="2">Medium</option>
                            <option value="3">Low</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td><br><input type="submit" value="Add task"></td>
                </tr>
            </table>
        </form>
    </body>
</html>