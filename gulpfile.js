var ftp = require('vinyl-ftp');
var gutil = require('gulp-util');
var minimist = require('minimist');
var args = minimist(process.argv.slice(4));

gulp.task('deploy', function() {
  var remotePath = args.path;
  var conn = ftp.create({
    host: args.host,
    user: args.user,
    password: args.password,
    log: gutil.log
  });

  gulp.src(['*', '.*'])
    .pipe(conn.newer(remotePath))
    .pipe(conn.dest(remotePath));
};