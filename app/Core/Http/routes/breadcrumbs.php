<?php

// Home
Breadcrumbs::register('/', function($breadcrumbs)
{
    $breadcrumbs->push('Site', url('/'));
});

// / > About
Breadcrumbs::register('about', function($breadcrumbs)
{
    $breadcrumbs->parent('/');
    $breadcrumbs->push('About', route('about'));
});

// / > Admin
Breadcrumbs::register('admin', function($breadcrumbs)
{
    $breadcrumbs->parent('/');
    $breadcrumbs->push('Admin Panel', route('admin::dashboard'));
});

// / > [Category]
Breadcrumbs::register('categories', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Categories', route('admin::categories::index'));
});

// / > [Media]
Breadcrumbs::register('media', function($breadcrumbs, $disk)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Media', route('admin::media::index', [$disk]));
});

// / > [Media]
Breadcrumbs::register('reviews', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Product Review', route('admin::reviews::index'));
});

// / > [Attribute]
Breadcrumbs::register('attributes', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Attributes', route('admin::attributes::index'));
});

// / > [Attribute Groups]
Breadcrumbs::register('attribute groups', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Attribute Groups', route('admin::attribute_groups::index'));
});
// / > [Logs]
Breadcrumbs::register('LogViewer', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('LogViewer', route('log-viewer::dashboard'));
});

Breadcrumbs::register('LogsDashboard', function($breadcrumbs)
{
    $breadcrumbs->parent('LogViewer');
    $breadcrumbs->push('LogsDashboard', route('log-viewer::logs.list'));
});

Breadcrumbs::register('Logs', function($breadcrumbs)
{
    $breadcrumbs->parent('LogViewer');
    $breadcrumbs->push(Request::segment(3), route('log-viewer::logs.show', Request::segment(3)));
});
// / > [roles]
Breadcrumbs::register('roles', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Roles', route('admin::roles::index'));
});

// / > [permissions]
Breadcrumbs::register('permissions', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Privileges', route('admin::permissions::index'));
});

// / > [permissions]
Breadcrumbs::register('users', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Users', route('admin::users::index'));
});
Breadcrumbs::register('products', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Products', route('admin::products::index'));
});

// / > [Category] > [Page]
Breadcrumbs::register('page', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('categories', $page->category);
    $breadcrumbs->push($page->title, route('page', $page->id));
});

// SITE Section
// Home
Breadcrumbs::register('Home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('site::'));
});

// / > Site
Breadcrumbs::register('Products', function($breadcrumbs, $category=null)
{
    $breadcrumbs->parent('Home');
    if(!$category instanceof \App\Core\Models\Category)
    {
        $breadcrumbs->push('Products', route('site::products::index'));
    }  else {
        $breadcrumbs->push('Products', route('site::products::index'));
        pushParentCategoryBreadcrumbs($category, $breadcrumbs);
        $breadcrumbs->push($category->name, route('site::products::index', [$category->unique_id]));
    }
});

Breadcrumbs::register('Carts', function ($breadcrumbs) {
    $breadcrumbs->parent('Home');
    $breadcrumbs->push('Cart', route('site::cart::show'));
});
