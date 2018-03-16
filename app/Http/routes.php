<?php
use App\Post;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {

//    return view('welcome');
	
// });

// Route::get('/about', function () {
//    //return view('welcome');
// 	return "Hi about page ";
// });

// Route::get('/contact', function () {
//    //return view('welcome');
// 	return "Sergio A. Jimenez Hernandez";
// });

// Route::get('/post/{id}/{name}',function($id,$name)
// {
// 	return "This is post number ".$id." ".$name;
// });

// Route::get('admin/posts/example',array('as' => 'admin.home'	,function()
// {
// 	$url=route('admin.home');



// 	return "this url is ".$url;	

// }));


// Route::get('/post/{id}','PostController@index');

// Route::resource('posts','PostController');
// Route::get('/contact','PostController@contact');

// Route::get('/contact','PostController@contact');

// Route::get('/post/{id}/{name}/{password}','PostController@showPost');

Route::get('/insert',function()
{
	DB::insert('insert into posts(title,content) values(?,?)', 	['Laravel is awsome with Edwin','Laravel is the best thing that has happened to PHP,PERIOD']);

});

//Database Raw SWL Queries

// 	Route::get('/read',function()
// {
// 	$results=DB::select('select * from posts where id=?',[1]);
// 	return var_dump($results);
// // 	foreach($results as $post){

// // 	return $post->title;
// // }
// });

// Route::get('/update',function()
// {
// 	$updated = DB::update('update posts set title ="Updated title" where id=?',[1]);

// 	return $updated;
// });

// Route::get('/delete',function()
// {
// 	$deleted = DB::delete('delete from posts where id=?',[1]);
// 	return $deleted;
// });

/*
|--------------------------------------------------------------------------
| ELOQUENT
|-*/

// Route::get('/read',function()
// {
// 	$posts=Post::all();

// 	foreach ($posts as $post ) {
// 		# code...

// 		return $post -> title;
// 	}
// });

// Route::get('/find',function()
// {
// 	$posts=Post::find(1);

// 	// foreach ($posts as $post ) {
// 	// 	# code...
// 	 	return $posts -> title;
// 	// }
//});


// Route::get('/findwhere',function()
// {
// 	$posts=Post::where('id',2)->orderBy('id','desc')->take(1)->get();
// 	return $posts;

// });

// Route::get('/findmore',function()
// {
// 	// $posts=Post::findOrFail(0);

// 	// return $posts;

// 	$posts=Post::where('users_count','<',50)->firstOrFail();

// 	return $posts;
// });


/*
-------------------------------------------
Reading Data ELOQUENT
-------------------------------------------
*/

Route::get('/basicinsert',function()
{
	$posts=new Post;

	$posts ->title = 'New Eloquent title insert';
	$posts ->content = "Wow, ELOQUENT is really cool, look at this content";

	$posts->save();
});

//Find and save(like update);

// Route::get('/basicinsert2',function()
// {
// 	$posts = Post::find(2);

// 	$posts-> title="NEw Element title Insert 2";
// 	$posts -> content = "Wow eloquent is really cool, look at this content 2";

// 	$posts->save();
// });

Route::get('/create',function()
{
	Post::create(['title'=>'the create method','content'=>'Wow, im learning alot with EDwin Diaz']);
});

//Updated

// Route::get('/update',function()
// {
// 	Post::where('id',2)->where('is_admin',0)->update(['title'=>'New PHP TITLE','content'=>'i love my instructor Ewin']);
// });

//Delete
Route::get('/delete',function()
{
	$post=Post::find(9);
	$post->delete();
});

//Delete 2

// Route::get('/delete2',function()
// {
// 	Post::destroy([2,5]);//cuando conoces la llave
// });

Route::get('/softdelete', function()
{
	Post::find(7)->delete();

});

// Route::get('/readsoftdelete',function()
// {
// 	// $posts=Post::find(6);
// 	// return $posts;

// 	// $posts=Post::withTrashed()->where('id',6)->get();
// 	// return $posts;

// //varios
// 	$posts=Post::onlyTrashed()->where('is_admin',0)->get();
// 	return $posts;
// });

// Route::get('/restore',function()
// {
// 	Post::withTrashed()->where('is_admin',0)->restore();
// });

Route::get('forcedelete',function()
{
	Post::onlyTrashed()->where('is_admin',0)->forceDelete();
});

