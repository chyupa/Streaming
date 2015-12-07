// variables & plugins
var gulp = require('gulp'),
    bowerDir = 'bower_components/',
    assetFolder = 'resources/assets/',
    plugins = require('gulp-load-plugins')();

// less to css public
gulp.task('styles', function () {
    gulp.src([
            assetFolder + 'less/**/*.less'
        ])
        .pipe(plugins.less())
        .pipe(plugins.minifyCss())
        .pipe(plugins.concat('app.css'))
        .pipe(gulp.dest('public/assets/css'))
});

// jquery to js public
gulp.task('scripts', function () {
    gulp.src(assetFolder + 'js/main.js')
        .pipe(gulp.dest('public/assets/js'))
});

// angular to js public
gulp.task('angular', function () {
    gulp.src(assetFolder + 'angular/**/*.js')
        .pipe(plugins.concat('app.js'))
        .pipe(gulp.dest('public/assets/js'))
});

// lib to css public
gulp.task('libStyles', function () {
    gulp.src([
            bowerDir + 'bootstrap/dist/css/bootstrap.min.css',
            bowerDir + 'bootstrap/dist/css/bootstrap-theme.min.css'
        ])
        .pipe(plugins.concat('style.css'))
        .pipe(gulp.dest('public/assets/css'));
});

// lib to js public
gulp.task('libScripts', function () {
    gulp.src([
            bowerDir + 'angular/angular.min.js',
            bowerDir + 'jquery/dist/jquery.min.js',
            bowerDir + 'bootstrap/dist/js/bootstrap.min.js'
        ])
        .pipe(plugins.concat('lib.js'))
        .pipe(gulp.dest('public/assets/js'));
    JSON.stringify(plugins.concat('lib.js'));
});

// default task
gulp.task('default', function () {
    gulp.start('styles', 'scripts', 'libScripts', 'libStyles', 'angular');
});

// watcher
gulp.task('watch', function () {
    gulp.watch(assetFolder + 'less/**/*.less', ['styles']);
    gulp.watch(assetFolder + 'js/main.js', ['scripts']);
    gulp.watch(assetFolder + 'ng/**/*.js', ['angular']);
});