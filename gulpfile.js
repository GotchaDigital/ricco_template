var gulp = require('gulp');

var sass = require('gulp-sass');
var concat = require('gulp-concat');
var livereload = require('gulp-livereload');

gulp.task( 'styles', function()
{
	gulp.src( 'src/scss/*.scss' )
		.pipe( sass() )
		.pipe( gulp.dest( 'css' ) )
		.pipe( livereload() );
});

gulp.task( 'scripts', function()
{
	gulp.src([
		'src/js/jquery-3.1.0.min.js',
		'src/js/jquery.ba-hashchange.min.js',
		'src/js/unslider-min.js',
		'src/js/index.js'
		])
	.pipe( concat( 'index.js' ) )
	.pipe( gulp.dest( 'js' ) )
	.pipe( livereload() );
});

gulp.task( 'html', function()
{
	gulp.src([
		'src/html/beforeBody.html',
		'src/html/login.html',
		'src/html/header.html',
		'src/html/content/before.html',

		'src/html/content/home/plans.html',
		'src/html/content/home/banners.html',
		'src/html/content/home/meter.html',

		'src/html/content/sobre/sobre.html',

		'src/html/content/contato/maps.html',
		'src/html/content/contato/form.html',
		'src/html/content/contato/others.html',

		'src/html/content/duvidas/duvidas.html',

		'src/html/content/login/login.html',

		'src/html/content/after.html',
		'src/html/footer.html',
		'src/html/scripts.html',
		'src/html/afterBody.html',
		])
	.pipe( concat( 'index.html' ) )
	.pipe( gulp.dest( '' ) )
	.pipe( livereload() );
});

gulp.task( 'watch', function()
{
	livereload.listen();
	gulp.watch( 'src/scss/**/*.scss', [ 'styles' ] );
	gulp.watch( 'src/html/**/*.html', [ 'html' ] );
	gulp.watch( 'src/js/**/*.js', [ 'scripts' ] );
});

gulp.task( 'default', [ 'watch' ] );