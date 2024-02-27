const { src, dest, watch } = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const sourcemaps = require("gulp-sourcemaps");
const minifyCSS = require("gulp-csso");
const prefix = require("gulp-autoprefixer");
const babel = require("gulp-babel");
const concat = require("gulp-concat");
const uglify = require("gulp-uglify");
const browserSync = require("browser-sync").create();

var prefixerOptions = {
    overrideBrowserslist: ["last 2 versions"],
};

function css() {
    return src("./scss/*.scss", { sourcemaps: true })
        .pipe(sass())
        .pipe(minifyCSS())
        .pipe(prefix(prefixerOptions))
        .pipe(sourcemaps.write("."))
        .pipe(dest("./scss/"), { sourcemaps: true })
        .pipe(browserSync.stream());
}

function block_css() {
    return src("./blocks/**/*.scss", { sourcemaps: false })
        .pipe(sass())
        .pipe(prefix(prefixerOptions))
        .pipe(dest(function(file) {
            // Use a custom function to determine the destination dynamically
            return file.base;
        }, { sourcemaps: false }))
        .pipe(browserSync.stream());
}

function js() {
    return src("./scripts/*.js", { sourcemaps: true })
        .pipe(
            babel({
                presets: ["@babel/env"],
            })
        )
        .pipe(uglify())
        .pipe(concat("scripts.min.js"))
        .pipe(dest("./js", { sourcemaps: true }));
}

function browser() {
    browserSync.init({
        proxy: "mm-law-llp.local/",
        files: ["./**/*.php"],
    });

    watch("./scss/**/*.scss", css);
    watch("./blocks/**/*.scss", block_css);
    watch("./scripts/*.js", js).on("change", browserSync.reload);
}

exports.css = css;
exports.block_css = block_css;
exports.js = js;
exports.default = browser;
