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
                        <div class="col-2 order-md-2 order-first">
                            <div class=" d-flex justify-content-end">
                                <button  class="btn btn-md btn-block addTask text-white btn-success"
                                style=" padding: 12px; font-size: 14px;font-weight:800">+ Add Task</button>
                            </div>
                        </div>
                        </p>
    <form id="taskForm">
        <div class="task-entry form-row">
            <div class="col-md-4">
                <label for="name">Title:</label>
                <input type="text" class="form-control" name="title" required placeholder="Enter Title">
            </div>
            <div class="col-md-4">
                <label for="task">Description:</label>
                <input type="text" class="form-control" name="description" required placeholder="Enter description">
            </div>
            <div class="col-md-4">
                <label for="status">Status:</label>
                <select name="status" id="" class="form-control">
                    <option value="Pending">Pending</option>
                    <option value="InProgress">In Progress</option>
                    <option value="Complete">Complted</option>
                </select>
            </div>
        </div>
        <!-- <button type="submit" class="btn  w-100">Submit</button> -->
        <button type="submit" class="btn btn-md text-white my-4 w-100" style=" background-color: #2099d8;font-size:14px;"> Submit </button>
    </form>
      
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function()
    {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $(".addTask").click(function(){
            var newTaskEntry = $(".task-entry:first").clone();
            newTaskEntry.find('input').val('');
            newTaskEntry.insertBefore("#taskForm button[type='submit']");
        });
        $("#taskForm").submit(function(e){
            e.preventDefault();
            var formData1 = $(this).serializeArray();
            const outputArray = [];
                for (let i = 0; i < formData1.length; i += 3) {
                    const obj = {};
                    for (let j = 0; j < 3; j++) {
                        const { name, value } = formData1[i + j];
                        obj[name] = value;
                    }
                    outputArray.push(obj);
                }
            let formData = new FormData();
            formData.append('data', JSON.stringify(outputArray));
            console.log(formData.entries());
            $.ajax({
                method: 'POST',
                url: '/AddTaskAction',
                contentType: false,
                processData: false,
                data: formData,
                success: function (response) {
                    if(response.status == "200") {
                        alert('Task added successfully')
                    }else{
                        alert('Task failed to be added successfully')
                    }
                },
                error(req, status, error) {
                    console.log("ERROR:" + error.toString() + " " + status + " " + req.responseText);
                }
            });
            $(this).find('input').val('');
        });
    });
</script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable({
                dom: '<"dt-top-container"<l><"dt-center-in-div"B><f>r>t<"dt-filter-spacer"f><ip>',
                buttons: [
                    'pdf', 'excel', 'csv', 'print', 'copy',
                ]
            });
        });
    </script>
   
@endsection('content')
