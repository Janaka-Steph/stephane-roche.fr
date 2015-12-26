module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        compass: {                  // Task
            dist: {                   // Target
                options: {              // Target options
                    sassDir: 'assets/scss/app.scss',
                    cssDir: 'assets/css/appp.css',
                    environment: 'production'
                }
            },
            dev: {                    // Another target
                options: {
                    sassDir: 'assets/scss',
                    cssDir: 'assets/css'
                }
            }
        },

        sass: {
            all: {
                options: {
                    //style: 'nested',
                    style: 'expanded',
                    //sourcemap: 'true',
                    //check: 'true',
                    //trace: 'true',
                    //quiet: 'true',
                    //debugInfo: 'true',
                    //lineNumbers: 'true',
                    cacheLocation: './.sass-cache'
                },
                files: {
                    'assets/css/app-withoutprefix.css': 'assets/scss/app.scss'
                }
            }
        },


        watch: {

            all: {
                files: ['assets/js/*.js', 'assets/scss/*.scss', 'application/views/*.tpl', 'application/views/backoffice/*.tpl', 'application/controllers/*.php', '/Gruntfile.js'],
                tasks: ['sass:dev'],
                options: {
                    //spawn: false,
                    livereload: true
                }
            },
            js: {
                files: '**/*.js',
                tasks: ['jshint'],
                options: {
                    interrupt: true
                }
            },
            tpl: {
                files: ['application/views/*.tpl'],
                //tasks: ['tpl'],
                options: {
                    livereload: true
                }
            },
            sass: {
                files: ['assets/scss/*.scss'],
                tasks: ['sass:dev', 'autoprefixer:autoprefix'],
                options: {
                    livereload: true
                }
            }
        },


        // gzip assets 1-to-1 for production
        compress: {
            main: {
                options: {
                    mode: 'gzip'
                },
                //expand: true,
                //cwd: 'assets/',
                files: {
                    'assets/css/app.gzip': 'assets/css/app.css'
                }
            }
        },

        // cssmin
        cssmin: {
            minify: {
                expand: false,
                src:  'assets/css/app.css',
                dest: 'assets/css/app.min.css',
                ext: '.min.css'
            }
        },

        // Auto prefix CSS
        autoprefixer: {
            options: {
                browsers: ['last 8 versions']
            },
            autoprefix: {
                src: 'assets/css/app-withoutprefix.css',
                dest: 'assets/css/app.css'
            },
        }

    });

    // grunt-sass : Compile Sass to CSS using node-sass
    /* Node-sass is a library that provides binding for Node.js to libsass, the C version of the popular stylesheet
     preprocessor, Sass. It allows you to natively compile .scss files to css at incredible speed and automatically
     via a connect middleware. */
    grunt.loadNpmTasks('grunt-sass');
    /* */
    // grunt-contrib-sass : Compile Sass to CSS
    //grunt.loadNpmTasks('grunt-contrib-sass');
    // Run predefined tasks whenever watched file patterns are added, changed or deleted.
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-autoprefixer');
    //grunt.loadNpmTasks('grunt-contrib-compress');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    //grunt.loadNpmTasks('grunt-contrib-uglify');
    //grunt.loadNpmTasks('grunt-contrib-compass');

    grunt.registerTask('default', ['sass:all', 'autoprefixer:autoprefix', 'watch:sass']);
    grunt.registerTask('prod', ['sass:all', 'autoprefixer:autoprefix', 'cssmin:minify']);
    grunt.registerTask('dev', ['sass:all']);
    grunt.registerTask('zip', ['compress:main']);
    grunt.registerTask('css-min', ['cssmin:minify']);
}