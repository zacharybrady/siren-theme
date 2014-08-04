module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    //Watching Functionality
    watch: {
      options: {
        livereload: true,
      },
      scripts: {
        files: ['js/jsSrc/*.js','js/jsSrc/build/*.js'],
        tasks: ['jshint', 'uglify', 'yuidoc'],
        options: {
          spawn: false
        }
      },
      css: {
        files: ['css/sass/*.scss','css/sass/*/*.scss'],
       tasks: ['compass'],
        options: {
          spawn: false,
        }
      },
      images: {
        files: ['images/imagesSrc/*.{png,jpg,gif}'],
        tasks: ['imagemin'],
        options: {
          spawn: false,
        }
      },
      imagesRes: {
        files: ['images/imagesResSrc/*.{png,jpg,gif}'],
        tasks: ['imagemin','responsive_images'],
        options: {
          spawn: false,
        }
      }
    },

     //JS Hinting
    jshint: {
      all: ['Gruntfile.js', 'js/jsSrc/functions.js', 'js/jsSrc/global.js']
    },

    //Uglify for JS
    uglify: {
      dist:{
        files:{
          'js/global.min.js' : ['js/jsSrc/polyfills/classlist.js','js/jsSrc/functions.js', 'js/jsSrc/global.js'],
          'js/enhance.js' : 'js/jsSrc/enhance.js'

        }
      }
    },

    //Compass for SCSS
    compass: {                 
      dist: { 
        options: {    
          config: 'config.rb',       
          sassDir: 'css/sass',
          cssDir: 'css',
          environment: 'development'
        }
      }
    },

    //Image Optimization
    imagemin: {  
      standard: {                  
        files: [{
          expand: true,    
          src: ['**/*.{png,jpg,gif}'],
          cwd: 'images/imagesSrc',
          dest: 'images/'   
        }]
      },
      responsive: {                  
        files: [{
          expand: true,    
          src: ['imagesResSrc/*.{png,jpg,gif}'],
          cwd: 'images/',
          dest: 'images/'   
        }]
      }
    },

    //Create Images for Responsive Images
    //Configure size feature per project
    responsive_images: {
      dev: {
        sizes: [{
          name: 'small',
          width: 320
        },{
          name: 'medium',
          width: 640
        },{
          name: "large",
          width: 1024
        }],
        files: [{
          expand: true,
          src: ['**/*.{png,jpg,gif}'],  
          cwd: 'images/imagesResSrc',
          dest: 'images/'
        }]
      }
    },

    //Javascript documentation
    yuidoc: {
        all: {
            name: 'Siren Core',
            description: 'Change this on project start',
            version: '0',
            url: '',
            options: {
                paths: ['js/jsSrc/'],
                outdir: 'docs/docs-js/'
            }
        }
    },

    //PHP Documentation
    phpdocumentor: {
        dist: {
            options: {
                directory : './',
                target : 'docs/docs-php'
            }
        }
    }

    
  });

  // Load up pluggins
  grunt.loadNpmTasks('grunt-contrib-watch'); //Update watcher
  grunt.loadNpmTasks('grunt-contrib-uglify'); //Uglify JS
  grunt.loadNpmTasks('grunt-contrib-compass'); //Compress Compass
  grunt.loadNpmTasks('grunt-contrib-jshint'); //JS Hint
  grunt.loadNpmTasks('grunt-contrib-imagemin'); //Image Optimization
  grunt.loadNpmTasks('grunt-responsive-images'); //Responsive Image Creator; imageMagick should be installed on computer as well through homebrew
  grunt.loadNpmTasks("grunt-contrib-yuidoc"); //JS Documentation
  grunt.loadNpmTasks('grunt-phpdocumentor'); //PHP Documentation

  // Default task(s).
  grunt.registerTask('default', ['uglify', 'compass', 'jshint','imagemin', 'responsive_images', 'yuidoc']);

};