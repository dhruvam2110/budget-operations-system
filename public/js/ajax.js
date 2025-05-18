
//basic CSRF token initialization for ajax working
$.ajaxSetup({
    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }
})

//add expense modal
$(document).on('click', '#expense_modal', function() {

    var year_id = $('#budget_year').val();
    $("#form_expense").trigger('reset');
    $("#title_modal").html('Add Expense');
    $("#submit_modal").html('Save');
    $("#expense_type").prop('disabled', false);
    $('#expense_type').val('');
    $("#id").val("");
    $('#variable_expense_type').show();
    $("#capex").hide();
    $("#opex").hide();
    $("#salary").hide();
    $('#total_expense').hide(); 

});

//add expense modal
$(document).on('change', '#expense_type', function() {

    var exp = $('#expense_type').val();

    if(exp == 'Capex'){

        $(".opex").val('');
        $(".salary").val('');
        $('#expense').val('');
        $("#capex").show();
        $('#total_expense').show();
        $('#expense').show().prop('readonly', true);
        $("#opex").hide();
        $("#salary").hide();

    } else if(exp == 'Opex') {

        let current_date = new Date();
        let date = current_date.getDate();
        let m = current_date.toDateString();
        let month = m.substr(4, 4);
        let year = current_date.getFullYear();
        $(".capex").val('');
        $(".salary").val('');
        $('#opex_expense').val('');
        $('#start_date').val(date + '-' + month + '-' + year);
        $('#end_date').val(date + '-' + month + '-' + year);
        $('#opex_expense').show();
        $("#capex").hide();
        $("#opex").show();
        $("#salary").hide();

    } else if(exp == 'Salary') {

        $(".opex").val('');
        $(".capex").val('');
        $('#salary_expense').val('');
        $('#salary_expense').show();
        $("#capex").hide();
        $("#opex").hide();
        $("#salary").show();

    } else {

        $("#form_expense").trigger('reset');
        $("#capex").hide();
        $("#opex").hide();
        $("#salary").hide();
        $('#total_expense').hide();
    }
});

//edit expense modal
$(document).on('click', '#edit_exp_modal', function() {

    var id = $(this).data('id');
    $("#form_expense").trigger('reset');
    $("#title_modal").html('Edit Expense');
    $("#submit_modal").html('Update');
    $("#id").val(id);
    $("#capex").hide();
    $("#opex").hide();
    $("#salary").hide();
    $('#total_expense').hide();

    $.get('/admin-panel/edit-department-expenditure/'+id, function(data){
       
        if(data.expense_details.expense_type == 'Capex') {

            $("#capex").show();
            $('#mandatory').hide();
            $("#expense_type").val(data.expense_details.expense_type).prop('disabled', true);
            $("#item_name").val(data.expense_details.item_name);
            $("#quantity").val(data.expense_details.quantity);
            $("#price_per_quantity").val(data.expense_details.price_per_quantity);
            $('#total_expense').show();
            $("#expense").val(data.expense_details.quantity * data.expense_details.price_per_quantity).prop('readonly', true);

        } else if(data.expense_details.expense_type == 'Opex') {

            $("#opex").show();
            $('#mandatory').show();
            $("#expense_type").val(data.expense_details.expense_type).prop('disabled', true);
            $("#service_name").val(data.expense_details.service_name);
            $("#start_date").val(data.expense_details.service_start_date);
            $("#end_date").val(data.expense_details.service_end_date);
            $('#opex_expense').show();
            $("#opex_expense").val(data.expense_details.expense);
            $("#remarks").val(data.expense_details.remarks);

        } else if(data.expense_details.expense_type == 'Salary') {

            $("#salary").show();
            $('#mandatory').show();
            $("#expense_type").val(data.expense_details.expense_type).prop('disabled', true);
            $("#month").val(data.expense_details.month);
            $('#salary_expense').show();
            $("#salary_expense").val(data.expense_details.expense);
        }

        $("#budget_remaining").val(data.remaining_amount);
    });
});

//expense modal
$(document).on('click', '#expense_modal', function() {

    var dep_id = $('#dep_id').val();
    $("#form_expense").trigger('reset');
    $("#title_modal").html('Add Expense');
    $("#submit_modal").html('Save');
    $("#id").val("");

    $.get('/admin-panel/remaining-budget-amount/'+ dep_id, function(data){
        
        $("#budget_remaining").val(data);
    });
});

//total price calculation
$(document).on('change', '#price_per_quantity', function() { 

    var price_per_quantity = $('#price_per_quantity').val();
    var quantity = $('#quantity').val();
    $("#expense").val(price_per_quantity * quantity);

});

$(document).on('change', '#quantity', function(){
    var price_per_quantity = $('#price_per_quantity').val();
    var quantity = $('#quantity').val();
    $("#expense").val(price_per_quantity * quantity);

});

//edit allocated budget modal
$(document).on('click', '#edit_modal', function() {

    var id = $(this).data('id');
    $.get('/admin-panel/edit-allocated-budget/'+id, function(data){
        $("#form_allocate_budget").trigger('reset');
        $("#title_modal").html('Edit Allocated Budget');
        $("#submit_modal").html('Update');
        $("#edit_modal_budget_allocation").show();
        $("#add_modal_budget_allocation").hide();
        $("#edit_dep_id").val(data.department_details.dep.dep_name).prop('disabled', true);
        $("#budget_allocated").val(data.department_details.budget_allocated);
        $("#id").val(id);
        $("#year").val(data.department_details.year.year);
        $("#old_budget").val(data.department_details.budget_allocated);
        $("#budget_remaining").val(data.remaining_amount);
    });
});

//add allocated budget modal & budget remaining modal
$(document).on('click', '#open_modal', function(){
    var year_id = $('#budget_year').val();
    $("#form_allocate_budget").trigger('reset');
    $("#title_modal").html('Allocate Budget');
    $("#submit_modal").html('Save');
    $("#id").val("");
    $("#edit_modal_budget_allocation").hide();
    $("#add_modal_budget_allocation").show();
    $.get('/admin-panel/remaining-allocated-amount/'+ year_id, function(data){
        $("#budget_remaining").val(data);
    });
});

//employee status switch
$('.employee_switch').change(function() { 
    var id = $(this).data('id');
    $.ajax({
        type:'POST',
        dataType: "json",
        url: "/admin-panel/change-status-employee/"+id,
        data: id,
        success: function(data){
            toastr.success(data.message, data.title);
        }
    });
});

//department status switch
$('.department_switch').change(function() { 
    var id = $(this).data('id');
    $.ajax({
        type:'POST',
        dataType: "json",
        url: "/admin-panel/change-status-department/"+id,
        data: id,
        success: function(data){
            toastr.success(data.message, data.title);
        }
    });
});


//budget amount status switch
$('.budget_switch').change(function() { 
    var id = $(this).data('id');
    $.ajax({
        type:'POST',
        dataType: "json",
        url: "/admin-panel/change-status-budget-amount/"+id,
        data: id,
        success: function(data){
            toastr.success(data.message, data.title);
        }
    });
});

//budget amount department status switch
$('.dep_budget_switch').change(function() { 
    var id = $(this).data('id');
    $.ajax({
        type:'POST',
        dataType: "json",
        url: "/admin-panel/change-status-allocated-budget/"+id,
        data: id,
        success: function(data){
            toastr.success(data.message, data.title);
        }
    });
});

//expense status switch
$('.expense_switch').change(function() { 
    var id = $(this).data('id');
    $.ajax({
        type:'POST',
        dataType: "json",
        url: "/admin-panel/change-status-department-expense/"+id,
        data: id,
        success: function(data){
            toastr.success(data.message, data.title);
        }
    });
});

//sponsor status switch
$('.sponsor_switch').change(function() { 
    var id = $(this).data('id');
    $.ajax({
        type:'POST',
        dataType: "json",
        url: "/admin-panel/change-status-sponsor/"+id,
        data: id,
        success: function(data){
            toastr.success(data.message, data.title);
        }
    });
});

