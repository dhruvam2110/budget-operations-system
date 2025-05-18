
 
$(document).ready(function () {
    
    //Email validation
    jQuery.validator.addMethod("email", function(value, element) {

        if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{1,4})+$/.test(value)) {
            return true;
        } else {
            return false;
        }
    }, "Please enter valid email");

    //mobile number only method
    $('.mob_num').on('input', function() {

        this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');
    });

    //number only method
    $('.number').on('input', function() {

        this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
    });

    //AJAX Setup
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token-login"]').attr('content')
        }
    });

    //registration form validation
    $("#registerform").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            name: {
                required: true
            },
            password: {
                required: true,
                minlength: 8
            },
            con_password: {
                required: true,
                minlength: 8,
                equalTo: "#password" //for checking both passwords are same or not
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: "/admin-panel/register-employee-email-exist",
                    type: "POST",
                    data: {
                        email: function(){
                            return $("#email").val();
                        }
                    }
                }
            }
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            name: {
                required: "Please enter full name"
            },
            password: {
                required: " Please enter password",
                minlength: " Your password must consist at least 8 characters"
            },
            con_password: {
                required: " Please enter confirm password",
                minlength: " Your password must consist at least 8 characters",
                equalTo: "Your password and confirm password do not match"
            },
            email: {
                required: "Please enter email",
                remote: "Email already exists"
            }
        }
    });

    //login form validation
    $("#loginform").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            password: {
                required: true,
                minlength: 8
            },
            email: {
                required: true,
                email: true
            },
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            password: {
                required: " Please enter password",
                minlength: " Your password must consist at least 8 characters"
            },
            email: {
                required: "Please enter email"
            }
        }
    });

    //forgot password form validation
    $("#fpform").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            email: {
                required: true,
                email: true
            },
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            email: {
                required: "Please enter email"
            }
        }
    });

    //change password form validation
    $("#changepassform").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            oldpassword: {
                required: true
            },
            newpassword: {
                required: true,
                minlength: 8
            },
            connewpassword: {
                required: true,
                minlength: 8,
                equalTo: "#newpassword" //for checking both passwords are same or not
            },
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            oldpassword: {
                required: " Please enter current password"
            },
            newpassword: {
                required: " Please enter new password",
                minlength: " Your password must be at least 8 characters long"
            },
            connewpassword: {
                required: " Please enter confirm new password",
                minlength: " Your password must be at least 8 characters long",
                equalTo: "Your new password and confirm new password does not match"
            },
        }
    });

    //edit profile form validation
    $("#editprofileform").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            name: {
                required: true
            },
            mob_num: {
                required: true,
                minlength: 10,
                maxlength: 10
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: "/admin-panel/email-edit-profile-exist",
                    type: "POST",
                    data: {
                        id: function(){
                            return $("#id").val();
                        },
                        email: function(){
                            return $("#email").val();
                        }
                    }
                }
            },
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            name: {
                required: "Please enter full name"
            },
            mob_num: {
                required: "Please enter mobile number",
                minlength: "Please enter valid 10 digit Mobile Number.",
                maxlength: "Please enter valid 10 digit Mobile Number."
            },
            email: {
                required: "Please enter email",
                remote: "Email already exists"
            }
        },
        onkeyup: function(element) {
            $(element).valid();
        }
    });

    //reset password form validation
    $("#resetform").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            newpassword: {
                required: true,
                minlength: 8
            },
            connewpassword: {
                required: true,
                minlength: 8,
                equalTo: "#newpassword" //for checking both passwords are same or not
            },
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            newpassword: {
                required: "Please enter password",
                minlength: "Your password must be consist of at least 8 characters"
            },
            connewpassword: {
                required: "Please enter confirm password",
                minlength: "Your password must be consist of at least 8 characters",
                equalTo: "Your password and confirm password does not match"
            },
        }
    });

    //add employee form validation
    $("#add_employee_form").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            name: {
                required: true
            },
            emp_code: {
                required: true,
                remote: {
                    url: "/admin-panel/add-employee-code-exist",
                    type: "POST",
                    data: {
                        name: function(){
                            return $("#emp_code").val();
                        }
                    }
                }
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: "/admin-panel/add-employee-email-exist",
                    type: "POST",
                    data: {
                        name: function(){
                            return $("#email").val();
                        }
                    }
                }
            },
            mob_num: {
                required: true,
                minlength: 10,
                maxlength: 10
            },
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            name: {
                required: "Please enter the employee name"
            },
            emp_code: {
                required: "Please enter the employee code",
                remote: "Employee code exists"
            },
            email: {
                required: "Please enter the employee email",
                remote: "Employee email exists"
            },
            mob_num: {
                required: "Please enter the employee mobile number",
                minlength: "Please enter valid 10 digit Mobile Number.",
                maxlength: "Please enter valid 10 digit Mobile Number."
            },
        },
        onkeyup: function(element) {
            $(element).valid();
        }
    });

    //edit employee form validation
    $("#edit_employee_form").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            name: {
                required: true
            },
            emp_code: {
                required: true,
                remote: {
                    url: "/admin-panel/edit-employee-code-exist",
                    type: "POST",
                    data: {
                        id: function(){
                            return $("#id").val();
                        },
                        emp_code: function(){
                            return $("#emp_code").val();
                        }
                    }
                }
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: "/admin-panel/edit-employee-email-exist",
                    type: "POST",
                    data: {
                        id: function(){
                            return $("#id").val();
                        },
                        email: function(){
                            return $("#email").val();
                        }
                    }
                }
            },
            mob_num: {
                required: true,
                minlength: 10,
                maxlength: 10
            },
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            name: {
                required: "Please enter the employee name"
            },
            emp_code: {
                required: "Please enter the employee code",
                remote: "Employee code Exists"
            },
            email: {
                required: "Please enter the employee email",
                remote: "Employee email exists"
            },
            mob_num: {
                required: "Please enter the employee mobile number",
                minlength: "Please enter valid 10 digit Mobile Number",
                maxlength: "Please enter valid 10 digit Mobile Number"
            },
        },
        onkeyup: function(element) {
            $(element).valid();
        }
    });

    //add department form validation
    $("#form_add_department").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            dep_name: {
                required: true,
                remote: {
                    url: "/admin-panel/add-department-name-exist",
                    type: "POST",
                    data: {
                        dep_name: function(){
                            return $("#dep_name").val();
                        }
                    }
                }
            },
            dep_code: {
                required: true,
                remote: {
                    url: "/admin-panel/add-department-code-exist",
                    type: "POST",
                    data: {
                        dep_code: function(){
                            return $("#dep_code").val();
                        }
                    }
                }
            },
            dep_hod_code: {
                required: true,
                remote: {
                    url: "/admin-panel/add-department-hod-name-exist",
                    type:"POST",
                    data: {
                        dep_hod_code: function(){

                            return $("#dep_hod_code").val();
                        }
                    }
                }
            }
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            dep_name: {
                required: "Please enter the department name",
                remote: "Department already exists"
            },
            dep_code: {
                required: "Please enter the department code",
                remote: "Department code already exists"
            },
            dep_hod_code: {
                required: "Please select the department HOD name",
                remote: "Department HOD exists"
            }           
        },
        onkeyup: function(element) {
            $(element).valid();
        },
        onclick: function(element) {
            $(element).valid();
        }
    });

    //edit department form validation
    $("#form_edit_department").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            dep_name: {
                required: true,
                remote: {
                    url: "/admin-panel/edit-department-name-exist",
                    type: "POST",
                    data: {
                        id: function(){
                            return $("#id").val();
                        },
                        dep_code: function(){
                            return $("#dep_name").val();
                        }
                    }
                }
            },
            dep_code: {
                required: true,
                remote: {
                    url: "/admin-panel/edit-department-code-exist",
                    type: "POST",
                    data: {
                        id: function(){
                            return $("#id").val();
                        },
                        dep_code: function(){
                            return $("#dep_code").val();
                        }
                    }
                }
            },
            dep_hod_code: {
                required: true,
                remote: {
                    url: "/admin-panel/edit-department-hod-name-exist",
                    type: "POST",
                    data: {
                        id: function(){
                            return $("#id").val();
                        },
                        dep_code: function(){
                            return $("#dep_hod_code").val();
                        }
                    }
                }
            }
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            dep_name: {
                required: "Please enter the department name",
                remote: "Department already exists"
            },
            dep_code: {
                required: "Please enter the department code",
                remote: "Department code already exists"
            },
            dep_hod_code: {
                required: "Please select the department HOD name",
                remote: "Department HOD exists"
            }           
        },
        onkeyup: function(element) {
            $(element).valid();
        },
        onclick: function(element) {
            $(element).valid();
        }
    });

    //add budget amount form validation
    $("#form_add_budgetamount").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            year: {
                required: true,
                remote: {
                    url: "/admin-panel/add-budget-amount-year-exist",
                    type: "POST",
                    data: {
                        year: function(){
                            return $("#year").val();
                        }
                    }
                }
            },
            budget_allocated: {
                required: true,
                number: true
            }
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            year: {
                required: "Please select financial year",
                remote: "Budget for the selected financial year already exists"
            },
            budget_allocated: {
                required: "Please enter the budget amount",
                number: "Please enter valid amount"
            }          
        },
        onkeyup: function(element) {
            $(element).valid();
        },
        onclick: function(element) {
            $(element).valid();
        }
    });

    //edit budget amount form validation
    $("#form_edit_budgetamount").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            year: {
                required: true,
                remote: {
                    url: "/admin-panel/edit-budget-amount-year-exist",
                    type: "POST",
                    data: {
                        id: function(){
                            return $("#id").val();
                        },
                        year: function(){
                            return $("#year").val();
                        }
                    }
                }
            },
            budget_allocated: {
                required: true,
                number: true,
                remote: {
                    url: "/admin-panel/edit-budget-amount-check",
                    type: "POST",
                    data: {
                        id: function(){
                            return $("#id").val();
                        },
                        budget_allocated: function(){
                            return $("#budget_allocated").val();
                        }
                    }
                }
            }
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            year: {
                required: "Please select financial year",
                remote: "Budget for the selected financial year already exists"
            },
            budget_allocated: {
                required: "Please enter the budget amount",
                number: "Please enter valid amount",
                remote: "Expense is greater than the budget amount. Please check and enter valid amount."
            }          
        },
        onkeyup: function(element) {
            $(element).valid();
        },
        onclick: function(element) {
            $(element).valid();
        }
    });

    //add sponsor form validation
    $("#add_sponsor_form").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            sponsor_name: {
                required: true            
            },
            drug_name: {
                required: true
            },
            study_year: {
                required: true
            },
            study_revenue: {
                required: true,
                number: true
            }
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            sponsor_name: {
                required: "Please enter sponsor name"
            },
            drug_name: {
                required: "Please enter drug name"
            },
            study_year: {
                required: "Please select the study year"
            },
            study_revenue: {
                required: "Please enter the study revenue",
                number: "Please enter valid amount"
            }
        }
    });

    //edit sponsor form validation
    $("#edit_sponsor_form").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            sponsor_name: {
                required: true            
            },
            drug_name: {
                required: true
            },
            study_year: {
                required: true
            },
            study_revenue: {
                required: true,
                number: true
            }
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            sponsor_name: {
                required: "Please enter sponsor name"
            },
            drug_name: {
                required: "Please enter drug name"
            },
            study_year: {
                required: "Please select the study year"
            },
            study_revenue: {
                required: "Please enter the study revenue",
                number: "Please enter valid amount"
            }
        }
    });

    //add allocate budget form validation
    $('#form_allocate_budget').validate({

        rules: {
            dep_id: {
                required: true,
                remote: {
                    url: "/admin-panel/add-allocated-amount-department-exist",
                    type: "POST",
                    data: {
                        dep_id: function(){
                            return $("#dep_id").val();
                        },
                        budget_year: function(){
                            return $("#budget_year").val();
                        },
                        id: function(){
                            return $("#id").val();
                        }
                    }
                }
            },
            budget_allocated: {
                required: true,
                remote: {
                    url: "/admin-panel/remaining-allocated-amount-remote",
                    type: "POST",
                    data: {
                        budget_remaining: function(){
                            return $("#budget_remaining").val();
                        },
                        budget_allocated: function(){
                            return $('#budget_allocated').val();
                        },
                        id: function(){
                            return $("#id").val();
                        }
                    }
                }
            }
        },
        messages:{
            dep_id: {
                required: "Select department name",
                remote: "Budget has already been allocated to this department"
            },
            budget_allocated: {
                required: "Enter the allocation amount",
                remote: "Allocated amount exceeds the remaining funds or the Allocated amount is less than the total funds used. Please check and enter again."
            }
        },
        onkeyup: function(element) {
            $(element).valid();
        },
        onclick: function(element) {
            $(element).valid();
        }
    });

    //add expense form validation
    $('#add_expense_form').validate({

        rules: {

            expense_type: {
                required: true
            },
            item_name: {
                required: true
            },
            quantity:{
                required: true
            },
            price_per_quantity:{
                required: true
            },
            service_name:{
                required: true
            },
            start_date:{
                required: true
            },
            end_date:{
                required: true
            },
            month:{
                required:true,
                remote: {
                    url: "/admin-panel/salary-exist-department-expense",
                    type: "POST",
                    data: { 
                        dep_id: function(){
                            return $("#dep_id").val();
                        },
                        id: function(){
                            return $("#id").val();
                        },
                        month: function(){
                            return $("#month").val();
                        }
                    }
                }
            },
            expense:{
                remote: {
                    url: "/admin-panel/expense-exceed-remaining-amount-department-expense",
                    type: "POST",
                    data: { 
                        dep_id: function(){
                            return $("#dep_id").val();
                        },
                        id: function(){
                            return $("#id").val();
                        },
                        expense: function(){
                            return $("#expense").val();
                        },
                        expense_type: function(){
                            return $("#expense_type").val();
                        },
                        price_per_quantity: function(){
                            return $("#price_per_quantity").val();
                        },
                        quantity: function(){
                            return $("#quantity").val();
                        }
                    }
                }
            },
            opex_expense:{
                required: true,
                remote: {
                    url: "/admin-panel/expense-exceed-remaining-amount-department-expense",
                    type: "POST",
                    data: { 
                        dep_id: function(){
                            return $("#dep_id").val();
                        },
                        id: function(){
                            return $("#id").val();
                        },
                        opex_expense: function(){
                            return $("#opex_expense").val();
                        },
                        expense_type: function(){
                            return $("#expense_type").val();
                        }
                    }
                }
            },
            salary_expense:{
                required: true,
                remote: {
                    url: "/admin-panel/expense-exceed-remaining-amount-department-expense",
                    type: "POST",
                    data: { 
                        dep_id: function(){
                            return $("#dep_id").val();
                        },
                        id: function(){
                            return $("#id").val();
                        },
                        salary_expense: function(){
                            return $("#salary_expense").val();
                        },
                        expense_type: function(){
                            return $("#expense_type").val();
                        }
                    }
                }
            }
        },
        messages:{

            expense_type: {
                required: "Please select expenditure type"
            },
            item_name: {
                required: "Please enter the item name"
            },
            quantity: {
                required: "Please enter the quantity"
            },
            price_per_quantity: {
                required: "Please enter the price per quantity"
            },
            service_name:{
                required: "Please enter the service name"
            },
            start_date:{
                required: "Please select service start date"
            },
            end_date:{
                required: "Please select service end date"
            },
            month:{
                required: "Please select month",
                remote: "Salary expense for this month exists"
            },
            expense:{
                remote: "Expense exceeds the remaining budget"
            },
            opex_expense:{
                required: "Please enter the total expense",
                remote: "Expense exceeds the remaining budget"
            },
            salary_expense:{
                required: "Please enter the total expense",
                remote: "Expense exceeds the remaining budget"
            }
        },
        onkeyup: function(element) {
            $(element).valid();
        },
        onclick: function(element) {
            $(element).valid();
        }
    });

    //add expense form validation
    $('#expense_filter').validate({

        rules: {

            expense_type_filter: {
                required: true
            }
        },
        messages:{

            expense_type_filter: {
                required: "Please select expenditure type to apply the filter"
            }
        }
    });
});