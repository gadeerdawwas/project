<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ActivityStudentController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ClassroomsController;
use App\Http\Controllers\manager\CategoryController;
use App\Http\Controllers\manager\StudentController as ManagerStudentController;
use App\Http\Controllers\manager\StudentsController;
use App\Http\Controllers\manager\TeacherController;
use App\Http\Controllers\MangerAuthController;
use App\Http\Controllers\MangerDashboardController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\VarDumper\Caster\ProxyManagerCaster;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/', function () {
    // return view('home');
    return redirect()->route('login_school');
})->name('home');

Route::get('/design', function () {
    return view('design');
})->name('home');

Route::get('/dash', function () {
    return view('dash');
})->name('home');

Route::get('/testing', function () {
    return view('test');
})->name('testing');

Route::get('/bookPDF', function () {
    return view('book');
})->name('book');

Route::get('/board', function () {
    return view('board');
})->name('testing');


Route::get('/info', function () {
    return view('info');
})->name('info');

Route::get('/record' , function(){
    return view('record');
})->name('record');

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('singlebook/{id}', [BookController::class, 'singlebook'])->name('singlebook');
    Route::get('evaluation', [BookController::class, 'evaluation'])->name('evaluation');
});
Route::prefix('student')->name('student.')->group(function(){
    Route::get('readbook/{id}', [BookController::class, 'readbook'])->name('readbook');
    Route::post('read_book/{id}', [BookController::class, 'read_book'])->name('read_book');
});

Route::get('login',[MangerAuthController::class , 'login'])->name('login');
Route::post('login',[MangerAuthController::class , 'adminLogin'])->name('adminLogin');

Route::group(['prefix'=>'manager','as'=>'manager.','middleware' => 'auth:manager'], function () {
    Route::get('/',[MangerDashboardController::class,'home'])->name('home');
    Route::get('/books',[MangerDashboardController::class,'books'])->name('books');
    Route::get('/addbook',[MangerDashboardController::class,'addbook'])->name('addbook');
    Route::post('/savebook',[MangerDashboardController::class,'savebook'])->name('savebook');
    Route::post('/deletebook/{id}',[MangerDashboardController::class,'deletebook'])->name('deletebook');
    Route::get('/showbook/{id}',[MangerDashboardController::class,'showbook'])->name('showbook');
    Route::get('/editbook/{id}',[MangerDashboardController::class,'editbook'])->name('editbook');
    Route::post('/updatebook/{id}',[MangerDashboardController::class,'updatebook'])->name('updatebook');

    Route::resource('categories',CategoryController::class);
    Route::resource('teachers',TeacherController::class);
    Route::resource('students',StudentsController::class);
    Route::get('getclass/{id}',[MangerDashboardController::class,'getclass'])->name('getclass');

});
// Route::group(['middleware' => 'auth:manager'], function () {

// just logged in school
Route::group(['middleware' => 'auth:school'], function () {
    Route::resource('classes',ClassController::class);
    Route::get('/school/class_delete/{id}', [ClassController::class, 'class_delete'])->name('class_delete_school');

    Route::get('/school/deletebook/{id}' , [\App\Http\Controllers\SchoolController::class , 'deletebook'])->name('deletebook_school');
    Route::get('/school/editbook/{id}' , [\App\Http\Controllers\SchoolController::class , 'editbook'])->name('editbook_school');
    Route::post('/school/updatebook/{id}' , [\App\Http\Controllers\SchoolController::class , 'updatebook'])->name('updatebook_school');



    Route::get('/school', [\App\Http\Controllers\SchoolController::class, 'home']);
    Route::get('/school/book/{any}', [\App\Http\Controllers\SchoolController::class, 'bookone'])->name('bookone');
    Route::get('/school/school_admin_delete/{id}', [\App\Http\Controllers\SchoolController::class, 'school_admin_delete'])->name('school_admin_delete');
    Route::get('/school/school_student_edit/{id}', [\App\Http\Controllers\SchoolController::class, 'school_student_edit'])->name('school_student_edit');

    Route::post('/school/school_student_update/{id}', [\App\Http\Controllers\SchoolController::class, 'school_student_update'])->name('school_student_update');


    Route::get('/school/admins', [\App\Http\Controllers\SchoolController::class, 'admins']);
    Route::match(['get' , 'post'] ,'/school/addAdmin', [\App\Http\Controllers\SchoolController::class, 'addAdmin']);
    Route::get('updateAdmin/{id}', [\App\Http\Controllers\SchoolController::class, 'updateAdmin'])->name('updateAdmin');
    Route::post('updatesAdmin/{id}', [\App\Http\Controllers\SchoolController::class, 'updatesAdmin'])->name('updatesAdmin');
    Route::get('/school/students', [\App\Http\Controllers\SchoolController::class, 'students']);
    // Route::get('/school/addStudents', [\App\Http\Controllers\SchoolController::class, 'addStudent']);
    Route::match(['get' , 'post'] , '/school/addStudent', [\App\Http\Controllers\SchoolController::class, 'addStudent']);
    // Route::get('/book/{any}', [\App\Http\Controllers\SchoolController::class, 'book']);
    Route::match(['get' , 'post'] ,'/school/sendWhatsApp', [\App\Http\Controllers\SchoolController::class, 'sendWhatsApp']);
    Route::get('/school/logout', [\App\Http\Controllers\SchoolController::class, 'logout']);
    Route::match(['get' , 'post'] , '/school/addBook' , [\App\Http\Controllers\SchoolController::class , 'addBook']);
    Route::get('/school/students_delete/{id}', [\App\Http\Controllers\SchoolController::class, 'students_delete'])->name('students_delete_school');

});


// just logged in admins

Route::group(['middleware' => 'auth:admin','name','admin.'], function () {

    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'home']);
    Route::get('/admin/students', [\App\Http\Controllers\AdminController::class, 'students']);
    Route::get('/admin/student_edit/{id}', [\App\Http\Controllers\AdminController::class, 'student_edit'])->name('student_edit');
    // Route::get('/school/school_student_edit/{id}', [\App\Http\Controllers\SchoolController::class, 'school_student_edit'])->name('school_student_edit');
    Route::post('/admin/student_update/{id}', [\App\Http\Controllers\AdminController::class, 'student_update'])->name('student_update');

    Route::get('/admin/students_delete/{id}', [\App\Http\Controllers\AdminController::class, 'students_delete'])->name('students_delete');
    Route::match(['get' , 'post'] , '/admin/addStudent', [\App\Http\Controllers\AdminController::class, 'addStudent']);
    Route::match(['get' , 'post'] , '/admin/importStudents', [\App\Http\Controllers\AdminController::class, 'importStudents']);
    Route::match(['get' , 'post'] , '/admin/studentSubmits/{student_id?}', [\App\Http\Controllers\AdminController::class, 'studentSubmits']);
    Route::match(['get' , 'post'] , '/admin/submitDetails/{id?}', [\App\Http\Controllers\AdminController::class, 'submitDetails']);

    Route::match(['get' , 'post'] ,'/admin/readingSubmits', [\App\Http\Controllers\AdminController::class, 'readingSubmits']);
    Route::match(['get' , 'post'] ,'/admin/audioToText', [\App\Http\Controllers\AdminController::class, 'audioToText']);
    Route::match(['get' , 'post'] ,'/admin/addReadingChecker', [\App\Http\Controllers\AdminController::class, 'addReadingChecker']);
    Route::match(['get' , 'post'] ,'/admin/postedChecker', [\App\Http\Controllers\AdminController::class, 'postedChecker']);
    Route::match(['get'] ,'/admin/checkerResults', [\App\Http\Controllers\AdminController::class, 'checkerResults']);
    Route::delete('/admin/deleteReadingChecker/{id}', [\App\Http\Controllers\AdminController::class, 'deleteReadingChecker'])->name('admin.deleteReadingChecker');;

    Route::get('/admin/readingBodyToPDF/{id?}', [\App\Http\Controllers\AdminController::class, 'readingBodyToPDF']);
    Route::get('/admin/podcasts', [\App\Http\Controllers\AdminController::class, 'podcasts']);
    Route::match(['get' , 'post'] , '/admin/teachers', [\App\Http\Controllers\AdminController::class, 'teachers']);
    Route::match(['get' , 'post'] , '/admin/addTeacher', [\App\Http\Controllers\AdminController::class, 'addTeacher']);

    Route::get('/admin/editTeacher/{id}', [\App\Http\Controllers\AdminController::class, 'editTeacher'])->name('editTeacher');
    Route::post('/admin/updateTeacher/{id}', [\App\Http\Controllers\AdminController::class, 'updateTeacher'])->name('updateTeacher');
    Route::get('/admin/deleteTeacher/{id}', [\App\Http\Controllers\AdminController::class, 'deleteTeacher'])->name('deleteTeacher');

    Route::match(['get' , 'post'] , '/admin/readChallange', [\App\Http\Controllers\AdminController::class, 'readChallange']);
    Route::match(['get' , 'post'] , '/admin/readChallangeDetails/{post?}', [\App\Http\Controllers\AdminController::class, 'readChallangeDetails'])->name('readChallangeDetails');
    Route::match(['get' , 'post'] , '/admin/readChallange_show/{id}', [\App\Http\Controllers\AdminController::class, 'readChallange_show'])->name('readChallange_show');
    Route::match(['get' , 'post'] , '/admin/readChallange_edit/{id}', [\App\Http\Controllers\AdminController::class, 'readChallange_edit'])->name('readChallange_edit');
    Route::match(['get' , 'post'] , '/admin/readChallange_update/{id}', [\App\Http\Controllers\AdminController::class, 'readChallange_update'])->name('readChallange_update');
    Route::get('/admin/approvedPodcasts', [\App\Http\Controllers\AdminController::class, 'approvedPodcasts']);
    Route::post('/admin/changePodcastStatus', [\App\Http\Controllers\AdminController::class, 'changePodcastStatus']);
    Route::match(['get' , 'post'] , '/admin/live' , [\App\Http\Controllers\AdminController::class , 'live']);
    Route::get('/admin/book/{any}', [\App\Http\Controllers\AdminController::class, 'book'])->name('book');
    Route::get('/admin/appointments', [\App\Http\Controllers\AdminController::class, 'appointments']);
    Route::get('/admin/logout', [\App\Http\Controllers\AdminController::class, 'logout']);
    Route::match(['get' , 'post'] , '/admin/addBook' , [\App\Http\Controllers\AdminController::class , 'addBook']);
    Route::get('/admin/deletebook/{id}' , [\App\Http\Controllers\AdminController::class , 'deletebook'])->name('deletebook_admin');
    Route::get('/admin/editbook/{id}' , [\App\Http\Controllers\AdminController::class , 'editbook'])->name('editbook_admin');
    Route::post('/admin/updatebook/{id}' , [\App\Http\Controllers\AdminController::class , 'updatebook'])->name('updatebook_admin');

});


// just logged in student
Route::group(['middleware' => 'auth:student'], function () {

    Route::post('/uploadAudio', [\App\Http\Controllers\StudentController::class, 'uploadAudio']);

    Route::get('/student', [\App\Http\Controllers\StudentController::class, 'home']);
    Route::get('/books/{any}', [\App\Http\Controllers\StudentController::class, 'books']);
    Route::get('/book/{any}', [\App\Http\Controllers\StudentController::class, 'book']);
    Route::get('/student/live', [\App\Http\Controllers\StudentController::class, 'live']);
    Route::get('/student/result_read/{id}/{parameter}', [\App\Http\Controllers\StudentController::class, 'result_read'])->name('result_read');
    Route::get('/admin/result_read_admin/{id}/{parameter}', [\App\Http\Controllers\AdminController::class, 'result_read_admin'])->name('result_read_admin');
    // Route::get('/student/result_read/{id}/{parameter}', [\App\Http\Controllers\StudentController::class, 'result_read'])->name('result_read');

    Route::match(['get' , 'post'] ,'/student/readingQuality', [\App\Http\Controllers\StudentController::class, 'readingQuality']);
    Route::match(['get' , 'post'] ,'/student/readingQualityDetails', [\App\Http\Controllers\StudentController::class, 'readingQualityDetails'])->name('student.readingQualityDetails');

    Route::match(['get' , 'post'] ,'/student/speedTypeing', [\App\Http\Controllers\StudentController::class, 'speedTypeing']);
    Route::match(['get' , 'post'] , '/student/readChallange', [\App\Http\Controllers\StudentController::class, 'readChallange']);

    Route::get('/student/readChallange_all', [\App\Http\Controllers\StudentController::class, 'readChallange_all'])->name('readChallange_all');
    Route::get('/student/readChallange_group/{id}', [\App\Http\Controllers\StudentController::class, 'readChallange_group'])->name('readChallange_group');
    Route::get('/student/quiz', [\App\Http\Controllers\StudentController::class, 'quiz']);
    Route::get('/student/logout', [\App\Http\Controllers\StudentController::class, 'logout']);

});


Route::group(['middleware' => 'auth:teacher'], function () {

    Route::match(['get' , 'post'] ,'/teacher/', [\App\Http\Controllers\TeacherController::class, 'index']);
    Route::match(['get' , 'post'] ,'/teacher/appointments', [\App\Http\Controllers\TeacherController::class, 'appointments']);
    Route::match(['get' , 'post'] ,'/teacher/bookAppointment', [\App\Http\Controllers\TeacherController::class, 'bookAppointment']);
    Route::match(['get' , 'post'] ,'/teacher/logout', [\App\Http\Controllers\TeacherController::class, 'logout']);

});



Route::match(['get' , 'post'] , '/login/admin' , [\App\Http\Controllers\LoginController::class , 'admin']);
Route::match(['get' , 'post'] , '/login/school' , [\App\Http\Controllers\LoginController::class , 'school'])->name('login_school');
Route::match(['get' , 'post'] , '/login/student/{username?}' , [\App\Http\Controllers\LoginController::class , 'student']);
Route::match(['get' , 'post'] , '/register' , [\App\Http\Controllers\HomeController::class , 'register']);

Route::match(['get' , 'post'] , '/{username?}', [\App\Http\Controllers\HomeController::class, 'schoolPage']);

Route::get('/file/serve/{file}', [\App\Http\Controllers\FileAccessController::class , 'serve']);
Route::get('/file/audioFile/{file}', [\App\Http\Controllers\FileAccessController::class , 'audioFile']);
Route::get('/file/audioRecord/{file?}', [\App\Http\Controllers\FileAccessController::class , 'audioRecord']);
Route::get('/file/show_profile/{file}', [\App\Http\Controllers\FileAccessController::class , 'show_profile']);


Route::get('/admin/readChallange_user/{id}', [\App\Http\Controllers\AdminController::class, 'readChallange_user'])->name('readChallange_user');
Route::get('/admin/readChallange_group_user/{id}/{parameter}', [\App\Http\Controllers\AdminController::class, 'readChallange_group_user'])->name('readChallange_group_user');
Route::get('/admin/wait_challange', [\App\Http\Controllers\AdminController::class, 'wait_challange'])->name('wait_challange');
Route::get('/admin/decline_challange', [\App\Http\Controllers\AdminController::class, 'decline_challange'])->name('decline_challange');


Route::get('result_read/{id}/{parameter}', [\App\Http\Controllers\Controller::class, 'result_read'])->name('result_reads');
Route::post('readChallange_share/{id}', [\App\Http\Controllers\StudentController::class, 'readChallange_share'])->name('readChallange_shares');
Route::post('student/readChallange_share_interal', [\App\Http\Controllers\StudentController::class, 'readChallange_share_interal'])->name('readChallange_share_interal');



Route::get('activities/index', [ActivityController::class ,'index'])->name('activities.index');
Route::get('activities/create', [ActivityController::class ,'create'])->name('activities.create');
Route::post('activities/store', [ActivityController::class ,'store'])->name('activities.store');
Route::get('activities/{id}', [ActivityController::class ,'show'])->name('activities.show');
Route::get('activity_delete/{id}', [ActivityController::class ,'activity_delete'])->name('activities.activity_delete');
Route::get('activity_edit/{id}', [ActivityController::class ,'activity_edit'])->name('activities.activity_edit');
Route::post('activity_update/{id}', [ActivityController::class ,'activity_update'])->name('activities.activity_update');

Route::get('activities_student/index', [ActivityStudentController::class ,'index'])->name('activities_student.index');
Route::get('activities_student/create', [ActivityStudentController::class ,'create'])->name('activities_student.create');
Route::post('activities_student/store', [ActivityStudentController::class ,'store'])->name('activities_student.store');
Route::get('activities_student/{id}', [ActivityStudentController::class ,'show'])->name('activities_student.show');
Route::get('activities_student_student/{id}', [ActivityStudentController::class ,'showactivity'])->name('activities_student.show_student');

Route::get('get_ISBN/{id}', [ActivityStudentController::class ,'get_ISBN'])->name('get_ISBN.show_student');


Route::get('classrooms/index', [ClassroomController::class ,'index'])->name('classrooms.index');
Route::get('classrooms/create', [ClassroomController::class ,'create'])->name('classrooms.create');
Route::post('classrooms/store', [ClassroomController::class ,'store'])->name('classrooms.store');
Route::get('classrooms/edit/{id}', [ClassroomController::class ,'edit'])->name('classrooms.edit');
Route::post('classrooms/update/{id}', [ClassroomController::class ,'update'])->name('classrooms.update');
Route::get('classrooms_delete/{id}', [ClassroomController::class ,'classrooms_delete'])->name('classrooms.classrooms_delete');

// Route::get('activities', [ActivityController::class ,'index'])->name('activities');
