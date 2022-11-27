<link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
<div class="nav">
    <nav>
        <a href="{{url('/')}}/home">Home</a> |
        @if($is_admin==1)
        <a href="{{url('/')}}/add_user">Add user</a> |
        <a href="{{url('/')}}/add_task">Add task</a> |
        <a href="{{url('/')}}/assign_task">Assign task</a> |
        @endif
        <a href="{{url('/')}}/changepass">Change password</a>
        <button id="logout_btn" onclick="logout()">Logout</button>
    </nav>
</div>

<script>
        function logout(){
            if(confirm('Are you sure want to logout ?')){
                window.location.href="{{url('/')}}/logout";
            }
        }
</script>