let preprocessor = 'sass', // Preprocessor (sass, less, styl); 'sass' also work with the Scss syntax in blocks/ folder.
	fileswatch = 'html,htm,txt,json,md,woff2', // List of files extensions for watching & hard reload
	themname = 'akademily_gut' // WP Theme Name

import pkg from 'gulp'
const { gulp, src, dest, parallel, series, watch } = pkg

import browserSync from 'browser-sync'
import bssi from 'browsersync-ssi'
import ssi from 'ssi'
import webpackStream from 'webpack-stream'
import webpack from 'webpack'
import TerserPlugin from 'terser-webpack-plugin'
import gulpSass from 'gulp-sass'
import * as dartSass from 'sass'
import sassglob from 'gulp-sass-glob'
const sass = gulpSass(dartSass)
import less from 'gulp-less'
import lessglob from 'gulp-less-glob'
import styl from 'gulp-stylus'
import stylglob from 'gulp-noop'
import postCss from 'gulp-postcss'
import cssnano from 'cssnano'
import autoprefixer from 'autoprefixer'
import imagemin from 'gulp-imagemin'
import webp from 'gulp-webp'
import ttf2woff2 from 'gulp-ttf2woff2'
import changed from 'gulp-changed'
import concat from 'gulp-concat'
import rsync from 'gulp-rsync'
import { deleteAsync } from 'del'

function scripts() {
	return src(['app/js/*.js', '!app/js/*.min.js', '!app/js/admin.js'])
		.pipe(changed(`../wp-content/themes/${themname}/resources/js/`))
		.pipe(
			webpackStream(
				{
					mode: 'production',
					performance: { hints: false },
					plugins: [
						new webpack.ProvidePlugin({
							$: 'jquery',
							jQuery: 'jquery',
							'window.jQuery': 'jquery',
						}), // jQuery (npm i jquery)
					],
					module: {
						rules: [
							{
								test: /\.m?js$/,
								exclude: /(node_modules)/,
								use: {
									loader: 'babel-loader',
									options: {
										presets: ['@babel/preset-env'],
										plugins: ['babel-plugin-root-import'],
									},
								},
							},
						],
					},
					optimization: {
						minimize: true,
						minimizer: [
							new TerserPlugin({
								terserOptions: { format: { comments: false } },
								extractComments: false,
							}),
						],
					},
				},
				webpack
			)
		)
		.on('error', err => {
			this.emit('end')
		})
		.pipe(concat('app.min.js'))
		.pipe(dest(`../wp-content/themes/${themname}/resources/js/`))
}

function styles() {
	return src([
		`app/styles/${preprocessor}/*.*`,
		`!app/styles/${preprocessor}/_*.*`,
	])
		.pipe(changed(`../wp-content/themes/${themname}/resources/css/`))
		.pipe(eval(`${preprocessor}glob`)())
		.pipe(eval(preprocessor)({ 'include css': true }))
		.pipe(
			postCss([
				autoprefixer({ grid: 'true' }),
				cssnano({
					preset: ['default', { discardComments: { removeAll: true } }],
				}),
			])
		)
		.pipe(concat('app.min.css'))
		.pipe(dest(`../wp-content/themes/${themname}/resources/css/`))
}

function imagesSvg() {
	return src(['app/images/src/**/*.svg'])
		.pipe(changed(`../wp-content/themes/${themname}/resources/images/`))
		.pipe(imagemin())
		.pipe(dest(`../wp-content/themes/${themname}/resources/images/`))
}

function images() {
	return src(['app/images/src/**/*', '!app/images/src/**/*.svg'])
		.pipe(changed(`app/images/dist`))
		.pipe(imagemin())
		.pipe(dest(`app/images/dist`))
}

function imagesWebp() {
	return src(['app/images/dist/**/*'])
		.pipe(
			changed(`../wp-content/themes/${themname}/resources/images/`, {
				extension: '.webp',
			})
		)
		.pipe(webp())
		.pipe(dest(`../wp-content/themes/${themname}/resources/images/`))
}

function fontWoff() {
	return src(['app/fonts/**/*.ttf'])
		.pipe(
			changed(`../wp-content/themes/${themname}/resources/fonts/`, {
				extension: '.woff2',
			})
		)
		.pipe(ttf2woff2())
		.pipe(dest(`../wp-content/themes/${themname}/resources/fonts/`))
}

function phpDest() {
	return src(['**/**/*.php'])
		.pipe(changed(`../wp-content/themes/${themname}/`))
		.pipe(dest(`../wp-content/themes/${themname}/`))
}

function jsonDest() {
	return src(['data/**/*.json'])
		.pipe(changed(`../wp-content/themes/${themname}/data`))
		.pipe(dest(`../wp-content/themes/${themname}/data`))
}

function adminJs() {
	return src(['app/js/admin.js'])
		.pipe(changed(`../wp-content/themes/${themname}/resources/js`))
		.pipe(dest(`../wp-content/themes/${themname}/resources/js`))
}

function adminCss() {
	return src(['app/styles/admin.css'])
		.pipe(changed(`../wp-content/themes/${themname}/resources/css`))
		.pipe(dest(`../wp-content/themes/${themname}/resources/css`))
}

function otherDest() {
	return src(['style.css', 'screenshot.png'])
		.pipe(changed(`../wp-content/themes/${themname}/`))
		.pipe(dest(`../wp-content/themes/${themname}/`))
}

async function cleandist() {
	await deleteAsync(`../wp-content/themes/${themname}/**/*`, { force: true })
}

function deploy() {
	return src('assets/').pipe(
		rsync({
			root: 'assets/',
			hostname: 'username@yousite.com',
			destination: 'yousite/public_html/',
			// clean: true, // Mirror copy with file deletion
			include: [
				/* '*.htaccess' */
			], // Included files to deploy,
			exclude: ['**/Thumbs.db', '**/*.DS_Store'],
			recursive: true,
			archive: true,
			silent: false,
			compress: true,
		})
	)
}

function startwatch() {
	watch('**/**/*.php', { usePolling: true }, phpDest)
	watch('data/**/*.json', { usePolling: true }, jsonDest)
	watch(`app/styles/${preprocessor}/**/*`, { usePolling: true }, styles)
	watch(`app/js/admin.js`, { usePolling: true }, adminJs)
	watch(`app/styles/admin.css`, { usePolling: true }, adminCss)
	watch(
		['app/js/**/*.js', 'app/libs/**/*.js', '!app/js/**/*.min.js'],
		{ usePolling: true },
		scripts
	)
	watch('app/images/src/**/*.svg', { usePolling: true }, imagesSvg)
	watch(
		['app/images/src/**/*', '!app/images/**/*.svg'],
		{ usePolling: true },
		images
	)
	watch('app/images/dist/**/*', { usePolling: true }, imagesWebp)
	watch('app/fonts/*', { usePolling: true }, fontWoff)
}

export {
	scripts,
	styles,
	imagesSvg,
	images,
	imagesWebp,
	fontWoff,
	phpDest,
	jsonDest,
	otherDest,
	deploy,
}
export let assets = series(
	scripts,
	styles,
	images,
	fontWoff,
	phpDest,
	jsonDest,
	otherDest
)
export let build = series(
	cleandist,
	scripts,
	styles,
	imagesSvg,
	images,
	imagesWebp,
	fontWoff,
	phpDest,
	jsonDest,
	adminJs,
	adminCss,
	otherDest
)

export default series(
	scripts,
	styles,
	imagesSvg,
	images,
	imagesWebp,
	fontWoff,
	phpDest,
	jsonDest,
	adminJs,
	adminCss,
	otherDest,
	startwatch
)
