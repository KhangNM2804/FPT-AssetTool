<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('staff.dashboard.indexExpenseRoom'));
});

// Home > Borrow
Breadcrumbs::for('borrow', function ($trail) {
    $trail->parent('home');
    $trail->push('Borrow', route('staff.borrow.borrows.index'));
});
Breadcrumbs::for('asset', function ($trail) {
    $trail->parent('home');
    $trail->push('Asset', route('staff.asset.asset.index'));
});
Breadcrumbs::for('group-asset', function ($trail) {
    $trail->parent('home');
    $trail->push('GroupAsset', route('staff.asset.group-assets.index'));
});
Breadcrumbs::for('category-asset', function ($trail) {
    $trail->parent('home');
    $trail->push('CategoryAsset', route('staff.asset.category-assets.index'));
});
Breadcrumbs::for('borrowed-asset', function ($trail) {
    $trail->parent('home');
    $trail->push('BorrowedAsset', route('staff.asset.borrowed-asset.index'));
});
Breadcrumbs::for('handover', function ($trail) {
    $trail->parent('home');
    $trail->push('Handover', route('staff.asset.handover.index'));
});
Breadcrumbs::for('semester', function ($trail) {
    $trail->parent('home');
    $trail->push('Semester', route('staff.semester.semesters.index'));
});
Breadcrumbs::for('categoryrooms', function ($trail) {
    $trail->parent('home');
    $trail->push('CategoryRoom', route('staff.locate.categoryrooms.index'));
});
Breadcrumbs::for('room', function ($trail) {
    $trail->parent('home');
    $trail->push('Room', route('staff.locate.rooms.index'));
});
Breadcrumbs::for('users', function ($trail) {
    $trail->parent('home');
    $trail->push('Room', route('staff.users.users.index'));
});