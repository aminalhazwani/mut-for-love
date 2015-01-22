// include gulp and plugins
var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    rename = require('gulp-rename'),
    notify = require('gulp-notify'),
    livereload = require('gulp-livereload'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify');
    uncss = require('gulp-uncss');

// gulp styles task
gulp.task('styles', function() {
  return gulp.src('src/sass/main.scss')
    .pipe(sass({ 
        style: 'expanded', 
        "sourcemap=none": true
    }))
    .pipe(autoprefixer())
    .pipe(rename({suffix: '.min'}))
    .pipe(minifycss())
    .pipe(gulp.dest('assets/styles'))
    .pipe(notify({ message: 'Styles task completed' }));
});

// gulp vendor task
gulp.task('vendor', function() {
  return gulp.src('src/js/vendor/*.js')
    .pipe(concat('vendor.js'))
    .pipe(rename({ suffix: '.min' }))
    .pipe(uglify())
    .pipe(gulp.dest('assets/scripts/vendor'))
    .pipe(notify({ message: 'Vendor task completed' }));
});

// gulp scripts task
gulp.task('scripts', function() {
  return gulp.src('src/js/*.js')
    .pipe(concat('main.js'))
    .pipe(rename({ suffix: '.min' }))
    .pipe(uglify())
    .pipe(gulp.dest('assets/scripts'))
    .pipe(notify({ message: 'Scripts task completed' }));
});

// gulp watch task and livereolad task
gulp.task('watch', function() {
    gulp.watch('src/sass/**/*.scss', ['styles']);
    gulp.watch('src/js/vendor/*.js', ['vendor']);
    gulp.watch('src/js/*.js', ['scripts']);

    // var server = livereload();
    // gulp.watch(['src/**']).on('change', function(file) {
    // server.changed(file.path);
    // });

    gulp.start('styles', 'scripts', 'vendor');
});

// gulp default task
gulp.task('default', function() {
    gulp.start('styles');
});