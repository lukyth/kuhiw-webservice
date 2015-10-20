var gulp = require('gulp'),
    ftp = require('vinyl-ftp'),
    gutil = require('gulp-util'),
    minimist = require('minimist');

var args = minimist(process.argv.slice(2));

gulp.task('deploy', function() {

  var remotePath = args.path

  var conn = ftp.create({
    host:     args.host,
    user:     args.user,
    password: args.password,
    parallel: 10,
    log:      gutil.log
  })

  var globs = [
    '.*',
    '**'
  ]

  return gulp.src(globs, {base: '.', buffer: false})
        .pipe(conn.newer(remotePath)) // only upload newer files
        .pipe(conn.dest(remotePath))
})
