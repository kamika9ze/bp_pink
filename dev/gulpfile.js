var gulp = require('gulp'),
    compass = require('gulp-compass'),
    connect = require('gulp-connect'),
    concat = require('gulp-concat'),
    gutil = require('gulp-util');

var root = '../';

var html = ['*.html'],
    js = ['js/*.js'],
    css = ['css/*.css'],
    sass = ['sass/styles.scss'],
    sassSources = ['sass/*.scss'];

gulp.task('html', function() {
    gulp.src(html)
        .pipe(connect.reload())
});

gulp.task('sass', function() {
    gulp.src(sass)
        .pipe(compass({
            style: 'expanded',
            images: 'images',
            css: root+'css',
            sass: 'sass'
        }))
        .on('error', gutil.log)
        .pipe(connect.reload());
});

gulp.task('css', function() {
    gulp.src(css)
        .pipe(connect.reload());
});

gulp.task('js', function() {
    gulp.src(js)
        .pipe(concat('script.js'))
        .pipe(gulp.dest(root+'js'))
        .pipe(connect.reload());
});

gulp.task('connect', function() {
    connect.server({
        livereload: true,
        port: 3030,
        root: '.'
    });
});

gulp.task('watch', function() {
    gulp.watch(html, ['html']);
    gulp.watch(js, ['js']);
    gulp.watch(css, ['css']);
    gulp.watch(sass, ['sass']);
    gulp.watch(sassSources, ['sass']);
});

gulp.task('default', ['html', 'js', 'sass', 'connect', 'watch']);