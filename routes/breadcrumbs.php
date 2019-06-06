<?php

// Admin
Breadcrumbs::for('admin', function ($trail) {
    $trail->push('Admin', route('adminv2'));
});
/*********** USERS ***********/

// Admin > Users
Breadcrumbs::for('users', function ($trail) {
    $trail->parent('admin');
    $trail->push('Users', route('users.index'));
});
// Admin > Users > Create
Breadcrumbs::for('createuser', function ($trail) {
    $trail->parent('users');
    $trail->push('Create', route('users.create'));
});
// Admin > Users > Edit
Breadcrumbs::for('edituser', function ($trail, $id) {
    $trail->parent('users');
    $trail->push('Edit', route('users.edit', $id));
});

/*********** END USERS ***********/

/*********** ROLES ***********/

// Admin > Roles
Breadcrumbs::for('roles', function ($trail) {
    $trail->parent('admin');
    $trail->push('Roles', route('roles.index'));
});
// Admin > Roles > Create
Breadcrumbs::for('createrole', function ($trail) {
    $trail->parent('roles');
    $trail->push('Create', route('roles.create'));
});
// Admin > Roles > Edit
Breadcrumbs::for('editrole', function ($trail, $id) {
    $trail->parent('roles');
    $trail->push('Edit', route('roles.edit', $id));
});

/*********** END ROLES ***********/

/*********** COMICS ***********/

// Admin > Comics
Breadcrumbs::for('comics', function ($trail) {
    $trail->parent('admin');
    $trail->push('Comics', route('comics.index'));
});
// Admin > Comics > Create
Breadcrumbs::for('createcomic', function ($trail) {
    $trail->parent('comics');
    $trail->push('Create', route('comics.create'));
});
// Admin > Comics > Edit
Breadcrumbs::for('editcomic', function ($trail, $id) {
    $trail->parent('comics');
    $trail->push('Edit', route('comics.edit', $id));
});

/*********** COMICS ***********/

// Admin > Authors
Breadcrumbs::for('authors', function ($trail) {
    $trail->parent('admin');
    $trail->push('Authors', route('authors.index'));
});
// Admin > Authors > Create
Breadcrumbs::for('createauthor', function ($trail) {
    $trail->parent('authors');
    $trail->push('Create', route('authors.create'));
});
// Admin > Authors > Edit
Breadcrumbs::for('editauthor', function ($trail, $id) {
    $trail->parent('authors');
    $trail->push('Edit', route('authors.edit', $id));
});

/*********** END AUTHORS ***********/

/*********** SERIES ***********/

// Admin > Series
Breadcrumbs::for('series', function ($trail) {
    $trail->parent('admin');
    $trail->push('Series', route('series.index'));
});
// Admin > Series > Create
Breadcrumbs::for('createserie', function ($trail) {
    $trail->parent('series');
    $trail->push('Create', route('series.create'));
});
// Admin > Series > Edit
Breadcrumbs::for('editserie', function ($trail, $id) {
    $trail->parent('series');
    $trail->push('Edit', route('series.edit', $id));
});

/*********** END SERIES ***********/

/*********** PUBLISHER ***********/

// Admin > Publisher
Breadcrumbs::for('publishers', function ($trail) {
    $trail->parent('admin');
    $trail->push('Publisher', route('publishers.index'));
});
// Admin > Publisher > Create
Breadcrumbs::for('createpublisher', function ($trail) {
    $trail->parent('publishers');
    $trail->push('Create', route('publishers.create'));
});
// Admin > Publisher > Edit
Breadcrumbs::for('editpublisher', function ($trail, $id) {
    $trail->parent('publishers');
    $trail->push('Edit', route('publishers.edit', $id));
});

/*********** END PUBLISHER ***********/

/*********** GENRES ***********/

// Admin > Genres
Breadcrumbs::for('genres', function ($trail) {
    $trail->parent('admin');
    $trail->push('Genres', route('genres.index'));
});
// Admin > Genres > Create
Breadcrumbs::for('creategenre', function ($trail) {
    $trail->parent('genres');
    $trail->push('Create', route('genres.create'));
});
// Admin > Genres > Create
Breadcrumbs::for('editgenre', function ($trail, $id) {
    $trail->parent('genres');
    $trail->push('Edit', route('genres.edit', $id));
});


/********** END GENRES *************/

// Home > Blog
Breadcrumbs::for('blog', function ($trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
});