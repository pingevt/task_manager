var gulp = require('gulp');
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var cleanCSS = require('gulp-clean-css');
var notify = require('gulp-notify');
var plumber = require('gulp-plumber');
var rename = require('gulp-rename');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');


gulp.task('css', function ()
{
  gulp.src('./css/scss/*.scss')
    .pipe(plumber())
    .pipe(sass())
    .pipe(autoprefixer({ browsers: ['last 3 versions'] }))
    .pipe(gulp.dest('./css'))
    .pipe(rename({
      extname: ".min.css"
    }))
    .pipe(cleanCSS())
    .pipe(gulp.dest('./css'))
    .pipe(notify({message: 'SCSS Compiled!'}));
});

gulp.task('js', function ()
{
    gulp.src('./js/src/*.js')
        .pipe(plumber())
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('js'))
        .pipe(notify({message: 'ADL Field: JS Compiled!'}));
});

gulp.task('watch', function ()
{
    gulp.watch('./css/scss/**/*.scss', ['css']);
    gulp.watch('./js/src/*.js', ['js']);
});

gulp.task('default', ['watch']);
