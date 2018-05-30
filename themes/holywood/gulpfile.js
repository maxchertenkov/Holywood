require('es6-promise').polyfill(); // Polyfill for es6-promises for some of gulp plugins
var gulp          = require('gulp'); // Gulp itself
var babel = require('gulp-babel'); // Babel JS Compiler
var sass          = require('gulp-sass'); // Sass compilation
var autoprefixer  = require('gulp-autoprefixer'); // Autoprefixing css
var plumber = require('gulp-plumber'); // Handle errors while sass compilation
var gutil = require('gulp-util'); // Additional error styles and texts
var concat = require('gulp-concat'); // Concatenate js files to one
var uglify = require('gulp-uglify'); // Minify js files
var imagemin = require('gulp-imagemin'); // Image optimization
var browserSync = require('browser-sync').create(); // Browser synchronisation on file change
var reload = browserSync.reload; // Browser synchronisation on file change
var browserify = require('browserify'); // for Browserify
var source = require('vinyl-source-stream'); // for Browserify
var buffer = require('vinyl-buffer'); // for Browserify
var sourcemaps = require('gulp-sourcemaps'); // Sourcemapping

// Sass compilation errors alerts
var onError = function (err) {
    console.log('An error occurred:', gutil.colors.red(err.message));
    gutil.beep();
    this.emit('end');
};

// Sass compilation and autoprefix
gulp.task('sass', function() {
    return gulp.src('./sass/style.scss')
        .pipe(plumber({ errorHandler: onError }))
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(autoprefixer())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./'))
});

// Concat, check for errors and minify js
gulp.task('js', function() {
    // set up the browserify instance on a task basis
    var b = browserify({
        entries: './js/src/index.js',
        debug: true
    });

    return b.bundle()
        .pipe(source('app.js')) // Передаем имя файла, который получим на выходе, vinyl-source-stream
        .pipe(buffer())
        .pipe(sourcemaps.init({loadMaps: true}))
        .pipe(babel())
        .pipe(uglify())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('./js/dist'));
});

// Image optimization
gulp.task('images', function() {
    return gulp.src('./images/src/*')
        .pipe(plumber({errorHandler: onError}))
        .pipe(imagemin({optimizationLevel: 7, progressive: true}))
        .pipe(gulp.dest('./images/dist'));
});

// Watcher task
gulp.task('watch', function() {
    browserSync.init({
        files: ['./**/*.php', './**/*.scss'],
        proxy: 'http://localhost:8000/',
    });
    gulp.watch('./sass/**/*.scss', ['sass']);
    gulp.watch('./js/src/*.js', ['js']);
    gulp.watch('./images/src/*', ['images']);
});

// Gulp default task
gulp.task('default', ['sass', 'js', 'images', 'watch']);