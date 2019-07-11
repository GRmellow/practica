const gulp = require("gulp");
const sass = require("gulp-sass");

gulp.task("sass", function() {
  return gulp
    .src(["./scss/*.scss"])
    .pipe(sass())
    .pipe(gulp.dest("dist/css"));
});

gulp.task("serve", ["sass"], function() {
  gulp.watch(["./scss/*.scss"], ["sass"]);
});

gulp.task("default", ["serve"]);
