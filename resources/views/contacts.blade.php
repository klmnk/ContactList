@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->
<div class="container-fluid">
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('errors.errors')

        <!-- New Task Form -->
            <div class="row">
                <h4 for="task" class="col-sm-3 control-label pull-left">Contact List</h4>

                <div class="col-sm-2 pull-right">
                    <button id="addContactBtn" class="btn btn-primary pull-right">
                        <i class="fa fa-plus"></i> Add Contact
                    </button>
                </div>

            </div>
    </div>

    <!-- TODO: Current Tasks -->

     <!-- Current Tasks -->
    @if (count($contacts) > 0)
        <div class="panel panel-default">

            <div class="panel-body">
                <table class="table table-striped contacts-table">

                    <!-- Table Headings -->
                    <thead bgcolor="#e97373">
                        <th>Name <br>Job Title</th>
                        <th>Age</th>
                        <th>Nickname</th>
                        <th>Group</th>
                        <th>Manager</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($contacts as $contact)

                                    <!-- TODO: Delete Button -->
                                    <tr id="{{$contact->id}}">
                                        <!-- Task ID -->
                                        <td class="table-text">
                                            <div class="contact-name">{{ $contact->name }}</div>
                                            <div class="contact-jobtitle">{{ $contact->jobtitle }}</div>
                                        </td>
                                        <!-- Task Name -->
                                        <td class="table-text">
                                            <div class="contact-age">{{ $contact->age }}</div>
                                        </td>

                                        <!-- Task Created At Name -->
                                        <td class="table-text">
                                            <div class="contact-nickname">{{ $contact->nickname }}</div>
                                        </td>

                                        <!-- Task Created At Name -->
                                        <td class="table-text">
                                            <div class="contact-group">{{ $contact->group }}</div>
                                        </td>

                                        <!-- Task Created At Name -->
                                        <td class="table-text">
                                            <div class="contact-manager">{{ $contact->manager }}</div>
                                        </td>

                                        <!-- Delete Button -->
                                        <td>
                                            <div class="pull-right" >
                                                <button class="btn btn-link editBtn" >Edit</button>
                                                <button class="btn btn-link deleteBtn" >Delete</button>
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
</div>
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
