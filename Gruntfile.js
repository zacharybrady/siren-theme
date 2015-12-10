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
        files: ['js/jsSrc/*.js','js/jsSrc/*/*.js'],
        tasks: ['jshint', 'uglify', 'yuidoc'],
        options: {
          spawn: false
        }
      },
      scss: {
        files: ['css/scss/*.scss','css/scss/*/*.scss'],
       tasks: ['sass', 'criticalcss', 'postcss'],
        options: {
          spawn: false,
        }
      },
      images: {
        files: ['images/*.{png,jpg,gif}'],
        tasks: ['imagemin'],
        options: {
          spawn: false,
        }
      }
    },

     //JS Hinting
    jshint: {
      all: ['Gruntfile.js', 'js/jsSrc/global.js']
    },

    //Uglify for JS
    uglify: {
      dist:{
        files:{
          'js/global.min.js' : ['js/jsSrc/polyfills/respimage.js', 'js/jsSrc/plugins/lazysizes.js', 'js/jsSrc/libs/shoestring.js', 'js/jsSrc/global.js']

        }
      }
    },

    //SASS
    sass: {                              
      dist: {                            
        options: {                   
          style: 'expanded',
          sourcemap: 'none'
        },
        files: {                        
          'style.css': 'css/scss/style.scss',       
          'css/ie8.css': 'css/scss/ie8.scss'
        }
      }
    },

    //Critical CSS
    criticalcss: {

      //Set up a critical CSS file for each major template type

      //Home
      homePage: {
        options: {
          url: "http://localhost:8888/siren-wordpress/",
          outputfile: "css/critical/raw/home.css",
          filename: "style.css"
        }
      },

      //Archives - index, taxonomies, archives, etc.
      archives: {
        options: {
          url: "http://localhost:8888/siren-wordpress/news/",
          outputfile: "css/critical/raw/archives.css",
          filename: "style.css"
        }
      },

      //Post
      post: {
        options: {
          url: "http://localhost:8888/siren-wordpress/news/",
          outputfile: "css/critical/raw/post.css",
          filename: "style.css"
        }
      },

      //Page
      page: {
        options: {
          url: "http://localhost:8888/siren-wordpress/store/",
          outputfile: "css/critical/raw/page.css",
          filename: "style.css"
        }
      }

    },

    postcss: {
      options: {
        map: false, // inline sourcemaps

        processors: [
          require('autoprefixer')({browsers: 'last 4 versions'}),
          require('css-mqpacker')(),
          require('cssnano')()
        ]
      },
      dist: {
        files: [{
          src: ['*.css', 'css/*.css', 'css/**/*.css']
        }]
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
    }

    
  });

  // Load up pluggins
  grunt.loadNpmTasks('grunt-contrib-watch'); //Update watcher
  grunt.loadNpmTasks('grunt-contrib-uglify'); //Uglify JS
  grunt.loadNpmTasks('grunt-contrib-jshint'); //JS Hint
  grunt.loadNpmTasks('grunt-contrib-imagemin'); //Image Optimization
  grunt.loadNpmTasks("grunt-contrib-yuidoc"); //JS Documentation
  grunt.loadNpmTasks('grunt-criticalcss'); //Critical CSS
  grunt.loadNpmTasks('grunt-postcss'); //Post CSS
  grunt.loadNpmTasks('grunt-contrib-sass');

  // Default task(s).
  grunt.registerTask('default', ['sass', 'criticalcss', 'postcss' ]);

};