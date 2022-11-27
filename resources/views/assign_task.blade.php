<!DOCTYPE html>
<html>
<head>
    <title>Assign task - Task management system</title>
    <script>
        @if(session()->has('msg'))
            alert("{{ session()->get('msg') }}");
        @endif

        function checkboxes()
        {
            count_selected_task = 0;
            count_selected_user = 0;
            var inputElems = document.getElementsByTagName("input");

            for(var i=0; i<inputElems.length; i++){
                if(inputElems[i].type == "checkbox" && inputElems[i].name == "tasks[]" && inputElems[i].checked == true){
                    count_selected_task++;
                }
                else if(inputElems[i].type == "checkbox" && inputElems[i].name == "users[]" && inputElems[i].checked == true){
                    count_selected_user++;
                }
            }
            
            if(count_selected_task==0){
                alert("Select atleast one task !!!");
                return false;
            }
            else if(count_selected_user==0){
                alert("Select atleast one user !!!");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    @include('header')
    <div class="container3">
        <h1 style="text-align:center">Assign Task</h1>
        
        <form action="{{ url('/') }}/post_assign_task" method="post" onsubmit="return checkboxes()">
        @csrf
            <div style="display:flex">

                <table border=1 cellspacing=0 style="flex:50%; margin-right:40px">
                    <caption>Select task</caption>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Title </th>
                            <th>Description </th>
                            <th>Priority </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($taskdata as $task)
                        <tr>
                            <td><input type="checkbox" value="{{ $task->id }}" name="tasks[]"></td>
                            <td> {{ $task->title }} </td>
                            <td> {{ $task->description }} </td>
                            <td>
                                @if ($task->priority == 1)
                                    High
                                @elseif ($task->priority == 2)
                                    Medium
                                @else
                                    Low
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <table border=1 cellspacing=0 style="flex:30%;">
                    <caption>Select user</caption>
                    <thead>
                        <tr>
                            <th></th>
                            <th> Name </th>
                            <th> Email </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userdata as $user)
                        <tr>
                            <td><input type="checkbox" value="{{ $user->id }}" name="users[]"></td>
                            <td> {{ $user->name }} </td>
                            <td> {{ $user->email }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                
            </div>

            <div style="margin-top:20px">
                <table align="center">
                    <caption>Select duration</caption>
                    <tr>
                        <th>Starting date : </th>
                        <td><input type="date" name="start_date" required></td>
                    </tr>
                    <tr>
                        <th>Ending date : </th>
                        <td><input type="date" name="end_date" required></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td ><br><input type="submit" value="Assign task"></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
</body>

</html>