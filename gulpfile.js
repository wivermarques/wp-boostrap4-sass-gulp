// Defining base pathes
var basePaths = {
	bower: './bower_components/',
	node: './node_modules/',
	dev: './src/',
	deploy: './assets/'
};

// browser-sync watched files
// automatically reloads the page when files changed
var browserSyncWatchFiles = [
    './assets/css/*.min.css',
    './assets/js/*.min.js',
    './assets/**/*.php'
];

// browser-sync options
var browserSyncOptions = {
    proxy: "localhost/Mirum/gpa/",
    notify: true
};

// Defining requirements
var gulp = require('gulp');
var plumber = require('gulp-plumber');
var sass = require('gulp-sass');
var cssnano = require('gulp-cssnano');
var cleanCSS = require('gulp-clean-css');
var rename = require('gulp-rename');
var sourcemaps = require('gulp-sourcemaps');
var gulpSequence = require('gulp-sequence');
var autoprefixer = require('gulp-autoprefixer');
var imagemin = require('gulp-imagemin');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var watch = require('gulp-watch');
var browserSync = require('browser-sync').create();






// Run:
// gulp sass
// Compiles SCSS files in CSS
gulp.task('sass', function () {
    var stream = gulp.src(basePaths.dev + 'sass/*.scss')
        .pipe(plumber({
            errorHandler: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
        .pipe(sass())
        .pipe(gulp.dest(basePaths.dev + 'css'))
    return stream;
});

// Run:
// gulp cssnano
// Minifies CSS files
gulp.task('cssnano', function(){
  return gulp.src(basePaths.dev + 'css/theme.css')
    .pipe(sourcemaps.init({loadMaps: true}))
    .pipe(plumber({
            errorHandler: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
    .pipe(rename({suffix: '.min'}))
    .pipe(cssnano({discardComments: {removeAll: true}}))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(basePaths.deploy + 'css/'))
});

gulp.task('minify-css', function() {
	return gulp.src(basePaths.deploy + 'css/theme.css')
	.pipe(sourcemaps.init({loadMaps: true}))
	.pipe(autoprefixer({
		browsers: ['last 2 versions'],
		cascade: false
	}))
	.pipe(cleanCSS({compatibility: '*'}))
	.pipe(plumber({
	        errorHandler: function (err) {
	            console.log(err);
	            this.emit('end');
	        }
	    }))
	.pipe(rename({suffix: '.min'}))
	.pipe(sourcemaps.write('./'))
	.pipe(gulp.dest(basePaths.deploy + 'css/'));
});

gulp.task('cleancss', function() {
  return gulp.src('./css/*.min.css', { read: false }) // much faster
    .pipe(ignore('theme.css'))
    .pipe(rimraf());
});

gulp.task('styles', function(callback){ gulpSequence('sass', 'minify-css')(callback) });


// Run:
// gulp copy-assets.
// Copy all needed assets assets files from bower_component assets to themes /js, /scss and /fonts folder. Run this task after bower install or bower update
gulp.task('copy-assets', function() {

// Copy all Bootstrap JS files
    var stream = gulp.src(basePaths.bower + 'bootstrap/dist/js/**/*.js')
       .pipe(gulp.dest(basePaths.dev + 'js/vendor/'));
       
// Copy all Bootstrap SCSS files
    gulp.src(basePaths.bower + 'bootstrap/scss/**/*.scss')
       .pipe(gulp.dest(basePaths.dev + 'sass/assets/bootstrap4'));
       
// Copy all Font Awesome Fonts
    gulp.src(basePaths.bower + 'components-font-awesome/fonts/**/*.{ttf,woff,woff2,eof,svg}')
        .pipe(gulp.dest(basePaths.deploy + 'fonts'));
        
// Copy all Font Awesome SCSS files
    gulp.src(basePaths.bower + 'components-font-awesome/scss/*.scss')
        .pipe(gulp.dest(basePaths.dev + 'sass/assets/fontawesome'));

	return stream;
});

// Run: 
// gulp scripts. 
// Uglifies and concat all JS files into one
gulp.task('scripts', function() {
    var scripts = [
        
        // Custom js
        basePaths.dev + 'js/main.js',
        
        // Start - All BS4 stuff
        basePaths.dev + 'js/vendor/bootstrap.js',

    ];
    
	gulp.src(scripts)
	.pipe(concat('theme.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest(basePaths.deploy + 'js/'));
	
	gulp.src(scripts)
	.pipe(concat('theme.js'))
	.pipe(gulp.dest(basePaths.deploy + 'js/'));
});

// Run:
// gulp imagemin
// Running image optimizing task
gulp.task('imagemin', function(){
    gulp.src(basePaths.dev + 'img/**')
    .pipe(imagemin())
    .pipe(gulp.dest(basePaths.deploy + 'img'))
});

// Run:
// gulp watch
// Starts watcher. Watcher runs gulp sass task on changes
gulp.task('watch', function () {
    gulp.watch(basePaths.dev + 'sass/**/*.scss', ['styles']);
    gulp.watch([basePaths.dev + 'js/**/*.js','js/**/*.js','!js/theme.js','!js/theme.min.js'], ['scripts']);

    //Inside the watch task.
    gulp.watch(basePaths.dev + 'img/**', ['imagemin'])
});

// Run:
// gulp browser-sync
// Starts browser-sync task for starting the server.
gulp.task('browser-sync', function() {
    browserSync.init(browserSyncWatchFiles, browserSyncOptions);
});

// Run:
// gulp watch-bs
// Starts watcher with browser-sync. Browser-sync reloads page automatically on your browser
gulp.task('watch-bs', ['browser-sync', 'watch', 'scripts'], function () { });

