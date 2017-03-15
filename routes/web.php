<?php

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
use App\Contact;
use App\Task;
use Illuminate\Http\Request;


/*
Route::get('/', function () {
    return view('welcome');
});
*/

/**
 * Display All Tasks
 */
Route::get('/', function () {

    /*
	$tasks = Task::orderBy('created_at', 'asc')->get();

    return view('tasks', [
        'tasks' => $tasks
    ]);
    */
    $contacts = Contact::orderBy('created_at', 'asc')->get();

    //dd($contacts);

    return view('contacts', [
        'contacts' => $contacts
    ]);
    
});

/**
 * Add A New Task
 */
Route::post('/task', function (Request $request) {
   /*
	$validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    // Create The Task...

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
    */
});

Route::post('/contact', function (Request $request) {
      
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'jobtitle' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    // Create The Contact...
    //dd($request->all());
    $contact = new Contact;
    $contact->name = $request->name;
    $contact->jobtitle = $request->jobtitle;
    $contact->age = $request->age;
    $contact->nickname = $request->nickname;
    $contact->group = $request->group;

    if(is_null($request->manager))
    {
        $contact->manager = "No";
    }
    else
    {
        $contact->manager = "Yes";
    }
    

    $contact->save();

    return redirect('/');

    // Create The Task...
    /*
    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
    */
});

Route::get('/sitemap', ['as' => 'sitemap', 'uses' => 'SitemapsController@index']);


/**
 * Delete An Existing Task
 */
Route::delete('/task/{id}', function ($id) {
    //
    Task::findOrFail($id)->delete();
    return redirect('/');
});

Route::delete('/contact/{id}', function ($id) {
    //
    //dd("in delete contact " . $id);
    Contact::findOrFail($id)->delete();
    return redirect('/');
});



/**
 * Delete An Existing Task
 */
Route::post('/clearall', function () {
    //
    //Task::findOrFail($id)->delete();
    //return redirect('/');
    $tasks = App\Task::all();

   // dd(count($tasks));
    foreach($tasks as $task)
    {
        $task->delete();
        
    }

    return redirect('/');

});










