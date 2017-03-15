@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('errors.errors')

        <!-- New Task Form -->
        <!-- 
        <form action="/task" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            Task Name 
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>
            
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>
            </div>

            <div class="form-group">

            </div>
        
        </form>
        -->

            <div class="row">
                <label for="task" class="col-sm-3 control-label pull-left">Contact List</label>

                <div class="col-sm-2 pull-right">
                    <button id="addContactBtn" class="btn btn-primary pull-right">
                        <i class="fa fa-plus"></i> Add Contact
                    </button>
                </div>

            </div>


    </div>

    <!-- TODO: Current Tasks -->

     <!-- Current Tasks -->
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <!--
            <div class="panel-heading">
               <h3><center> Current Tasks </center></h3>
            </div>
            -->
            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead bgcolor="#e97373">
                        <th>Name Job<br> Title</th>
                        <th>Age</th>
                        <th>Nickname</th>
                        <th>Group</th>
                        <th>Manager</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)

                                    <!-- TODO: Delete Button -->
                                    <tr>
                                        <!-- Task ID -->
                                        <td class="table-text">
                                            <div>{{ $task->id }}</div>
                                        </td>
                                        <!-- Task Name -->
                                        <td class="table-text">
                                            <div>{{ $task->name }}</div>
                                        </td>

                                        <!-- Task Created At Name -->
                                        <td class="table-text">
                                            <div>{{ $task->created_at }}</div>
                                        </td>

                                        <!-- Task Created At Name -->
                                        <td class="table-text">
                                            <div>Front Office</div>
                                        </td>

                                        <!-- Task Created At Name -->
                                        <td class="table-text">
                                            <div>Manager</div>
                                        </td>

                                        <!-- Delete Button -->
                                        <td>
                                            <div class="pull-right">
                                                <button class="btn btn-link editBtn">Edit</button>
                                                <button class="btn btn-link deleteBtn">Delete</button>
                                            </div>

                                            <!--

                                            -->
                                        </td>
                                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <script>
    /*
    var btn = document.getElementById("deleteBtn");
    var coordinates = btn.getBoundingClientRect();
    console.log(coordinates);
    // fname will be executed when the <body> tag loads
    function addOnLoad(fname){ 
        // Define this function
        fname();
    }

    // init1 and init2 should be alerted when the body tag loads
    addOnLoad(function (){ alert('init1!'); });
    addOnLoad(function (){ alert('init2!'); });
    */
</script>


@endsection
