<?php

	//Dashboard Route
		Route::get('dashboard', 'AdminController@home')->name('admin.dashboard');

	// Authentication admin Login Routes
		//login
			Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
			Route::post('post-login', 'Auth\LoginController@login')->name('admin.postlogin');
		//register
			Route::get('signup', 'Auth\LoginController@signup')->name('admin.signup');
			Route::post('register_admin', 'Auth\RegisterController@create')->name('admin.register');
		//logout
			Route::get('logout/{id?}', 'Auth\LoginController@logout')->name('admin.logout');
		//email remote
			Route::post('register-employee-email-exist', 'Auth\RegisterController@employeeEmailExist');

	//forget and reset password
	    Route::get('forgotpassword', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.auth.password.resetpass');
	    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.passwordemail');
	    Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm')->name('admin.auth.password.reset');
	    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('admin.resetpassword');


	//profile functionalities
		//edit profile
			Route::get('edit-profile', 'AdminController@editProfile')->name('admin.editProfile');
			Route::post('update-profile', 'AdminController@updateProfile')->name('admin.updateProfile');
			//email remote
			Route::post('email-edit-profile-exist', 'AdminController@editProfileEmailExist');
		//change password
			Route::get('change-password', 'AdminController@changePassword')->name('admin.changePassword');
			Route::post('update-password', 'AdminController@updatePassword')->name('admin.updatePassword');

	//employee functionalities
		//add employee
			Route::get('add-employee', 'EmployeeController@addEmployee')->name('admin.addEmployee');
		    Route::post('save-employee', 'EmployeeController@saveEmployee')->name('admin.saveEmployee');
		//employee list
		    Route::get('list-employee', 'EmployeeController@listEmployee')->name('admin.listEmployee');
		    //employee list edit
			    Route::get('edit-employee/{id?}', 'EmployeeController@editEmployee')->name('admin.editEmployee');
			    Route::post('update-employee', 'EmployeeController@updateEmployee')->name('admin.updateEmployee');
			//employee list delete
			    Route::get('delete-employee/{id?}', 'EmployeeController@deleteEmployee')->name('admin.deleteEmployee');
			//employee list status change ajax
			    Route::post('change-status-employee/{id?}', 'EmployeeController@changeStatusEmployee')->name('admin.statusEmployee');
			//employee list download
			    Route::get('download-employee', 'EmployeeController@downloadEmployee')->name('admin.downloadEmployee');
			//employee remote validation
				//add employee remote validation
					Route::post('add-employee-code-exist', 'EmployeeController@addEmployeeCodeExist');
					Route::post('add-employee-email-exist', 'EmployeeController@addEmployeeEmailExist');
				//edit employee remote validation
					Route::post('edit-employee-code-exist', 'EmployeeController@editEmployeeCodeExist');			
					Route::post('edit-employee-email-exist', 'EmployeeController@editEmployeeEmailExist');

	//department functionalities
		//all department
			Route::get('list-department', 'DepartmentController@listDepartment')->name('admin.listDepartment');
		//add department
			Route::get('add-department', 'DepartmentController@addDepartment')->name('admin.addDepartment');
			Route::post('save-department', 'DepartmentController@saveDepartment')->name('admin.saveDepartment');
		//department status
			Route::post('change-status-department/{id?}', 'DepartmentController@changeStatusDepartment')->name('admin.changeStatusDepartment');
		//department list download
			Route::get('download-department', 'DepartmentController@downloadDepartment')->name('admin.downloadDepartment');
		//department list edit
			Route::get('edit-department/{id?}', 'DepartmentController@editDepartment')->name('admin.editDepartment');
			Route::post('update-department', 'DepartmentController@updateDepartment')->name('admin.updateDepartment');
		//department list delete
			Route::get('delete-department/{id?}', 'DepartmentController@deleteDepartment')->name('admin.deleteDepartment');
		//department remote validation
			//add department remote validation
				Route::post('add-department-name-exist', 'DepartmentController@addDepartmentNameExist');
				Route::post('add-department-code-exist', 'DepartmentController@addDepartmentCodeExist');
				Route::post('add-department-hod-name-exist', 'DepartmentController@addDepartmentHodNameExist');
			//edit department remote validation
				Route::post('edit-department-name-exist', 'DepartmentController@editDepartmentNameExist');
				Route::post('edit-department-code-exist', 'DepartmentController@editDepartmentCodeExist');
				Route::post('edit-department-hod-name-exist', 'DepartmentController@editDepartmentHodNameExist');

	//budgetamount functionalities
		//all budget amount
			Route::get('list-budget-amount', 'BudgetAmountController@listBudgetAmount')->name('admin.listBudgetAmount');
		//add budget amount
			Route::get('add-budget-amount', 'BudgetAmountController@addBudgetAmount')->name('admin.addBudgetAmount');
			Route::post('save-budget-amount', 'BudgetAmountController@saveBudgetAmount')->name('admin.saveBudgetAmount');
		//budget amount status
			Route::post('change-status-budget-amount/{id?}', 'BudgetAmountController@changeStatusBudgetAmount')->name('admin.changeStatusBudgetAmount');
		//budget amount list download
			Route::get('download-budget-amount', 'BudgetAmountController@downloadBudgetAmount')->name('admin.downloadBudgetAmount');
		//budget amount list edit
			Route::get('edit-budget-amount/{id?}', 'BudgetAmountController@editBudgetAmount')->name('admin.editBudgetAmount');
			Route::post('update-budget-amount', 'BudgetAmountController@updateBudgetAmount')->name('admin.updateBudgetAmount');
		//budget amount list delete
			Route::get('delete-budget-amount/{id?}', 'BudgetAmountController@deleteBudgetAmount')->name('admin.deleteBudgetAmount');
		//budget amount remote validation
			//add budget amount remote validation
				Route::post('add-budget-amount-year-exist', 'BudgetAmountController@addBudgetAmountYearExist');
			//edit budget amount remote validation
				Route::post('edit-budget-amount-year-exist', 'BudgetAmountController@editBudgetAmountYearExist');
			//valid budget amount edit form
				Route::post('edit-budget-amount-check', 'BudgetAmountController@editBudgetAmountCheck');

	//allocated budget functionalities
		//all budget allocations
			Route::get('allocated-budget-list/{id?}', 'AllocatedBudgetController@listAllocatedBudget')->name('admin.listAllocatedBudget');
		//allocated budget list download
			Route::get('download-allocated-budget/{id?}', 'AllocatedBudgetController@downloadAllocatedBudget')->name('admin.downloadAllocatedBudget');
		//save allocated budget
			Route::post('save-allocated-budget', 'AllocatedBudgetController@saveAllocatedBudget')->name('admin.saveAllocatedBudget');
		//allocated amount remote validation
			//add allocated amount remote validation
				Route::post('add-allocated-amount-department-exist', 'AllocatedBudgetController@addAllocatedAmountDepartmentExist');
			//edit allocated amount remote validation
				Route::post('edit-allocated-amount-department-exist', 'AllocatedBudgetController@editAllocatedAmountDepartmentExist');
		//edit allocated amount
			Route::get('edit-allocated-budget/{id?}', 'AllocatedBudgetController@editAllocatedBudget')->name('admin.editAllocatedBudget');	
		//department budget amount status
			Route::post('change-status-allocated-budget/{id?}', 'AllocatedBudgetController@changeStatusDepartmentBudgetAmount')->name('admin.changeStatusDepartmentBudgetAmount');
		//delete allocated budget
			Route::get('delete-allocated-amount/{id?}', 'AllocatedBudgetController@deleteAllocatedBudget')->name('admin.deleteAllocatedBudget');
		//budget remaining
			Route::get('remaining-allocated-amount/{id?}', 'AllocatedBudgetController@remainingAllocatedBudget');
			//budget remaining remote
				Route::post('remaining-allocated-amount-remote', 'AllocatedBudgetController@remainingAllocatedBudgetRemote');
			//allocated amount check
				Route::post('allocated-amount-check', 'AllocatedBudgetController@allocatedAmountCheck');

	//department expenditure
		//all expenditure
			Route::match(['get', 'post'], 'department-expenditure-list/{id?}', 'DepartmentExpenditureController@listDepartmentExpenditure')->name('admin.listDepartmentExpenditure');
		//budget remaining
			Route::get('remaining-budget-amount/{id?}', 'DepartmentExpenditureController@remainingBudget');
		//save and update expenditure
			Route::post('save-department-expenditure', 'DepartmentExpenditureController@saveDepartmentExpense')->name('admin.saveDepartmentExpense');
		//edit expenditure
			Route::get('edit-department-expenditure/{id?}', 'DepartmentExpenditureController@editDepartmentExpense')->name('admin.editDepartmentExpense');
		//expense status
			Route::post('change-status-department-expense/{id?}', 'DepartmentExpenditureController@changeStatusExpense')->name('admin.changeStatusExpense');
		//expense delete
			Route::get('delete-department-expense/{id?}', 'DepartmentExpenditureController@deleteExpense')->name('admin.deleteExpense');
		//excel
			Route::get('download-department-expenditure/{id?}', 'DepartmentExpenditureController@downloadDepartmentExpenditure')->name('admin.downloadDepartmentExpenditure');
		//remote salary expense
			Route::post('salary-exist-department-expense', 'DepartmentExpenditureController@salaryExistDepartmentExpenditure');
		//expense exceeding remaining amount remote
			Route::post('expense-exceed-remaining-amount-department-expense', 'DepartmentExpenditureController@expenseExceedsRemainingDepartmentExpenditure');

	//sponsor functionalities
		//all sponsor
			Route::get('list-sponsor', 'SponsorController@listSponsor')->name('admin.listSponsor');
		//add sponsor
			Route::get('add-sponsor', 'SponsorController@addSponsor')->name('admin.addSponsor');
			Route::post('save-sponsor', 'SponsorController@saveSponsor')->name('admin.saveSponsor');
		//sponsor status
			Route::post('change-status-sponsor/{id?}', 'SponsorController@changeStatusSponsor')->name('admin.changeStatusSponsor');
		//sponsor list download
			Route::get('download-sponsor', 'SponsorController@downloadSponsor')->name('admin.downloadSponsor');
		//sponsor list edit
			Route::get('edit-sponsor/{id?}', 'SponsorController@editSponsor')->name('admin.editSponsor');
			Route::post('update-sponsor', 'SponsorController@updateSponsor')->name('admin.updateSponsor');
		//sponsor list delete
			Route::get('delete-sponsor/{id?}', 'SponsorController@deleteSponsor')->name('admin.deleteSponsor');