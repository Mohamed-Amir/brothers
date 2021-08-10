<?php

Route::post('/login', 'AuthController@login')->name('admin.login');

Route::get('/admin/login', function () {
    return view('Admin.loginAdmin');
});
Route::prefix('Admin')->group(function () {
    Route::get('/login', function () {
        return view('Admin.loginAdmin');
    });
    Route::group(['middleware' => 'roles', 'roles' => ['Admin']], function () {

        Route::get('/logout/logout', 'AuthController@logout')->name('user.logout');
        Route::get('/home', 'AuthController@index')->name('admin.dashboard');

        // Profile Route
        Route::prefix('profile')->group(function () {
            Route::get('/index', 'profileController@index')->name('profile.index');
            Route::post('/index', 'profileController@update')->name('profile.update');
        });

        // Admin Routes
        Route::prefix('Admin')->group(function () {
            Route::get('/index', 'AdminController@index')->name('Admin.index');
            Route::get('/allData', 'AdminController@allData')->name('Admin.allData');
            Route::post('/create', 'AdminController@create')->name('Admin.create');
            Route::get('/edit/{id}', 'AdminController@edit')->name('Admin.edit');
            Route::post('/update', 'AdminController@update')->name('Admin.update');
            Route::get('/destroy/{id}', 'AdminController@destroy')->name('Admin.destroy');
        });

        /** Socail */
        Route::prefix('Socail')->group(function () {
            Route::get('/index', 'SocailController@index')->name('Socail.index');
            Route::get('/allData', 'SocailController@allData')->name('Socail.allData');
            Route::post('/create', 'SocailController@create')->name('Socail.create');
            Route::get('/edit/{id}', 'SocailController@edit')->name('Socail.edit');
            Route::post('/update', 'SocailController@update')->name('Socail.update');
            Route::get('/destroy/{id}', 'SocailController@destroy')->name('Socail.destroy');
        });

        /** Client */
        Route::prefix('Client')->group(function () {
            Route::get('/index', 'ClientController@index')->name('Client.index');
            Route::get('/allData', 'ClientController@allData')->name('Client.allData');
            Route::post('/create', 'ClientController@create')->name('Client.create');
            Route::get('/edit/{id}', 'ClientController@edit')->name('Client.edit');
            Route::post('/update', 'ClientController@update')->name('Client.update');
            Route::get('/destroy/{id}', 'ClientController@destroy')->name('Client.destroy');
        });
        /** Subscribe */
        Route::prefix('Subscribe')->group(function () {
            Route::get('/index', 'SubscribeController@index')->name('Subscribe.index');
            Route::get('/allData', 'SubscribeController@allData')->name('Subscribe.allData');
            Route::get('/destroy/{id}', 'SubscribeController@destroy')->name('Subscribe.destroy');
            Route::get('/show/{id}', 'SubscribeController@show')->name('Subscribe.show');
            Route::get('/ChangeStatus/{id}', 'SubscribeController@ChangeStatus')->name('Subscribe.ChangeStatus');
        });

        /** Contact */
        Route::prefix('Contact')->group(function () {
            Route::get('/index', 'ContactController@index')->name('Contact.index');
            Route::get('/allData', 'ContactController@allData')->name('Contact.allData');
            Route::get('/destroy/{id}', 'ContactController@destroy')->name('Contact.destroy');
            Route::get('/show/{id}', 'ContactController@show')->name('Contact.show');
        });

        /** Slider Route */
        Route::prefix('Slider')->group(function () {
            Route::get('/index', 'SliderController@index')->name('Slider.index');
            Route::get('/allData', 'SliderController@allData')->name('Slider.allData');
            Route::post('/create', 'SliderController@create')->name('Slider.create');
            Route::get('/edit/{id}', 'SliderController@edit')->name('Slider.edit');
            Route::post('/update', 'SliderController@update')->name('Slider.update');
            Route::get('/destroy/{id}', 'SliderController@destroy')->name('Slider.destroy');
            Route::get('/ChangeStatus/{id}', 'SliderController@ChangeStatus')->name('Slider.ChangeStatus');
        });

        /** Values Route */
        Route::prefix('Values')->group(function () {
            Route::get('/index', 'ValuesController@index')->name('Values.index');
            Route::get('/allData', 'ValuesController@allData')->name('Values.allData');
            Route::post('/create', 'ValuesController@create')->name('Values.create');
            Route::get('/edit/{id}', 'ValuesController@edit')->name('Values.edit');
            Route::post('/update', 'ValuesController@update')->name('Values.update');
            Route::get('/destroy/{id}', 'ValuesController@destroy')->name('Values.destroy');
            Route::get('/ChangeStatus/{id}', 'ValuesController@ChangeStatus')->name('Values.ChangeStatus');
        });

        /** Voulnter Route */
        Route::prefix('Voulnter')->group(function () {
            Route::get('/index', 'VoulnterController@index')->name('Voulnter.index');
            Route::get('/allData', 'VoulnterController@allData')->name('Voulnter.allData');
            Route::post('/create', 'VoulnterController@create')->name('Voulnter.create');
            Route::get('/edit/{id}', 'VoulnterController@edit')->name('Voulnter.edit');
            Route::post('/update', 'VoulnterController@update')->name('Voulnter.update');
            Route::get('/destroy/{id}', 'VoulnterController@destroy')->name('Voulnter.destroy');
            Route::get('/ChangeStatus/{id}', 'VoulnterController@ChangeStatus')->name('Voulnter.ChangeStatus');
        });

        /** Team Route */
        Route::prefix('Team')->group(function () {
            Route::get('/index', 'TeamController@index')->name('Team.index');
            Route::get('/allData', 'TeamController@allData')->name('Team.allData');
            Route::post('/create', 'TeamController@create')->name('Team.create');
            Route::get('/edit/{id}', 'TeamController@edit')->name('Team.edit');
            Route::post('/update', 'TeamController@update')->name('Team.update');
            Route::get('/destroy/{id}', 'TeamController@destroy')->name('Team.destroy');
            Route::get('/ChangeStatus/{id}', 'TeamController@ChangeStatus')->name('Team.ChangeStatus');
            Route::get('/view/{id}', 'TeamController@view')->name('Team.View');
        });

        /** BlogCat Route */
        Route::prefix('BlogCat')->group(function () {
            Route::get('/index', 'BlogCatController@index')->name('BlogCat.index');
            Route::get('/allData', 'BlogCatController@allData')->name('BlogCat.allData');
            Route::post('/create', 'BlogCatController@create')->name('BlogCat.create');
            Route::get('/edit/{id}', 'BlogCatController@edit')->name('BlogCat.edit');
            Route::post('/update', 'BlogCatController@update')->name('BlogCat.update');
            Route::get('/destroy/{id}', 'BlogCatController@destroy')->name('BlogCat.destroy');
        });

        /** Blog Route */
        Route::prefix('Blog')->group(function () {
            Route::get('/index', 'BlogController@index')->name('Blog.index');
            Route::get('/allData', 'BlogController@allData')->name('Blog.allData');
            Route::post('/create', 'BlogController@create')->name('Blog.create');
            Route::get('/edit/{id}', 'BlogController@edit')->name('Blog.edit');
            Route::post('/update', 'BlogController@update')->name('Blog.update');
            Route::get('/destroy/{id}', 'BlogController@destroy')->name('Blog.destroy');
            Route::get('/ChangeStatus/{id}', 'BlogController@ChangeStatus')->name('Blog.ChangeStatus');
        });

        /** Skills Route */
        Route::prefix('Skills')->group(function () {
            Route::get('/allData/{id}', 'SkillsController@allData')->name('Skills.allData');
            Route::post('/create', 'SkillsController@create')->name('Skills.create');
            Route::get('/edit/{id}', 'SkillsController@edit')->name('Skills.edit');
            Route::post('/update', 'SkillsController@update')->name('Skills.update');
            Route::get('/destroy/{id}', 'SkillsController@destroy')->name('Skills.destroy');
        });

        /** Work Route */
        Route::prefix('Work')->group(function () {
            Route::get('/allData/{id}', 'WorkController@allData')->name('Work.allData');
            Route::post('/create', 'WorkController@create')->name('Work.create');
            Route::get('/edit/{id}', 'WorkController@edit')->name('Work.edit');
            Route::post('/update', 'WorkController@update')->name('Work.update');
            Route::get('/destroy/{id}', 'WorkController@destroy')->name('Work.destroy');
        });

        /** Cat_reports Route */
        Route::prefix('Cat_reports')->group(function () {
            Route::get('/index', 'Cat_reportsController@index')->name('Cat_reports.index');
            Route::get('/allData', 'Cat_reportsController@allData')->name('Cat_reports.allData');
            Route::post('/create', 'Cat_reportsController@create')->name('Cat_reports.create');
            Route::get('/edit/{id}', 'Cat_reportsController@edit')->name('Cat_reports.edit');
            Route::post('/update', 'Cat_reportsController@update')->name('Cat_reports.update');
            Route::get('/destroy/{id}', 'Cat_reportsController@destroy')->name('Cat_reports.destroy');
        });

        /** Reports Route */
        Route::prefix('Reports')->group(function () {
            Route::get('/index', 'ReportsController@index')->name('Reports.index');
            Route::get('/allData', 'ReportsController@allData')->name('Reports.allData');
            Route::post('/create', 'ReportsController@create')->name('Reports.create');
            Route::get('/edit/{id}', 'ReportsController@edit')->name('Reports.edit');
            Route::post('/update', 'ReportsController@update')->name('Reports.update');
            Route::get('/destroy/{id}', 'ReportsController@destroy')->name('Reports.destroy');
        });

        /** About_us Route */
        Route::prefix('About_us')->group(function () {
            Route::get('/index', 'About_usController@index')->name('About_us.index');
            Route::get('/allData', 'About_usController@allData')->name('About_us.allData');
            Route::get('/edit/{id}', 'About_usController@edit')->name('About_us.edit');
            Route::post('/update', 'About_usController@update')->name('About_us.update');
        });

        /** Activities Route */
        Route::prefix('Activities')->group(function () {
            Route::get('/index', 'ActivitiesController@index')->name('Activities.index');
            Route::get('/allData', 'ActivitiesController@allData')->name('Activities.allData');
            Route::post('/create', 'ActivitiesController@create')->name('Activities.create');
            Route::get('/edit/{id}', 'ActivitiesController@edit')->name('Activities.edit');
            Route::post('/update', 'ActivitiesController@update')->name('Activities.update');
            Route::get('/destroy/{id}', 'ActivitiesController@destroy')->name('Activities.destroy');
        });

        /** Testimonials Route */
        Route::prefix('Testimonials')->group(function () {
            Route::get('/index', 'TestimonialsController@index')->name('Testimonials.index');
            Route::get('/allData', 'TestimonialsController@allData')->name('Testimonials.allData');
            Route::post('/create', 'TestimonialsController@create')->name('Testimonials.create');
            Route::get('/edit/{id}', 'TestimonialsController@edit')->name('Testimonials.edit');
            Route::post('/update', 'TestimonialsController@update')->name('Testimonials.update');
            Route::get('/destroy/{id}', 'TestimonialsController@destroy')->name('Testimonials.destroy');
        });
    });
});

