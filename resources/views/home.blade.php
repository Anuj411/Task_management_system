<html>
<head>
    <title>Login - Task management system</title>
    <script>
        @if(session()->has('msg'))
            alert("{{ session()->get('msg') }}");
        @endif
    </script>
</head>
<body>
    @include('header')
    @if($is_admin==1)
        <div class="container">
            <h1>User list</h1>
            <table border=1 cellspacing=0 align="center">
                <tr>
                    <th style="width:50">ID</th>
                    <th style="width:150">Name</th>
                    <th style="width:200">Email</th>
                    <th>Superuser</th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @if( $user['is_superuser'] == 1)
                        <td>Yes</td>
                    @else
                        <td>No</td>
                    @endif
                </tr>
                @endforeach
            </table>
        </div>
    @else
        <div class="container2">
            <h1>Tasks</h1>
            <table border=1 cellspacing=0 align="center">
                <tr>
                    <th style="width:50">No.</th>
                    <th style="width:200">Title</th>
                    <th style="width:400">Description</th>
                    <th style="width:150">Start date</th>
                    <th style="width:150">End date</th>
                    <th style="width:100">Priority</th>
                </tr>
                @foreach($assigned_task as $key=>$row)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $task_detail[$key]->title }}</td>
                    <td>{{ $task_detail[$key]->description }}</td>
                    <td>{{ $row['start_date'] }}</td>
                    <td>{{ $row['end_date'] }}</td>
                    <td>
                        @if($task_detail[$key]->priority == 1)
                            High
                        @elseif($task_detail[$key]->priority == 2)
                            Medium
                        @else
                            Low
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    @endif
</body>
</html>