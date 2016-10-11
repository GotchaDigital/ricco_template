var gulp = require('gulp');

var sass = require('gulp-sass');
var livereload = require('gulp-livereload');

gulp.task( 'styles', function()
{
	gulp.src( 'mktz/src/sass/*.scss' )
		.pipe( sass() )
		.pipe( gulp.dest( 'mktz/css' ) )
		.pipe( livereload() );
});

gulp.task( 'watch', function()
{
	livereload.listen();
	gulp.watch( 'mktz/src/sass/**/*.scss', [ 'styles' ] );
});

gulp.task( 'default', [ 'watch' ] );