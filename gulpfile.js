var addsrc = require('gulp-add-src');
var concat = require('gulp-concat');
var gulp = require('gulp');
var gutil = require('gulp-util');
var jshint = require('gulp-jshint');
var plumber = require('gulp-plumber');
var sass = require('gulp-sass');
var sassbeautify = require('gulp-sassbeautify');
var sourcemaps = require('gulp-sourcemaps');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
const autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync').create();
var src = {
  sass: 'src/sass/**/*.scss',
  scripts: 'src/scripts/**/*.js'
};
var dest = {
  css: 'css',
  scripts: 'js'
};
var onError = function(err) {
  gutil.beep();
  gutil.log(err);
}

gulp.task('scripts', function(done) {
  gulp.src(src.scripts)
  .pipe(plumber({
      errorHandler: onError
  }))
  .pipe(jshint())
  .pipe(jshint.reporter('jshint-stylish'))
  .pipe(addsrc.prepend('node_modules/jquery/dist/jquery.js'))
  .pipe(concat('billing-min.js'))
  .pipe(uglify())
  .pipe(gulp.dest(dest.scripts));
  done();
});

gulp.task('sass', function(done) {
  gulp.src(src.sass)
  .pipe(plumber({
      errorHandler: onError
  }))        
  .pipe(autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false
  }))
  .pipe(sass({
      outputStyle: 'compressed'
  }))
  .pipe(rename('billing-min.css'))
  .pipe(gulp.dest(dest.css));
  done();
});

gulp.task('pretty', function(done) {
  gulp.src(src.scss)
  .pipe(sassbeautify({
      indent: 2
  }))
  .pipe(gulp.dest(src.sass));
  done();
});

gulp.task('serve', ['sass', 'scripts'], function(done) {
  browserSync.init({
      proxy: "192.168.33.10"
  });
  gulp.watch(src.sass, ['sass']);
  gulp.watch(src.scripts, ['scripts']);
  done();
});

