@extends('main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Tasks</h3>
            <nav aria-label="breadcrumb">
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4 fw-bold">Your Tasks</h2>
                        <div class="table-responsive">
                            <table class="table  table-striped text-center" id="example">
                                <thead class="secondary text-white"
                                    style="background-image: -webkit-linear-gradient(top, #1478ad 0%, #38BAFF 100%) !important;">
                                    <tr>
                                        <th style="height: 28px;text-align: center">No</th>
                                        <th style="height: 28px;text-align: center">Title</th>
                                        <th style="height: 28px;text-align: center">Description</th>
                                        <th style="height: 28px;text-align: center">Status</th>
                                        <th style="height: 28px;text-align: center">Link</th>
                                    </tr>
                                </thead>
                                <?php
                                $task=DB::table('task_tbl')->where('user_id',Auth::id())->orderBy('id', 'DESC')->get(); 
                                $no=1;
                                ?>
                                <tbody>
                                    @foreach($task as $row)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$row->title}}</td>
                                        <td>{{$row->description}}</td>
                                        <td>
                                            @if($row->status == 'Pending')
                                            <select name="status" style="color:red;" id="StatusTask{{$row->id}}"
                                                class="form-control" onchange="updateStatus({{ $row->id }})">
                                                <option value="Pending" style="color:red;" selected>Pending</option>
                                                <option value="InProgress">In Progress</option>
                                                <option value="Complete">Completed</option>
                                                @elseif($row->status == 'InProgress')
                                                <select name="status" style="color:orange;" id="StatusTask{{$row->id}}"
                                                    class="form-control" onchange="updateStatus({{ $row->id }})">
                                                    <option value="Pending">Pending</option>
                                                    <option value="InProgress" selected>In Progress</option>
                                                    <option value="Complete">Completed</option>
                                                    @elseif($row->status == 'Complete')
                                                    <select name="status" style="color:green;"
                                                        id="StatusTask{{$row->id}}" class="form-control"
                                                        onchange="updateStatus({{ $row->id }})">
                                                        <option value="Pending">Pending</option>
                                                        <option value="InProgress">In Progress</option>
                                                        <option value="Complete" selected>Completed</option>
                                                    @endif
                                                    </select>
                                        </td>
                                        <td class="" style="width:20%">
                                            <div class="d-flex justify-content-center">
                                                <button onclick="EditTask({{ $row->id }})"
                                                    class="btn btn-inverse-success btn-rounded btn-icon "
                                                    style="padding-top: 5px;margin-right: 5px">Edit</button>
                                                <button onclick="DeleteTask({{ $row->id }})"
                                                    class="btn btn-inverse-danger btn-rounded btn-icon"
                                                    style="padding-top: 5px;margin-right: 10px">delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php  $no++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal content for editing goes here -->
                <h2 class="p-4 text-center">Edit Task</h2>
                <div class="card my-2 m-3">
                    <div class="card-body">
                        <form id="editForm">
                            <div class="edit-entry form-row">
                                <input type="hidden" hidden id="taskid" value="">
                                <div class="col-md-12">
                                    <label for="title">Title:</label>
                                    <input type="text" class="form-control" id="title" name="title" value="" required
                                        placeholder="Enter Title">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="description">Description:</label>
                                    <input type="text" class="form-control" id="description" value="" name="description"
                                        required placeholder="Enter description">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="status">Status:</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="Pending">Pending</option>
                                        <option value="InProgress">In Progress</option>
                                        <option value="Complete">Complted</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <!-- <button type="submit" class="btn  w-100">Submit</button> -->
                    <button type="submit" class="btn btn-md text-white my-4  w-100"
                        style=" background-color: #2099d8;font-size:14px;"> Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function updateStatus(taskId) {
    var newStatus = $('#StatusTask' + taskId).val();
    $.ajax({
        url: '/UpdateTaskStatus',
        type: 'POST',
        data: {
            taskId: taskId,
            newStatus: newStatus,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.status == true) {
                alert('Task Status Update successfully')
            } else {
                alert('OOPS! Task Status not Updated.')
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}

function DeleteTask(taskId) {
    $.ajax({
        url: '/DeleteTask',
        type: 'GET',
        data: {
            taskId: taskId,
        },
        success: function(response) {
            if (response.status == true) {
                alert('Task Delete successfully')
                location.reload();
            } else {
                alert('OOPS! Task not Deleted.')
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}

function EditTask(taskId) {
    $.ajax({
        url: '/GetTask/' + taskId, // URL to fetch task data for given ID
        type: 'GET',
        success: function(response) {
            console.log(response.getTask)
            $('#title').val(response.getTask.title);
            $('#description').val(response.getTask.description);
            $('#status').val(response.getTask.status);
            $('#taskid').val(response.getTask.id);
            $('#editModal').modal('show');
        }
    });
}
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#editForm").submit(function(e) {
        e.preventDefault();
        var formData1 = $(this).serializeArray();
        const outputArray = [];
        for (let i = 0; i < formData1.length; i += 3) {
            const obj = {};
            for (let j = 0; j < 3; j++) {
                const {
                    name,
                    value
                } = formData1[i + j];
                obj[name] = value;
            }
            outputArray.push(obj);
        }
        let formData = new FormData();
        var taskid = $('#taskid').val();
        console.log(taskid);
        console.log(JSON.stringify(outputArray))
        formData.append('data', JSON.stringify(outputArray));
        formData.append('taskid', taskid);
        $.ajax({
            type: 'POST',
            url: '/UpdateTask',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                // Close modal
                console.log(response.getalldata);
                
                if (response.status == true) {
                    $('#editModal').modal('hide');
                    alert('Task Update successfully')
                } else {
                    alert('OOPS! Task not Updated.')
                }
            },
            error(req, status, error) {
                console.log("ERROR:" + error.toString() + " " + status + " " + req
                .responseText);
            }
        });
    })
});
// $(document).ready(function()
// {
//     $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
//     });
//     $('#statusItem').change(function(e){
//         e.preventDefault();
//     var selectedOption = $(this).val();
//     console.log("Selected option: " + selectedOption);
//     let formData = new FormData();
//     formData.append('status', selectedOption);
//     $.ajax({
//             method: 'POST',
//             url: '/UpdateTaskStatus',
//             contentType: false,
//             processData: false,
//             data: formData,
//             success: function (response) {
//                 if(response.status == "200") {
//                     alert('Task added successfully')
//                 }else{
//                     alert('Task failed to be added successfully')
//                 }
//             },
//             error(req, status, error) {
//                 console.log("ERROR:" + error.toString() + " " + status + " " + req.responseText);
//             }
//         });
//     // You can perform any actions based on the selected option here
// });
// $(".addTask").click(function(){
//     var newTaskEntry = $(".task-entry:first").clone();
//     newTaskEntry.find('input').val('');
//     newTaskEntry.insertBefore("#taskForm button[type='submit']");
// });
// $("#taskForm").submit(function(e){
//     e.preventDefault();
//     var formData1 = $(this).serializeArray();
//     const outputArray = [];
//         for (let i = 0; i < formData1.length; i += 3) {
//             const obj = {};
//             for (let j = 0; j < 3; j++) {
//                 const { name, value } = formData1[i + j];
//                 obj[name] = value;
//             }
//             outputArray.push(obj);
//         }
//     let formData = new FormData();
//     formData.append('data', JSON.stringify(outputArray));
//     console.log(formData.entries());
//     $.ajax({
//         method: 'POST',
//         url: '/AddTaskAction',
//         contentType: false,
//         processData: false,
//         data: formData,
//         success: function (response) {
//             if(response.status == "200") {
//                 alert('Task added successfully')
//             }else{
//                 alert('Task failed to be added successfully')
//             }
//         },
//         error(req, status, error) {
//             console.log("ERROR:" + error.toString() + " " + status + " " + req.responseText);
//         }
//     });
//     $(this).find('input').val('');
// });
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
        dom: '<"dt-top-container"<l><"dt-center-in-div"B><f>r>t<"dt-filter-spacer"f><ip>',
        buttons: [
            'pdf', 'excel', 'csv', 'print', 'copy',
        ]
    });
});
</script>

@endsection('content')