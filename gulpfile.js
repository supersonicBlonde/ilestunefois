const { src, dest, task, watch, series, parallel } = require('gulp');

// CSS related plugins
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');

// JS related plugins
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const babelify = require('babelify');
const browserify = require('browserify');
const source = require('vinyl-source-stream');
const buffer = require('vinyl-buffer');
const stripDebug = require('gulp-strip-debug');

// Utility plugins
const rename = require('gulp-rename');
const sourcemaps = require('gulp-sourcemaps');
const notify = require('gulp-notify');
const plumber = require('gulp-plumber');
const options = require('gulp-options');
const gulpif = require('gulp-if');

// Browser related plugins
const browserSync = require('browser-sync').create();

// Project related variables
const projectURL = 'http://ilestunefois.localhost';

const styleSRC = './src/scss/styles.scss';
const styleURL = './dist/css/';
const mapURL = './';

const jsSRC = './src/js/';
const jsAdmin = 'scripts.js';
const jsConnect = 'connect.js';
const jsFiles = [jsAdmin, jsConnect];
const jsURL = './dist/js/';

const styleWatch = './src/scss/**/*.scss';
const jsWatch = './src/js/**/*.js';

// BrowserSync task
function browser_sync() {
	browserSync.init({
		proxy: projectURL,
		injectChanges: true,
		open: false
	});
}

// CSS task to compile, autoprefix, minify, and rename
function css() {
	return src(styleSRC)
		.pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
		.pipe(sourcemaps.init())
		.pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
		.pipe(autoprefixer({ overrideBrowserslist: ['last 2 versions'] }))
		.pipe(cleanCSS())
		.pipe(rename({ suffix: '.min' }))
		.pipe(sourcemaps.write(mapURL))
		.pipe(dest(styleURL))
		.pipe(browserSync.stream());
}

// JS task to concatenate, strip debug, uglify, and write sourcemaps
function js(done) {
	jsFiles.map(function(entry) {
		return browserify({ entries: [jsSRC + entry] })
			.transform(babelify, { presets: ['@babel/preset-env'] })
			.bundle()
			.pipe(source(entry))
			.pipe(rename({ extname: '.min.js' }))
			.pipe(buffer())
			.pipe(gulpif(options.has('production'), stripDebug()))
			.pipe(sourcemaps.init({ loadMaps: true }))
			.pipe(uglify())
			.pipe(sourcemaps.write('.'))
			.pipe(dest(jsURL))
			.pipe(browserSync.stream());
	});
	done();
}

// Watch files for changes
function watch_files() {
	watch(styleWatch, series(css, reload));
	watch(jsWatch, series(js, reload));
	src(jsURL + 'scripts.min.js')
		.pipe(notify({ message: 'Gulp is Watching, Happy Coding!' }));
}

// Gulp tasks
task('css', css);
task('js', js);
task('default', parallel(css, js));
task('watch', parallel(watch_files, browser_sync));

// Reload function for BrowserSync
function reload(done) {
	browserSync.reload();
	done();
}
