<?php

try {
    Breadcrumbs::for ('admin.dashboard', function($trail) {
        $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException $e) {
}

try {
    Breadcrumbs::for ('admin.category.index', function($trail) {
        $trail->push('Category List', route('admin.category.index'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException $e) {
}

try {
    Breadcrumbs::for ('admin.category.create', function($trail) {
        $trail->push('Add category', route('admin.category.create'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException $e) {
}

try {
    Breadcrumbs::for ('admin.category.edit', function($trail) {
        $trail->push('Update Category', route('admin.category.edit'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException $e) {
}

try {
    Breadcrumbs::for ('admin.design.index', function($trail) {
        $trail->push('Design List', route('admin.design.index'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException $e) {
}
try {
    Breadcrumbs::for ('admin.design.create', function($trail) {
        $trail->push('Add Design', route('admin.design.index'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException $e) {
}

try {
    Breadcrumbs::for ('admin.design.edit', function($trail) {
        $trail->push('Update design', route('admin.design.edit'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException $e) {
}
try {
    Breadcrumbs::for ('admin.project.index', function($trail) {
        $trail->push('Project List', route('admin.project.index'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException $e) {
}
try {
    Breadcrumbs::for ('admin.project.create', function($trail) {
        $trail->push('Add Project', route('admin.project.index'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException $e) {
}


try {
    Breadcrumbs::for ('admin.project.edit', function($trail) {
        $trail->push('Update Project', route('admin.project.edit'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException $e) {
}

try {
    Breadcrumbs::for ('admin.quiz.index', function($trail) {
        $trail->push('Quiz Emails List', route('admin.quiz.index'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException $e) {
}

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';
