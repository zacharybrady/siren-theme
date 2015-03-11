# Table of Contents for the JS/JSSRC Directory #
## As of Siren Wordpress Theme 3.6 ##
This Table of Contents goes through top level files first and then the files in the different subdirectories grouped by subdirectory.

### FILES ###
1. global.js
	- Development file for global javascript calls


### DIRECTORIES ###
The directories in the JS/JSSRC folder and notes.

1. LIBS
	- Javascript Libraries that may or may not be included in the project
2. PLUGINS
	- Javascript and jQuery plugins that may or may not be included in the project
3. LOADING
	- Contains scripts for handling asyncronous loading of assets
4. POLYFILLS
	- Polyfills for Javascript APIs etc


### FILES BY SUBDIRECTORIES ###

#### LIBS ####
1. jquery.js
	- jQuery v1.10.2
2. TweenMax.js
	- part of the the Greensock Library
	- If Javascript animations are needed use this library

#### PLUGINS ####
1. lazysizes.js
	- Asyncronous loading of image assets with responsive image capabilities'
2. ls.unveilhooks.js
	- Extends lazysizes.js to asyncronously load an assets
3. jquery.validate.js
	- A simple vallidation library for forms
4. fit-text.js
	- jQuery plugin for Fitting text fluidly by Dave Rupert
5. fit-vid.js
	- jQuery plugin for Fitting Videios fluidly by Chris Coyier

#### LOADING ####
1. cookie.js
	- For cookie handling. By Filament group.
2. loadcss.js
	- For asyncronously loading CSS stylesheets. By Filament group.
3. loadjs.js
	- For asyncronously loading JS files. By Filament group. 


#### POLYFILLS ####
1. respimage.js
	- Polyfill for responsive images
