// Defining base pathes
const basePaths = {
	bower: './bower_components/',
	node: './node_modules/',
	dev: './src/',
	deploy: './assets/'
};

// browser-sync watched files
// automatically reloads the page when files changed
const browserSyncWatchFiles = [
    './assets/css/*.min.css',
    './assets/js/*.min.js',
    './**/*.php'
];

// browser-sync options
const browserSyncOptions = {
    proxy: "localhost/",
    notify: true
};

// Defining requirements
const gulp = require('gulp');
const plumber = require('gulp-plumber');
const sass = require('gulp-sass');
const cleanCSS = require('gulp-clean-css');
const rename = require('gulp-rename');
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');
const imagemin = require('gulp-imagemin');
const uglify = require('gulp-uglify');
const concat = require('gulp-concat');
const browserSync = require('browser-sync').create();






// Run:
// gulp sass
// Compiles SCSS files in CSS
function sassCSS() {
    return(
        gulp
        .src(basePaths.dev + 'sass/*.scss')      
        .pipe(sass())
        .on("error", sass.logError)
        .pipe(gulp.dest(basePaths.dev + 'css'))
    );
};
//exports.sassCSS = sassCSS;

function minifyCSS() {
	return gulp.src(basePaths.dev + 'css/theme.css')
	.pipe(sourcemaps.init({loadMaps: true}))
    .pipe(autoprefixer())
	.pipe(cleanCSS({compatibility: 'ie >= 8'}))
	.pipe(plumber({
	        errorHandler: function (err) {
	            console.log(err);
	            this.emit('end');
	        }
	    }))
	.pipe(rename({suffix: '.min'}))
	.pipe(sourcemaps.write('./'))
	.pipe(gulp.dest(basePaths.deploy + 'css/'));
};
//exports.minifyCSS = minifyCSS;

const styles = gulp.series(sassCSS, minifyCSS);


// Run:
// gulp copy-assets.
// Copy all needed assets assets files from bower_component assets to themes /js, /scss and /fonts folder. Run this task after bower install or bower update
gulp.task('bower', function() {

// Copy all Bootstrap JS files
    var stream = gulp.src(basePaths.bower + 'bootstrap/dist/js/**/*.js')
       .pipe(gulp.dest(basePaths.dev + 'js/vendor/'));
       
// Copy all Bootstrap SCSS files
    gulp.src(basePaths.bower + 'bootstrap/scss/**/*.scss')
       .pipe(gulp.dest(basePaths.dev + 'sass/assets/bootstrap4'));
       
// Copy Tether JS files
    gulp.src(basePaths.bower + 'tether/dist/js/*.js')
        .pipe(gulp.dest(basePaths.dev + '/js/vendor/'));
       
// Copy all Font Awesome Fonts
    gulp.src(basePaths.bower + 'components-font-awesome/fonts/**/*.{ttf,woff,woff2,eof,svg}')
        .pipe(gulp.dest(basePaths.deploy + 'fonts'));
        
// Copy all Font Awesome SCSS files
    gulp.src(basePaths.bower + 'components-font-awesome/scss/*.scss')
        .pipe(gulp.dest(basePaths.dev + 'sass/assets/fontawesome'));

	return stream;
});

// Run:
// gulp imagemin
// Running image optimizing task
function imageminImg(done){
    gulp.src(basePaths.dev + 'img/**')
    .pipe(imagemin({
	    progressive: true
    }))
    .pipe(gulp.dest(basePaths.deploy + 'img'));

    done();
};
//exports.imageminImg = imageminImg;

// Run: 
// gulp scripts. 
// Uglifies and concat all JS files into one
function scriptsJs(done) {
    const scripts = [
        basePaths.dev + 'js/vendor/tether.js', // Must be loaded before BS4
        
        // Start - All BS4 stuff
        basePaths.dev + 'js/vendor/bootstrap.js',
        
        // Custom js
        basePaths.dev + 'js/main.js',
    ];
    
	gulp.src(scripts)
	.pipe(concat('theme.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest(basePaths.deploy + 'js/'));
	
	gulp.src(scripts)
	.pipe(concat('theme.js'))
    .pipe(gulp.dest(basePaths.deploy + 'js/'));
    
    done();
};
//exports.scriptsJs = scriptsJs;

// Run:
// gulp watch
// Starts watcher. Watcher runs gulp sass task on changes
function watchFiles() {
    gulp.watch(basePaths.dev + 'sass/**/*.scss', styles);
    gulp.watch(basePaths.dev + 'js/**/*.js', scriptsJs);

    //Inside the watch task.
    gulp.watch(basePaths.dev + 'img/**', imageminImg)
};
//exports.watchFiles = watchFiles;


// Run:
// gulp browser-sync
// Starts browser-sync task for starting the server.
function openBrowser() {
    browserSync.init(browserSyncWatchFiles, browserSyncOptions);
};
//exports.openBrowser = openBrowser;

// Run:
// gulp watch-bs
// Starts watcher with browser-sync. Browser-sync reloads page automatically on your browser
gulp.task('watch-bs', gulp.parallel(openBrowser, watchFiles));

