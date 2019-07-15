/*
	****************************************************
	Imports
	****************************************************
*/

// global
import { src, dest, watch, series, parallel } from 'gulp';
import gulpIf       from 'gulp-if';
import del          from 'del';
import browserSync  from "browser-sync";
import info         from "./package.json";
import replace      from "gulp-replace";
import yargs 		from 'yargs';

//styles    
import sass         from 'gulp-sass';
import cleanCss     from 'gulp-clean-css';
import postcss      from 'gulp-postcss';
import sourcemaps   from 'gulp-sourcemaps';
import autoprefixer from 'autoprefixer';
import gcmq         from 'gulp-group-css-media-queries';

//scripts
import webpack      from 'webpack-stream';
import named        from 'vinyl-named';

//media
import imagemin     from 'gulp-imagemin';
import svgSprite    from 'gulp-svg-sprite';

/*
	****************************************************
	Variables
	****************************************************
*/

const PRODUCTION 	= yargs.argv.production;
const DONAME 		= 'sinarxia.ru';
const PATH 			= '../../' + DONAME + '/wp-content/themes/simple/';
const server 		= browserSync.create();

/*
	****************************************************
	Server
	****************************************************
*/

	export const serve = done => {
		server.init( { proxy: "http://localhost/" + DONAME + "/DEV_F3/public_html", browser: "chrome" } );
		done();
	};
	export const reload = done => {
		server.reload();
		done()
	};

/*
	****************************************************
	Delate folders
	****************************************************
*/
	export const clean = () => del( [ PATH ],{ force: true } );

/*
	****************************************************
	Copy folders
	****************************************************
*/
	//Copy assets folder
	export const copyAssets = () => {
		return src( [ "assets/**/*", ] )
		.pipe( dest( PATH + 'assets' ) );
	}

	//Copy root and templates folders
	export const copyRoot = () => {
		return src( [ "templates/**/*.php", "root/**/*", ] )
		.pipe( replace( "custom", info.name ) )
		.pipe( dest( PATH ) );
	}

/*
	****************************************************
	Styles
	****************************************************
*/
 
	export const styles = () => {
	return src( ['styles/bundle.{scss,sass}', /*'src/scss/admin.scss' */] )
		.pipe( gulpIf( !PRODUCTION, sourcemaps.init() ) )
		.pipe( sass().on( 'error', sass.logError ) )
		.pipe( gulpIf( PRODUCTION, postcss( [ autoprefixer ] ) ) )
		.pipe( gulpIf( PRODUCTION, gcmq() ) )
		.pipe( gulpIf( PRODUCTION, cleanCss() ) )
		.pipe( gulpIf( !PRODUCTION, sourcemaps.write() ) )
		.pipe( dest( PATH + 'assets/css' ) )
		.pipe( server.stream() )
	}


/*
	****************************************************
	Media
	****************************************************
*/
	// Images
	export const images = () => {
	return src( 'images/**/*.{jpg,jpeg,png,svg,gif}' ) 
		.pipe( gulpIf( PRODUCTION, imagemin() ) )
		.pipe( dest( PATH + 'assets/images' ) );
	}

	const svgIconsConfig = {
			mode: {
				symbol:{
					dest:".",
					sprite:"sprite.svg"
				}
		}
	};

	//SVG ICONS
	export const svgIcons = () => {
	return src( 'icons/**/*.svg' )
		.pipe( svgSprite( svgIconsConfig ) )
		.pipe( dest( PATH + 'assets/images' ) );
	}


/*
	****************************************************
	Scripts
	****************************************************
*/

		export const scripts = () => {
			return src([
				// 'node_modules/jquery/dist/jquery.js',
				'scripts/bundle.js'
				])
			.pipe(named())
			.pipe(webpack({
				module: {
				rules: [
					{
						test: /\.js$/,
						use: {
							loader: 'babel-loader',
							options: {
								presets: []
								}
							}
						}
					]
				},
				mode: PRODUCTION ? 'production' : 'development',
				devtool: !PRODUCTION ? 'inline-source-map' : false,
				output: {
					filename: '[name].js'
				},
				externals: {
					jquery: 'jQuery'
				},
			}))
			.pipe( dest( PATH + 'assets/js' ) );
		}
		
/*
	****************************************************
	Watch
	****************************************************
*/

	export const watchForChanges = () => {
		watch( 'styles/**/*.{scss,sass}', styles );
		watch( 'images/**/*.{jpg,jpeg,png,svg,gif}', series( images, reload ) );
		watch( 'assets/**/*', series( copyAssets, reload ) );
		watch( [ "templates/**/*.php", "root/**/*", ], series( copyRoot, reload ) );
		watch( 'scripts/**/*.js', series( scripts, reload ) );
		watch( 'icons/**/*.svg', series( svgIcons, reload ) );
	} 

/*
	****************************************************
	Exports
	****************************************************
*/

	export const dev = series( clean, parallel( styles, images, copyAssets, copyRoot, scripts, svgIcons ), serve, watchForChanges );
	export const build = series( clean, parallel( styles, images, copyAssets, copyRoot, scripts, svgIcons ) );
	export default dev;