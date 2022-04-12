<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!|
*/
Auth::routes();

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::get('/', function () {
    return redirect()->route('login');
})->name('jatu-login')->middleware('guest');

//staff routes
Route::get('/staff/request_history/{id}','HR\Permission_noteController@request_history')->name('request_history')->middleware('staff');
Route::get('/staff/view_request_hr/{id}','HR\Permission_noteController@view_request_hr')->name('view_request_hr')->middleware('staff');
Route::get('/staff/view_request_hod/{id}','HR\Permission_noteController@view_request_hod')->name('view_request_hod')->middleware('staff');
Route::post('/staff/return_day','HR\Permission_noteController@return_day')->name('return-day')->middleware('staff');
Route::get('/staff/view_request/{id}','HR\Permission_noteController@view_request')->name('view_request')->middleware('staff');
Route::get('/staff/show_permission','HR\Permission_noteController@show_permission')->name('show_permission')->middleware('staff');
Route::post('/staff/permission_request','HR\Permission_noteController@store')->name('permission_request')->middleware('staff');
Route::get('/staff/permission_note','HR\Permission_noteController@index')->name('permission_note')->middleware('staff');
Route::get('/profile/index','PasswordsController@index')->name('indexs')->middleware('auth'); //zitaongezeka kutokana na user wakiongezeka
Route::post('/staff/pass_edit','PasswordsController@update')->name('pass_edit')->middleware('auth');
Route::post('/profile/pic_update','EditingController@pic_update')->name('pic_updatez')->middleware('auth');
Route::post('/staff/pro-edits','EditingController@update')->name('pro-edits')->middleware('staff');
Route::get('/profile/pro-edit','EditingController@index')->name('pro-edit')->middleware('auth');
Route::get('/staff/home', 'Staff\HomeController@index')->name('staff')->middleware('staff');
Route::get('/staff/staff_profile_edit', 'Staff\HomeController@staff_edit_profile')->name('staff_edit_profile')->middleware('staff');
Route::get('staff-task-create', 'Staff\TaskController@create')->name('task-create')->middleware('staff');
Route::post('post-task-form', 'Staff\TaskController@store')->name('task-form')->middleware('staff');
Route::get('staff-task-list', 'Staff\TaskController@index')->name('task-list')->middleware('staff'); 
Route::get('list-edit-hod/{id}', 'Staff\TaskController@index_back')->name('list-edit-hod')->middleware('staff'); 
Route::get('staff-task-edit/{id}', 'Staff\TaskController@edit')->name('edit-task')->middleware('staff');
Route::get('staff-task-delete/{id}', 'Staff\TaskController@destroy')->name('delete-task')->middleware('staff');
Route::post('post-task-form-edit/{id}', 'Staff\TaskController@update')->name('task-form-edit')->middleware('staff'); 
Route::get('post-task-form-preview', 'Staff\TaskController@show')->name('task-form-preview')->middleware('staff');
Route::get('post-back-task-form-preview/{id}', 'Staff\TaskController@show_back')->name('task-back-form-preview')->middleware('staff');
Route::get('staff-view-report','Staff\TaskController@view_reports')->name('staff-view-report')->middleware('staff');
Route::get('comfirm-task-submision','Staff\TaskController@submit_task_to_report')->name('comfirm-task-submision')->middleware('staff');
Route::get('comfirm-back-task-submision/{id}','Staff\TaskController@submit_task_to_back')->name('comfirm-back-task-submision')->middleware('staff');
Route::get('staff-preview_report/{id}','Staff\TaskController@preview_my_report')->name('staff-preview_report')->middleware('staff');
Route::get('staff-back-preview_report/{id}','Staff\TaskController@preview_back_my_report')->name('staff-back-preview_report')->middleware('staff');
Route::get('/staff/staff_profile_edit', 'EditingController@edit')->name('staff_edit_profile')->middleware('staff');
Route::post('/staff/staff_profile_editings', 'EditingController@update')->name('staff_profile_editings')->middleware('auth');
Route::get('/staff/create-target','Staff\HomeController@target')->name('create-target')->middleware('staff');
Route::get('/staff/view-targets','Staff\HomeController@view_targets')->name('view-targets')->middleware('staff'); 
Route::post('/staff/save-target','Staff\HomeController@save_target')->name('save-target')->middleware('staff');
Route::get('/profile/view-profile','Staff\StaffNewProfile@index')->name('view-profile')->middleware('auth'); 
//staff route to edit profile pic
Route::post('/staff/update_pic', 'Staff\HomeController@update_pic')->name('update_pic')->middleware('staff');
Route::post('/staff/staff_updates', 'Staff\HomeController@staff_updates')->name('staff_updates')->middleware('staff');
Route::get('/staff/password_updates', 'Staff\HomeController@password_updates')->name('password_updates')->middleware('staff');
Route::post('/staff/new_password', 'Staff\HomeController@new_password')->name('new_password')->middleware('staff');
Route::get('/staff/view-help','Staff\HelpController@index')->name('view-help')->middleware('staff'); 
// route to return staff profile
Route::get('/staff/profile', 'Staff\HomeController@profile')->name('profile')->middleware('staff');
//rout to view user profile editing page
Route::get('/staff/edit_profile_view', 'Staff\HomeController@edit_profile_view')->name('edit-profile-view')->middleware('staff');
Route::get('/staff/edit_profile_view2', 'Staff\HomeController@edit_profile_view2')->name('edit-profile-view2')->middleware('staff');
Route::get('/staff/opinion-preview', 'Staff\OpinionController@show')->name('opinion-preview')->middleware('staff');
Route::get('/staff/opinion', 'Staff\OpinionController@index')->name('opinion')->middleware('staff');
Route::post('/staff/opinion', 'Staff\OpinionController@store')->name('opinion')->middleware('staff');
Route::get('/staff/staff-view-full/{id}', 'Staff\OpinionController@staffView')->name('staff-view-full');
//update personal details
Route::post('/staff/update_profile', 'Staff\HomeController@update_profile')->name('update_profile')->middleware('staff');

//HOD routes
Route::get('/hod/home', 'HOD\HomeController@index')->name('hod')->middleware('hod');
Route::get('/hod/hod-report-view', 'HOD\ReportController@index')->name('report-staff-view')->middleware('hod');  
Route::get('/hod/hod-report-view-staff/{id}', 'HOD\ReportController@show_staff_report')->name('hod-report-view')->middleware('hod'); 
Route::get('/hod/hod-report-view-staff-print/{id}', 'HOD\ReportController@show_staff_report_print')->name('hod-report-view-print-user')->middleware('hod'); 
Route::get('/hod/hod-report-view-staff-print-data/{id}', 'HOD\ReportController@show_staff_report_print')->name('hod-report-view-print-data')->middleware('hod');
Route::post('/hod/hod-report-comment-staff/{id}', 'HOD\ReportController@store')->name('hod-report-comment')->middleware('hod'); 
Route::post('/hod/hod-report-comment-hod/{id}', 'HOD\ReportController@hod_comment')->name('hod-report-comment-send')->middleware('hod'); 
//Hod route to create weekely report
Route::get('/hod/create-report','HOD\HodReportController@create')->name('hod-create-report')->middleware('hod');
Route::get('/hod/view-my-report','HOD\HodReportController@show_report')->name('hod-view-my-report')->middleware('hod');
Route::get('/hod/view-my-report/{id}','HOD\HodReportController@show')->name('hod-view-single-report')->middleware('hod');
Route::post('/hod/save-report','HOD\HodReportController@store')->name('hod-save-report');
//Route to enable HOD view opinions
Route::get('/hod/hod-opinion-view', 'Staff\OpinionController@hodView')->name('hod-opinion-view')->middleware('hod');
//Route to enable HOD view full opinions
Route::get('/hod/hod-view-full/{id}', 'Staff\OpinionController@viewFull')->name('hod-view-full')->middleware('hod');
Route::get('/hod/hod-report-view', 'HOD\ReportController@index')->name('report-list')->middleware('hod'); 
//Route to enable HOD to view all staffs and manage them
Route::get('/hod/staffview', 'HOD\StaffviewController@show')->name('staffview')->middleware('hod');
Route::get('/hod/staff-report-print', 'HOD\ReportController@print')->name('print-report')->middleware('hod');
Route::get('/hod/view-staff/{id}', 'HOD\ViewstaffprofileController@index')->name('view-staff')->middleware('auth');
Route::get('/hod/hod-view-help','HOD\HelpController@index')->name('hod-view-help')->middleware('hod'); 
Route::get('/hod/print-report','HOD\StaffPrintController@index')->name('hr-staff-print-report')->middleware('hod');
Route::post('hod/print/print-report-section','HOD\StaffPrintController@report_show')->name('hod-print-report-section')->middleware('hod');
Route::get('/hod/report-print-preview/{datefrom}/{dateto}','HOD\StaffPrintController@print_all')->name('hod-report-print-preview')->middleware('hod');
Route::get('/hod/report-print-staff-preview/{datefrom}/{dateto}','HOD\StaffPrintController@print_staff_all')->name('report-print-staff-preview')->middleware('hod');
Route::get('/hod/report-print-staff-preview/{datefrom}/{dateto}','HOD\StaffPrintController@print_name_staff_all')->name('hod-report-print-staff-preview')->middleware('hod');
Route::get('/hod/hod-report-view-staff-print/{id}', 'HOD\ReportController@show_staff_report_print')->name('hod-hod-print-report-view')->middleware('hod'); 
Route::get('/hod/hod-staff-approval','HOD\ReportController@approval')->name('hod-staff-approval')->middleware('hod');
Route::post('/hod/hod-staff-approval-give','HOD\ReportController@store_approval')->name('hod-staff-approval-give-staff')->middleware('hod');
Route::get('/staff-view-approval-view','HOD\ReportController@view_approval')->name('hod-staff-view-approval')->middleware('hod');
// hod permission
Route::get('/hod/permission-requests','HR\Permission_noteController@hod_index')->name('view-requests')->middleware('auth');
Route::get('/hod/view-request/{id}','HR\Permission_noteController@show')->name('view-request')->middleware('auth');
Route::post('/hod/save-hod-recommendation/{id}','HR\Permission_noteController@create')->name('save-hod-recommendation')->middleware('auth');

// ======================================HR====================================
Route::get('/hr/home', 'HR\HomeController@index')->name('hr')->middleware('hr');
Route::get('/hr/hr-view-staff-no-report', 'HR\NonreportController@index')->name('hr-view-staff-no-report')->middleware('hr');
Route::get('/hr/hr-view-staff-no-report', 'HR\NonreportController@create')->name('hr-view-staff-no-report')->middleware('hr');
Route::get('/hr/create-report','HR\HRReportController@create')->name('hr-create-report')->middleware('hr');
Route::post('/hr/save-report','HR\HRReportController@store')->name('hr-save-report')->middleware('hr');
Route::get('/hr/view-my-report','HR\HRReportController@show_report')->name('hr-view-my-report')->middleware('hr');
Route::get('/hr/view-my-report/{id}','HR\HRReportController@show')->name('hr-view-single-report')->middleware('hr');
Route::get('/hr/view-staff-report','HR\StaffReportController@index')->name('hr-view-staff-report')->middleware('hr');
Route::get('/hr/hr-report-view-staff/{id}', 'HR\StaffReportController@show_staff_report')->name('hr-report-view')->middleware('hr'); 
Route::get('/hr/view-hod-report','HR\StaffReportController@hod_index')->name('hr-view-hod-report')->middleware('hr');
Route::get('/hr/hod-report-view-staff/{id}', 'HR\StaffReportController@show_hod_report')->name('hr-hod-report-view')->middleware('hr'); 
Route::post('/hr/hr-hod-report-comment-hod/{id}', 'HR\StaffReportController@hod_comment')->name('hr-hod-report-comment-send')->middleware('hr'); 
Route::get('/print-report-view/{id}', 'HR\StaffReportController@show_staff_report_print')->name('hr-hod-print-report-view')->middleware('auth'); 
Route::get('/print/print-report','HR\HRReportController@index')->name('hr-print-report')->middleware('auth');
Route::post('/print/print-report-section','HR\HRReportController@report_show')->name('hr-print-report-section')->middleware('auth');
Route::get('/hr/hr-opinion-view', 'HR\HropinionController@index')->name('hr-opinion-view')->middleware('hr');
Route::get('/hr/hr-view-full/{id}', 'HR\HropinionController@show')->name('hr-view-full')->middleware('hr');
Route::get('/hr/hr-view-read/{id}', 'HR\HropinionController@read')->name('hr-view-read')->middleware('hr');
Route::get('/hr/view-departments', 'HR\ViewdepartimentController@index')->name('view-departments')->middleware('hr');
Route::get('/hr/view-all-staff', 'HR\ViewdepartimentController@index_staff_show')->name('view-all-staff')->middleware('hr');
Route::get('/hr/department-staff/{id}', 'HR\ViewdepartimentController@show')->name('department-staff')->middleware('hr');
Route::get('/hr/report-print-preview/{datefrom}/{dateto}','HR\HRReportController@print_all')->name('report-print-preview')->middleware('auth');
Route::get('/report-print-staff-preview/{datefrom}/{dateto}','HR\HRReportController@print_staff_all')->name('report-print-staff-preview')->middleware('auth');
Route::get('/report-print-staff-preview/{datefrom}/{dateto}','HR\HRReportController@print_name_staff_all')->name('report-print-staff-preview')->middleware('auth');
Route::get('/hr/hr-view-help','HR\HelpController@index')->name('hr-view-help')->middleware('hr'); 
Route::get('/hr/hr-staff-approval','HR\HRReportController@approval')->name('hr-staff-approval')->middleware('hr');
Route::post('/hr/hr-staff-approval-give','HR\HRReportController@store_approval')->name('hr-staff-approval-give')->middleware('hr');
Route::get('/staff-view-approval','HR\HRReportController@view_approval')->name('hr-staff-view-approval')->middleware('auth');
Route::get('/view-approval-single/{id}', 'HR\HRReportController@show_approval')->name('hr-view-approval-single')->middleware('auth');
// hr permission
Route::get('/hr/permission-requests','HR\Permission_noteController@hod_index')->name('hr-view-requests')->middleware('hr');
Route::get('/hr/view-request/{id}','HR\Permission_noteController@show')->name('hr-view-request')->middleware('hr');
Route::post('/hr/save-hod-recommendation/{id}','HR\Permission_noteController@create')->name('save-hr-recommendation')->middleware('hr');
Route::get('/hr/permission-process','HR\Permission_noteController@hr_process_request')->name('permission-process')->middleware('hr');

// =====================================BM=======================================
Route::get('/bm/home', 'BM\HomeController@index')->name('bm')->middleware('bm');
//Bm view opinions from staffs
Route::get('/bm/bm-opinion-view', 'BM\BmopinionController@index')->name('bm-opinion-view')->middleware('bm');
Route::get('/bm/bm-opinion-view', 'BM\BmopinionController@BmView')->name('bm-opinion-view')->middleware('bm');
Route::get('/bm/bm-view-full/{id}', 'BM\BmopinionController@BmViewFull')->name('bm-view-full')->middleware('bm');
Route::get('/bm/bm-view-staff-no-report', 'BM\BmopinionController@NoReport')->name('bm-view-staff-no-report')->middleware('bm');
Route::get('/bm/bm-report-view', 'BM\ReportController@index')->name('branch-report-view')->middleware('bm');  
Route::get('/bm/bm-view', 'BM\ViewController@index')->name('bm-view')->middleware('bm');  
Route::get('/bm/bm-report-view-staff/{id}', 'BM\ReportController@show')->name('bm-single-report-view')->middleware('bm'); 
Route::post('/bm/bm-report-comment/{id}', 'BM\ReportController@bm_comment')->name('bm-report-comment-send')->middleware('bm'); 
Route::get('/bm/bm-report-view-staff-print/{id}', 'BM\ReportController@show_staff_report_print')->name('bm-report-view-print')->middleware('bm'); 
Route::get('/bm/bm-view-help','BM\HelpController@index')->name('bm-view-help')->middleware('bm'); 
Route::get('/bm/print-report','BM\StaffPrintController@index')->name('bm-staff-print-report')->middleware('bm');
Route::post('bm/print/print-report-section','BM\StaffPrintController@report_show')->name('bm-print-report-section')->middleware('bm');
Route::get('/bm/report-print-preview/{datefrom}/{dateto}','BM\StaffPrintController@print_all')->name('bm-report-print-preview')->middleware('bm');
Route::get('/bm/report-print-staff-preview/{datefrom}/{dateto}','BM\StaffPrintController@print_staff_all')->name('report-print-staff-preview')->middleware('bm');
Route::get('/bm/report-print-staff-preview/{datefrom}/{dateto}','BM\StaffPrintController@print_name_staff_all')->name('bm-report-print-staff-preview')->middleware('bm');
Route::get('/bm/hr-hod-print-report-view/{id}', 'HR\StaffReportController@show_staff_report_print')->name('bm-hod-print-report-view')->middleware('bm'); 
Route::get('/bm/bm-staff-approval','BM\StaffPrintController@approval')->name('bm-staff-approval')->middleware('bm');
Route::post('/bm/bm-staff-approval-give','BM\StaffPrintController@store_approval')->name('bm-staff-approval-give-staff')->middleware('bm');
Route::get('/staff-view-approval-bm','BM\StaffPrintController@view_approval')->name('bm-staff-view-approval')->middleware('bm');

// =======================================GM=========================================
Route::get('/gm/home', 'GM\HomeController@index')->name('gm')->middleware('gm');
Route::get('/gm/view-departments', 'GM\GmviewdepartmentsController@index')->name('gm-view-departments')->middleware('gm');
Route::get('/gm/gm-dept-staff/{id}', 'GM\GmviewdepartmentsController@show')->name('gm-dept-staff')->middleware('gm');
Route::get('/gm/view-hr-report','GM\ReportController@hr_index')->name('gm-view-hr-report')->middleware('gm');
Route::get('/gm/gm-hr-report-view-staff/{id}', 'GM\ReportController@show_hr_report')->name('gm-hr-report-view')->middleware('auth'); 
Route::get('/gm/view-all-staff', 'GM\HomeController@index_staff_show')->name('view-all-staff-gm')->middleware('gm');
Route::get('/gm/gm-hr-print-report-view/{id}', 'GM\ReportController@show_staff_report_print')->name('gm-hr-print-report-view')->middleware('auth'); 
Route::post('/gm/gm-view-hr-report-comment/{id}', 'GM\ReportController@gm_comment')->name('gm-hr-report-comment-send')->middleware('gm'); 
Route::get('/gm/gm-view-help','GM\HelpController@index')->name('gm-view-help')->middleware('gm'); 
Route::get('/gm/hod-report-view-staff-print/{id}', 'GM\ReportController@show_staff_report_print')->name('hod-report-view-print')->middleware('hod'); 

// =======================================CEO=========================================
Route::get('/ceo/home', 'CEO\HomeController@index')->name('ceo')->middleware('ceo');
Route::get('/ceo/ceo-view-hr-report', 'CEO\ReportController@hr_index')->name('ceo-view-hr-report')->middleware('ceo');
Route::get('/ceo/ceo-hr-report-view/{id}', 'CEO\ReportController@show_hr_report')->name('ceo-hr-report-view')->middleware('ceo');
Route::get('/ceo/view-all-staff', 'CEO\HomeController@index_staff_show')->name('view-all-staff-ceo')->middleware('ceo');
Route::get('/ceo/ceo-hr-report-view-staff/{id}', 'CEO\ReportController@show_hr_report')->name('ceo-hr-report-view')->middleware('ceo');
Route::get('/ceo/ceo-view-departments', 'CEO\CeoviewdepartmentsController@index')->name('ceo-view-departments')->middleware('ceo');
Route::get('/ceo/ceo-dept-staff/{id}', 'CEO\CeoviewdepartmentsController@show')->name('ceo-dept-staff')->middleware('ceo');
Route::get('/ceo/ceo-view-help','CEO\HelpController@index')->name('ceo-view-help')->middleware('ceo'); 

// ==========================================Administrator===============================
Route::get('/admin/home', 'Admin\HomeController@index')->name('admin')->middleware('admin');
//department
Route::get('/admin/department', 'Admin\DepartmentController@index')->name('department')->middleware('admin');
Route::post('/admin/save-department', 'Admin\DepartmentController@store')->name('save-department')->middleware('admin');
Route::get('/admin/show-departments', 'Admin\DepartmentController@dept_list')->name('department-list')->middleware('admin');
Route::get('/admin/edit-departments/{id}', 'Admin\DepartmentController@edit')->name('edit-department')->middleware('admin');
Route::get('/admin/delete-departments/{id}', 'Admin\DepartmentController@destroy')->name('delete-department')->middleware('admin');
Route::post('/admin/update-departments/{id}', 'Admin\DepartmentController@update')->name('update-department')->middleware('admin');
//branches
Route::get('/admin/branches', 'Admin\BranchController@index')->name('branch')->middleware('admin');
Route::post('/admin/save-branche', 'Admin\BranchController@store')->name('save-branch')->middleware('admin');
Route::get('/admin/show-branches', 'Admin\BranchController@branch_list')->name('branch-list')->middleware('admin');
Route::get('/admin/edit-branches/{id}', 'Admin\BranchController@edit')->name('edit-branch')->middleware('admin');
Route::get('/admin/delete-branches/{id}', 'Admin\BranchController@destroy')->name('delete-branch')->middleware('admin');
Route::post('/admin/update-branches/{id}', 'Admin\BranchController@update')->name('update-branch')->middleware('admin');
//location
Route::get('/admin/locations', 'Admin\LocationController@index')->name('location')->middleware('admin');
Route::post('/admin/save-location', 'Admin\LocationController@store')->name('save-location')->middleware('admin');
Route::get('/admin/show-locations', 'Admin\LocationController@location_list')->name('location-list')->middleware('admin');
Route::get('/admin/edit-locations/{id}', 'Admin\LocationController@edit')->name('edit-location')->middleware('admin');
Route::get('/admin/delete-locations/{id}', 'Admin\LocationController@destroy')->name('delete-location')->middleware('admin');
Route::post('/admin/update-locations/{id}', 'Admin\LocationController@update')->name('update-location')->middleware('admin');
//staffs
Route::get('/admin/staff', 'Admin\LocationController@location_list')->name('staff-list')->middleware('admin');
Route::get('/admin/add-staff', 'Admin\AdminaddstaffController@index')->name('add-staff')->middleware('admin');
Route::Post('/admin/reg-staff', 'Admin\AdminaddstaffController@store')->name('reg-staff')->middleware('admin');
Route::get('/admin/admin-view-staff', 'Admin\AdminaddstaffController@show')->name('admin-view-staff')->middleware('admin');
Route::get('/admin/admin-viewing-staff/{id}', 'Admin\AdminaddstaffController@viewingstaff')->name('admin-viewing-staff')->middleware('admin'); 
Route::get('/admin/admin-add-position', 'Admin\RolesPositionController@index')->name('add-position')->middleware('admin'); 
//role position
Route::get('/admin/admin-view-position', 'Admin\RolesPositionController@show')->name('view-position')->middleware('admin'); 
Route::post('/admin/admin-save-position', 'Admin\RolesPositionController@create')->name('create-position')->middleware('admin'); 
Route::get('/admin/edit-position/{id}', 'Admin\RolesPositionController@edit')->name('edit-position')->middleware('admin');
Route::get('/admin/delete-position/{id}', 'Admin\RolesPositionController@destroy')->name('delete-position')->middleware('admin');
Route::post('/admin/update-position/{id}', 'Admin\RolesPositionController@update')->name('update-position')->middleware('admin');
//role
Route::get('/admin/admin-add-role', 'Admin\RolesController@index')->name('add-role')->middleware('admin'); 
Route::get('/admin/admin-view-role', 'Admin\RolesController@show')->name('view-role')->middleware('admin'); 
Route::post('/admin/admin-save-role', 'Admin\RolesController@create')->name('create-role')->middleware('admin'); 
Route::get('/admin/edit-role/{id}', 'Admin\RolesController@edit')->name('edit-role')->middleware('admin');
Route::get('/admin/delete-role/{id}', 'Admin\RolesController@destroy')->name('delete-role')->middleware('admin');
Route::post('/admin/update-role/{id}', 'Admin\RolesController@update')->name('update-role')->middleware('admin');
Route::get('/admin/admin-opinion-view', 'Admin\RolesController@index_opinion')->name('admin-opinion-view')->middleware('admin');
Route::get('/admin/admin-view-full/{id}', 'Admin\RolesController@show_full')->name('admin-view-full')->middleware('admin');
//staff profile
Route::get('/admin/view-staffs/{id}', 'Admin\ViewstaffsprofileController@index')->name('view-staffs')->middleware('admin');
Route::post('/admin/view-staff-edit', 'Admin\ViewstaffsprofileController@edit')->name('view-staff-edit')->middleware('admin');
Route::post('/admin/update-official', 'Admin\ViewstaffsprofileController@updateofficial')->name('update-official')->middleware('admin');
//holiday
Route::get('/admin/holidays', 'Admin\HolidayController@index')->name('holiday')->middleware('admin');
Route::post('/admin/save-holiday', 'Admin\HolidayController@store')->name('save-holiday')->middleware('admin');
Route::get('/admin/show-holidays', 'Admin\HolidayController@holiday_list')->name('holiday-list')->middleware('admin');
Route::get('/admin/edit-holidays/{id}', 'Admin\HolidayController@edit')->name('edit-holiday')->middleware('admin');
Route::get('/admin/approval-holidays/{id}', 'Admin\HolidayController@holiday_approval')->name('aprroval-holiday')->middleware('admin');
Route::get('/admin/delete-holidays/{id}', 'Admin\HolidayController@destroy')->name('delete-holiday')->middleware('admin');
Route::post('/admin/update-holidays/{id}', 'Admin\HolidayController@update')->name('update-holiday')->middleware('admin');
//
Route::get('/admin/passreset', 'Admin\PasswordController@index')->name('passreset')->middleware('admin'); 
Route::get('/admin/passupdate/{id}', 'Admin\PasswordController@update')->name('passupdate')->middleware('admin');
Route::get('/admin/help', 'Admin\HelpController@index')->name('help')->middleware('admin');
Route::get('/admin/statusset', 'Admin\ActivateController@index')->name('statusset')->middleware('admin');
Route::get('/admin/statuschange/{id}', 'Admin\ActivateController@update')->name('statuschange')->middleware('admin');