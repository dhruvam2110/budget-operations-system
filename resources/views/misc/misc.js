$(document).ready(function(){

    $(document).on('click', '.add_department', function(){
        //alert("hi!");
        var data = {
            'dep_name': $('.dep_name').val(),
            'dep_code': $('.dep_code').val(),
            'dep_hod': $('.dep_hod').val(),
        }
        //console.log(data);
        $.ajax({
            type:'POST',
            dataType: "json",
            url: "/admin-panel/department_stored",
            data: data,
            success: function(data){
                toastr.success(data.message, data.title);
            }
        });
    });
});



            var row = '<tr id="row_department_'+ data.id + '">';
            // row += '<td>' + {{$loop->iteration}} + '</td>';
            row += '<td>' + data.dep_name + '</td>';
            row += '<td>' + data.dep_code + '</td>';
            row += '<td>' + data.dep_hod + '</td>';
            // row += '<td>' + '<label class="switch switch-success">' + '<input data-id="{{ $value->id }}" data-toggle="toggle" type="checkbox" class="switch-input department_switch" {{$value->status?'checked':''}}>' + '<span class="switch-track"></span>' + '<span class="switch-thumb"></span>'+ '</label>' + '</td>';
            // row += '<td>' + '<button data-id="' + data.id + '" class="btn btn-info edit_department" id="edit_department" data-toggle="modal" data-target="#add_department_modal">Edit</button>' + '<button data-id="' + res.id +'" class="btn btn-danger delete_department" id="delete_department" onclick="return confirm('"Are you sure you want to delete the User?"')">Delete</button>' + '</td>';
            row += '</tr>';
            if($("#id").val()){
                $("#row_department_" + data.id).replaceWith(row);
            }else{
                $("#department_list").prepend(row);
            }
            $("#form_add_department").trigger('reset');
            $("#add_department_modal").modal('hide');




            @if($employees != '')
                            <div id="demo-datatables-fixedheader-1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <table id="demo-datatables-fixedheader-1" class="table table-hover table-striped table-nowrap dataTable no-footer dtr-inline dataTable" cellspacing="0" width="100%" aria-describedby="demo-datatables-fixedheader-1_info" role="grid" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Sr. No.</th>
                                            <th class="text-center">Profile Picture</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Employee Code</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Mobile Number</th>
                                            <th class="text-center">Gender</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($employees as $value)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td class="text-center">
                                                <img class="rounded" src="{{asset('/ProfilePicture/'.$value->image)}}" width="36" height="36" style="border-radius: 50%">
                                            </td>
                                            <td class="text-center">{{$value->name}}</td>
                                            <td class="text-center">{{$value->emp_code}}</td>
                                            <td class="text-center">{{$value->email}}</td>
                                            <td class="text-center">{{$value->mob_num}}</td>
                                            @if($value->gender == '')
                                                <td class="text-center">-</td>
                                            @else
                                                <td class="text-center">{{$value->gender}}</td>
                                            @endif
                                            <td class="text-center">
                                                <label class="switch switch-success">
                                                <input data-id="{{ $value->id }}" data-toggle="toggle" type="checkbox" class="switch-input employee_switch" {{$value->is_active?'checked':''}}>
                                                <span class="switch-track"></span>
                                                <span class="switch-thumb"></span>
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.editEmployee') }}/{{ $value->id }}"><button class="btn btn-info">Edit</button></a>
                                                <a href="{{ route('admin.deleteEmployee') }}/{{ $value->id }}"><button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete the Employee?')">Delete</button></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div id="demo-datatables-fixedheader-1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <table id="demo-datatables-fixedheader-1" class="table table-hover table-striped table-nowrap dataTable no-footer dtr-inline dataTable" cellspacing="0" width="100%" aria-describedby="demo-datatables-fixedheader-1_info" role="grid" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Sr. No.</th>
                                            <th class="text-center">Profile Picture</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Employee Code</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Mobile Number</th>
                                            <th class="text-center">Gender</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        @endif