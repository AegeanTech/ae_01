<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
 * Model binding into route
 */
Route::model('blogcategory', 'App\BlogCategory');
Route::model('blog', 'App\Blog');
Route::model('file', 'App\File');
Route::model('site', 'App\Site');

Route::pattern('slug', '[a-z0-9- _]+');

Route::group(array('prefix' => 'admin'), function () {

	# Error pages should be shown without requiring login
	Route::get('404', function () {
	    return View('admin/404');
	});
	Route::get('500', function () {
	    return View::make('admin/500');
	});

	# Lock screen
	Route::get('lockscreen', function () {
	    return View::make('admin/lockscreen');
	});

		# All basic routes defined here
	Route::get('signin', array('as' => 'signin','uses' => 'AuthController@getSignin'));
	Route::post('signin','AuthController@postSignin');
	Route::post('signup',array('as' => 'signup','uses' => 'AuthController@postSignup'));
	Route::post('forgot-password',array('as' => 'forgot-password','uses' => 'AuthController@postForgotPassword'));
	Route::get('login2', function () {
	    return View::make('admin/login2');
	});

//	# Maintenance mode
//	Route::get('signin', function () {
//		return View::make('admin/maintenance');
//	});
//	Route::get('signup', function () {
//		return View::make('admin/maintenance');
//	});

	# Register2
	Route::get('register2', function () {
	    return View::make('admin/register2');
	});
	Route::post('register2',array('as' => 'register2','uses' => 'AuthController@postRegister2'));
	
	# Forgot Password Confirmation
    Route::get('forgot-password/{userId}/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'AuthController@getForgotPasswordConfirm'));
    Route::post('forgot-password/{userId}/{passwordResetCode}', 'AuthController@postForgotPasswordConfirm');

    # Logout
	Route::get('logout', array('as' => 'logout','uses' => 'AuthController@getLogout'));

	# Account Activation
    Route::get('activate/{userId}/{activationCode}', array('as' => 'activate', 'uses' => 'AuthController@getActivate'));

    # Dashboard / Index
//	Route::get('/', array('as' => 'dashboard','uses' => 'JoshController@showHome'));
	Route::get('/', array('as' => 'dashboard','uses' => 'SiteController@showHome'));

//	Route::get('context', array('as' => 'dashboard','uses' => 'SiteController@showHelp'));

	# Template
	Route::get('template', 'TemplateController@create');
	Route::get('preview', 'TemplateController@preview');

	# Geolocation
	Route::post('ajax/postalcode','GeoController@findStateCity');

	# Edit
	Route::match(array('GET', 'POST'), 'edit', 'EditController@showEdit');
	Route::post('update', 'EditController@storeEdit');

	# Gallery
    Route::get('dropzone', 'DropzoneController@index');
    Route::post('dropzone/uploadFiles', 'DropzoneController@uploadFiles');

    # Upload-Images
    Route::get('upload', ['as' => 'upload', 'uses' => 'ImageController@getUpload']);
    Route::get('upload/show', ['as' => 'existing-files', 'uses' => 'ImageController@showExisting']);
    Route::get('upload/manage', ['as' => 'manage-files', 'uses' => 'ImageController@manageExisting']);
	Route::post('upload/manage', ['as' => 'save-manage', 'uses' => 'ImageController@saveExisting']);
    Route::post('upload/upload', ['as' => 'upload-post', 'uses' =>'ImageController@postUpload']);
    Route::post('upload/upload/delete', ['as' => 'upload-remove', 'uses' =>'ImageController@deleteUpload']);

//	# Upload-Files
//	Route::get('upload/file', ['as' => 'upload', 'uses' => 'FileController@show']);

	/*routes for file*/
	Route::group(array('prefix' => 'file'), function () {
        Route::get('/', ['as' => 'upload', 'uses' => 'FileController@show']);
        Route::get('manage', ['as' => 'manage', 'uses' => 'FileController@manage']);
        Route::post('manage', ['as' => 'save', 'uses' => 'FileController@save']);
		Route::post('create', 'FileController@postCreate');
		Route::post('createmulti', 'FileController@postFilesCreate');
		Route::delete('delete', 'FileController@delete');
	});

	# Help
	Route::get('help', 'HelpController@showHelp');
	Route::get('context', 'HelpController@showContext');

	# Wizard
	Route::get('store', 'WizardController@createWizard');
	Route::get('wizard', 'WizardController@showWizard');
	Route::post('store', 'WizardController@storeWizard');

    /* laravel example routes */
    # datatables
    Route::get('datatables', 'DataTablesController@index');
    Route::get('datatables/data', array('as' => 'admin.datatables.data', 'uses' => 'DataTablesController@data'));

	# User Management
    Route::group(array('prefix' => 'users'), function () {
    	Route::get('/', array('as' => 'users', 'uses' => 'UsersController@getIndex'));
    	Route::get('create', array('as' => 'create/user', 'uses' => 'UsersController@getCreate'));
        Route::post('create', 'UsersController@postCreate');
        Route::get('{userId}/edit', array('as' => 'users.update', 'uses' => 'UsersController@getEdit'));
        Route::post('{userId}/edit', 'UsersController@postEdit');
    	Route::get('{userId}/delete', array('as' => 'delete/user', 'uses' => 'UsersController@getDelete'));
		Route::get('{userId}/confirm-delete', array('as' => 'confirm-delete/user', 'uses' => 'UsersController@getModalDelete'));
		Route::get('{userId}/restore', array('as' => 'restore/user', 'uses' => 'UsersController@getRestore'));
		Route::get('{userId}', array('as' => 'users.show', 'uses' => 'UsersController@show'));
	});
	Route::get('deleted_users',array('as' => 'deleted_users','before' => 'Sentinel', 'uses' => 'UsersController@getDeletedUsers'));

	# Group Management
    Route::group(array('prefix' => 'groups'), function () {
        Route::get('/', array('as' => 'groups', 'uses' => 'GroupsController@getIndex'));
        Route::get('create', array('as' => 'create/group', 'uses' => 'GroupsController@getCreate'));
        Route::post('create', 'GroupsController@postCreate');
        Route::get('{groupId}/edit', array('as' => 'update/group', 'uses' => 'GroupsController@getEdit'));
        Route::post('{groupId}/edit', 'GroupsController@postEdit');
        Route::get('{groupId}/delete', array('as' => 'delete/group', 'uses' => 'GroupsController@getDelete'));
        Route::get('{groupId}/confirm-delete', array('as' => 'confirm-delete/group', 'uses' => 'GroupsController@getModalDelete'));
        Route::get('{groupId}/restore', array('as' => 'restore/group', 'uses' => 'GroupsController@getRestore'));
		Route::get('any_user', 'UsersController@getUserAccess');
		Route::get('admin_only', 'UsersController@getAdminOnlyAccess');
    });

	# Suburl Management
	Route::get('suburls', 'SuburlController@index');
	Route::get('suburls/data', array('as' => 'admin.suburl.data', 'uses' => 'SuburlController@data'));
    Route::get('suburls/suburl-list', array('as' => 'admin.suburl.suburl-list', 'uses' => 'SuburlController@suburlList'));
    Route::get('suburls/{sid}/edit', array('as' => 'admin.suburl.edit', 'uses' => 'SuburlController@edit'));
    Route::post('suburls/{sid}/edit', 'SuburlController@postEdit');
    Route::get('suburls/{sid}/edit/data', array('as' => 'admin.suburl.edit.data', 'uses' => 'SuburlController@editedata'));
	Route::post('suburls/save', 'SuburlController@save');
    Route::post('suburls/delete', 'SuburlController@delete');

    # Message Management
    Route::get('umessages', 'UmessageController@getList');
    Route::post('umessages/edit', 'UmessageController@edit');
	Route::get('umessages/{sid}/create', array('as' => 'admin.umessage.create', 'uses' => 'UmessageController@manageCreate'));
	Route::post('umessages/create', 'UmessageController@manageStore');
	Route::get('umessages/{sid}/list/{type}', array('as' => 'admin.umessage.list', 'uses' => 'UmessageController@manageList'));
	Route::get('umessages/{sid}/view', array('as' => 'admin.umessage.view', 'uses' => 'UmessageController@manageView'));
	Route::post('umessages/view/edit', 'UmessageController@manageEdit');

    # Request Management
    Route::get('urequests', 'UrequestController@index');
    Route::get('urequests/list', array('as' => 'user.urequest.list', 'uses' => 'UrequestController@getList'));
    Route::get('urequests/{rid}/view', array('as' => 'user.urequest.view', 'uses' => 'UrequestController@getView'));
    Route::post('urequests/save', 'UrequestController@storeUrequest');
    Route::get('urequests/manage/list/{action}', array('as' => 'user.urequest.manage.list', 'uses' => 'UrequestController@manageList'));
    Route::get('urequests/manage/{rid}/view', array('as' => 'user.urequest.manage.view', 'uses' => 'UrequestController@manageView'));
    Route::post('urequests/manage/{rid}/view', 'UrequestController@manageStore');


	# Config Management
	Route::get('suburls/{sid}/config', array('as' => 'admin.config', 'uses' => 'ConfigController@show'));
	Route::post('suburls/config', 'ConfigController@save');


    Route::get('suburls/{sid}/edit', array('as' => 'admin.suburl.edit', 'uses' => 'SuburlController@edit'));
    Route::post('suburls/{sid}/edit', 'SuburlController@postEdit');
    Route::get('suburls/{sid}/edit/data', array('as' => 'admin.suburl.edit.data', 'uses' => 'SuburlController@editedata'));
//    Route::post('suburls/save', 'SuburlController@save');
    Route::post('suburls/delete', 'SuburlController@delete');

    # Subscription Management
    Route::get('subscriptions', 'SubscriptionController@index');
    Route::get('subscriptions/data', array('as' => 'admin.subscription.data', 'uses' => 'SubscriptionController@data'));
//    Route::get('suburls/suburl-list', array('as' => 'admin.suburl.suburl-list', 'uses' => 'SuburlController@suburlList'));
	Route::get('subscriptions/{sid}/view', array('as' => 'admin.subscription.view', 'uses' => 'SubscriptionController@view'));
    Route::get('subscriptions/{sid}/edit', array('as' => 'admin.subscription.edit', 'uses' => 'SubscriptionController@edit'));
    Route::post('subscriptions', array('uses' => 'SubscriptionController@store'));
//    Route::post('suburls/{sid}/edit', 'SuburlController@postEdit');

//	Route::group(array('prefix' => 'suburls'), function () {
//		Route::get('/', array('as' => 'suburls', 'uses' => 'SuburlController@getIndex'));
//		Route::get('edit', array('as' => 'create/user', 'uses' => 'UsersController@getCreate'));
//		Route::post('edit', 'UsersController@postCreate');
//		Route::get('{suburl}/edit', array('as' => 'users.update', 'uses' => 'UsersController@getEdit'));
//		Route::post('{suburl}/edit', 'UsersController@postEdit');
//		Route::get('{suburl}/delete', array('as' => 'delete/user', 'uses' => 'UsersController@getDelete'));
//		Route::get('{suburl}/confirm-delete', array('as' => 'confirm-delete/user', 'uses' => 'UsersController@getModalDelete'));
//		Route::get('{suburl}', array('as' => 'users.show', 'uses' => 'UsersController@show'));
//	});

    /*routes for blog*/
	Route::group(array('prefix' => 'blog',), function () {
		Route::get('/', array('as' => 'blogs', 'uses' => 'BlogController@getIndex'));
		Route::get('create', array('as' => 'create/blog', 'uses' => 'BlogController@getCreate'));
		Route::post('create', 'BlogController@postCreate');
		Route::get('{blog}/edit', array('as' => 'update/blog', 'uses' => 'BlogController@getEdit'));
		Route::post('{blog}/edit', 'BlogController@postEdit');
		Route::get('{blog}/delete', array('as' => 'delete/blog', 'uses' => 'BlogController@getDelete'));
		Route::get('{blog}/confirm-delete', array('as' => 'confirm-delete/blog', 'uses' => 'BlogController@getModalDelete'));
		Route::get('{blog}/restore', array('as' => 'restore/blog', 'uses' => 'BlogController@getRestore'));
        Route::get('{blog}/show', array('as' => 'blog/show', 'uses' => 'BlogController@show'));
        Route::post('{blog}/storecomment', array('as' => 'restore/blog', 'uses' => 'BlogController@storecomment'));
	});

//    /*routes for blog category*/
//	Route::group(array('prefix' => 'blogcategory','before' => 'Sentinel'), function () {
//		Route::get('/', array('as' => 'groups', 'uses' => 'BlogCategoryController@getIndex'));
//		Route::get('create', array('as' => 'create/blogcategory', 'uses' => 'BlogCategoryController@getCreate'));
//		Route::post('create', 'BlogCategoryController@postCreate');
//		Route::get('{blogcategory}/edit', array('as' => 'update/blogcategory', 'uses' => 'BlogCategoryController@getEdit'));
//		Route::post('{blogcategory}/edit', 'BlogCategoryController@postEdit');
//		Route::get('{blogcategory}/delete', array('as' => 'delete/blogcategory', 'uses' => 'BlogCategoryController@getDelete'));
//		Route::get('{blogcategory}/confirm-delete', array('as' => 'confirm-delete/blogcategory', 'uses' => 'BlogCategoryController@getModalDelete'));
//		Route::get('{blogcategory}/restore', array('as' => 'restore/blogcategory', 'uses' => 'BlogCategoryController@getRestore'));
//	});

	// Route::post('crop_demo','JoshController@crop_demo');
	# Remaining pages will be called from below controller method
	# in real world scenario, you may be required to define all routes manually

	Route::get('{name?}', 'JoshController@showView');

	/*routes for file*/
	Route::group(array('prefix' => 'file'), function () {
		Route::post('create', 'FileController@postCreate');
		Route::post('createmulti', 'FileController@postFilesCreate');
		Route::delete('delete', 'FileController@delete');
	});

	Route::get('crop_demo', function () {
        return redirect('admin/imagecropping');
    });
    Route::post('crop_demo','JoshController@crop_demo');



	# Remaining pages will be called from below controller method
	# in real world scenario, you may be required to define all routes manually

	Route::get('{name?}', 'JoshController@showView');

});

#frontend views
//Route::get('/', array('as' => 'home', function () {
//    return View::make('index');
//}));

Route::get('blog', array('as' => 'blog', 'uses' => 'BlogController@getIndexFrontend'));
Route::get('blog/{slug}/tag', 'BlogController@getBlogTagFrontend');
Route::get('blogitem/{slug?}', 'BlogController@getBlogFrontend');
Route::post('blogitem/{blog}/comment', 'BlogController@storeCommentFrontend');


//Route::get('{name?}', 'JoshController@showFrontEndView');

# Frontend
Route::get('/', array('as' => 'home', function () {
	return View::make('pages.frontend.index');
}));

Route::get('/features', array('as' => 'home', function () {
	return View::make('pages.frontend.features');
}));

Route::get('/description', array('as' => 'home', function () {
	return View::make('pages.frontend.description');
}));

Route::get('/pricing', array('as' => 'home', function () {
	return View::make('pages.frontend.pricing');
}));

Route::get('/contact', array('as' => 'home', function () {
	return View::make('pages.frontend.contact');
}));
Route::post('/contact', 'ContactController@sendContactInfo');

Route::get('/login', array('as' => 'home', function () {
	return View::make('pages.frontend.login');
}));

Route::get('/register', array('as' => 'home', function () {
	return View::make('pages.frontend.register');
}));

Route::get('/cookies', array('as' => 'cookies', function () {
	return View::make('pages.frontend.cookies');
}));

	Route::get('/{name?}', 'FrontendController@showFrontend');

# Profile
	Route::get('site/{suburl}', 'ProfileController@showProfile');
	Route::post('site/{suburl}', 'ContactController@sendProfileMessage');

# End of frontend views