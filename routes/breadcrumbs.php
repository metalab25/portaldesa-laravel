<?php // routes/breadcrumbs.php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Dashboard > Home
Breadcrumbs::for('desa', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Desa');
});

// Desa > Identitdas
Breadcrumbs::for('identitas', function (BreadcrumbTrail $trail) {
    $trail->parent('desa');
    $trail->push('Identitas Desa', url('desa/identitas'));
});

// Desa > Pemerintah
Breadcrumbs::for('pamong', function (BreadcrumbTrail $trail) {
    $trail->parent('desa');
    $trail->push('Pemerintahan', url('desa/pamong'));
});

// Wilayah
Breadcrumbs::for('wilayah', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Wilayah');
});

Breadcrumbs::for('cluster', function (BreadcrumbTrail $trail) {
    $trail->parent('wilayah');
    $trail->push('Cluster', url('desa/wilayah'));
});

Breadcrumbs::for('rw', function (BreadcrumbTrail $trail) {
    $trail->parent('wilayah');
    $trail->push('RW', url('wilayah/rw'));
});

Breadcrumbs::for('rt', function (BreadcrumbTrail $trail) {
    $trail->parent('wilayah');
    $trail->push('RT', url('wilayah/rt'));
});

// Dashboard > Kependudukan
Breadcrumbs::for('adminduk', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Kependudukan');
});

Breadcrumbs::for('keluarga', function (BreadcrumbTrail $trail) {
    $trail->parent('adminduk');
    $trail->push('Keluarga', url('adminduk/keluarga'));
});

Breadcrumbs::for('penduduk', function (BreadcrumbTrail $trail) {
    $trail->parent('adminduk');
    $trail->push('Penduduk', url('adminduk/penduduk'));
});

// Dashboard > Sekretariat
Breadcrumbs::for('secretariat', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Sekretariat');
});

// Dashboard > Sekretariat > Klasifikasi Surat
Breadcrumbs::for('klasifikasi', function (BreadcrumbTrail $trail) {
    $trail->parent('secretariat');
    $trail->push('Klasifikasi Surat', url('sekretariat/klasifikasi'));
});

// Dashboard > Sekretariat > Surat Keluar
Breadcrumbs::for('surat_keluar', function (BreadcrumbTrail $trail) {
    $trail->parent('secretariat');
    $trail->push('Surat Keluar', url('sekretariat/surat_keluar'));
});

// Dashboard > Sekretariat > Surat Masuk
Breadcrumbs::for('surat_masuk', function (BreadcrumbTrail $trail) {
    $trail->parent('secretariat');
    $trail->push('Surat Masuk', url('sekretariat/surat_masuk'));
});

// Dashboard > Sekretariat > Peraturan Desa
Breadcrumbs::for('perdes', function (BreadcrumbTrail $trail) {
    $trail->parent('secretariat');
    $trail->push('Peraturan', url('sekretariat/perdes'));
});

// Dashboard > Webmin
Breadcrumbs::for('webmin', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Webmin');
});

Breadcrumbs::for('article', function (BreadcrumbTrail $trail) {
    $trail->parent('webmin');
    $trail->push('Artikel', url('webmin/posts'));
});

Breadcrumbs::for('categories', function (BreadcrumbTrail $trail) {
    $trail->parent('webmin');
    $trail->push('Kategori', url('webmin/categories'));
});

Breadcrumbs::for('documents', function (BreadcrumbTrail $trail) {
    $trail->parent('webmin');
    $trail->push('Dokumen Publik', url('webmin/documents'));
});

// Dashboard > Setting
Breadcrumbs::for('setting', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Setting');
});

Breadcrumbs::for('application', function (BreadcrumbTrail $trail) {
    $trail->parent('setting');
    $trail->push('Aplikasi', url('setting/application'));
});

Breadcrumbs::for('users', function (BreadcrumbTrail $trail) {
    $trail->parent('setting');
    $trail->push('Pengguna', url('setting/users'));
});
