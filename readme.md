Laravel Make View
=================

This package add funcionality to artisan of create view files.

Installation
------------

Add the `LaravelMakeView\Provider\MakeViewProvider::class` to array of service provider on config/app.php of your application.

Use
---
Invoke de command with: `php artisan make:view name_of_view [layout] [section]`

The name of view can separate the paths with points, like: `php artisan make:view site.home`. This create view on `resources/views/site/home.blade.php`, or `php artisan make:view site.users.list` on `resources/views/site/users/list.blade.php`.

You can use two optionals parameters: layout and section. The parameter layout extends the main layout of application (or other layout), and section of content to show on main layout.

Requirements
------------

Laravel: 5.1.* || 5.2.*