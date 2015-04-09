//Gruntfile
module.exports = function(grunt) {

    //Initializing the configuration object
    grunt.initConfig({

        // Paths variables
        paths: {
            // Development where put LESS files, etc
            assets: {
                less: './public/assets/less/',
                js: './public/assets/js/',
                packages: './public/assets/packages/'
            },

            // Production where Grunt output the files
            css: './public/css/',
            js: './public/js/',
            
            // PHP
            php_app: './app/'

        },

        // Task configuration
        concat: {
            options: {
                separator: ';'
            },
            js_frontend: {
                src: [
                    '<%= paths.assets.packages %>jquery/dist/jquery.js',
                    '<%= paths.assets.packages %>bootstrap/dist/js/bootstrap.js',
                    '<%= paths.assets.js %>frontend.js'
                ],
                dest: '<%= paths.js %>frontend.js'
            },
            js_backend: {
                src: [
                    '<%= paths.assets.packages %>jquery/dist/jquery.js',
                    '<%= paths.assets.packages %>bootstrap/dist/js/bootstrap.js',
                    '<%= paths.assets.packages %>metisMenu/dist/metisMenu.js',
                    '<%= paths.assets.packages %>DataTables/media/js/jquery.dataTables.js',
                    '<%= paths.assets.packages %>datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js',
                    '<%= paths.assets.packages %>startbootstrap-sb-admin-2/dist/js/sb-admin-2.js'
                ],
                dest: '<%= paths.js %>backend.js'
            }
        },

        less: {
            development: {
                options: {
                    compress: false //NOT minifying the result
                },
                files: {
                    //compiling frontend.less into frontend.css
                    "<%= paths.css %>frontend.css":"<%= paths.assets.less %>frontend/frontend.less",
                    //compiling backend.less into backend.css
                    "<%= paths.css %>backend.css":"<%= paths.assets.less %>backend/backend.less",                    
                    "<%= paths.css %>login.css":"<%= paths.assets.less %>backend/login.less"
                }
            },
            production: {
                options: {
                    compress: true //minifying the result
                },
                files: {
                    //compiling frontend.less into frontend.min.css
                    "<%= paths.css %>frontend.min.css":"<%= paths.assets.less %>frontend/frontend.less",
                    //compiling backend.less into backend.min.css
                    "<%= paths.css %>backend.min.css":"<%= paths.assets.less %>backend/backend.less",                    
                    "<%= paths.css %>login.min.css":"<%= paths.assets.less %>backend/login.less"
                }
            }
        },

        uglify: {
            options: {
                mangle: false  // Use if you want the names of your functions and variables unchanged
            },
            frontend: {
                files: {
                    '<%= paths.js %>frontend.min.js': '<%= paths.js %>frontend.js'
                }
            },
            backend: {
                files: {
                    '<%= paths.js %>backend.min.js': '<%= paths.js %>backend.js',
                    '<%= paths.js %>backend/news/news.min.js': '<%= paths.js %>backend/news/news.js',
                    '<%= paths.js %>backend/global-categories/global-categories.min.js': '<%= paths.js %>backend/global-categories/global-categories.js',
                    '<%= paths.js %>backend/service-categories/service-categories.min.js': '<%= paths.js %>backend/service-categories/service-categories.js',
                    '<%= paths.js %>backend/services/services.min.js': '<%= paths.js %>backend/services/services.js',
                    '<%= paths.js %>backend/centres/centres.min.js': '<%= paths.js %>backend/centres/centres.js',
                    '<%= paths.js %>backend/members/members.min.js': '<%= paths.js %>backend/members/members.js',
                    '<%= paths.js %>backend/links/links.min.js': '<%= paths.js %>backend/links/links.js',
                    '<%= paths.js %>backend/carousel/carousel.min.js': '<%= paths.js %>backend/carousel/carousel.js',
                    '<%= paths.js %>backend/document_categories/document_categories.min.js': '<%= paths.js %>backend/document_categories/document_categories.js',
                    '<%= paths.js %>backend/documents/documents.min.js': '<%= paths.js %>backend/documents/documents.js',
                    '<%= paths.js %>backend/videos/videos.min.js': '<%= paths.js %>backend/videos/videos.js',
                    '<%= paths.js %>backend/users/users.min.js': '<%= paths.js %>backend/users/users.js',
                    '<%= paths.js %>backend/organizations/organizations.min.js': '<%= paths.js %>backend/organizations/organizations.js'
                }
            }
        },
        
        watch: {
            js_frontend: {
                files: [
                    //watched files
                    '<%= paths.assets.packages %>jquery/jquery.js',
                    '<%= paths.assets.packages %>bootstrap/dist/js/bootstrap.js',
                    '<%= paths.assets.js %>frontend.js'
                ],
                tasks: ['concat:js_frontend','uglify:frontend'],     //tasks to run
                options: {
                    livereload: true                        //reloads the browser
                }
            },
            js_backend: {
                files: [
                    //watched files
                    '<%= paths.js %>backend/news/news.js',
                    '<%= paths.js %>backend/global-categories/global-categories.js',
                    '<%= paths.js %>backend/service-categories/service-categories.js',
                    '<%= paths.js %>backend/services/services.js'
                ],
                tasks: ['concat:js_backend','uglify:backend'],     //tasks to run
                options: {
                    livereload: true                        //reloads the browser
                }
            },
            less: {
                files: [
                    '<%= paths.assets.less %>/backend/*.less',
                    '<%= paths.assets.less %>/frontend/*.less'
                ],  //watched files
                tasks: ['less'],                          //tasks to run
                options: {
                    livereload: true                        //reloads the browser
                }
            },
            index: {
                files: ['./public/index.html'],  //watched files
                options: {
                    livereload: true                        //reloads the browser
                }
            },
            php: {
                files: [
                    '<%= paths.php_app %>/controllers/Marketing/*.php',
                    '<%= paths.php_app %>/views/marketing/*.php',
                    '<%= paths.php_app %>/views/marketing/*/*.php'
                ],
                options: {
                    livereload: true                        //reloads the browser
                }
            }
        }
    });

    // Plugin loading
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    // Task definition
    grunt.registerTask('default', ['concat', 'less', 'uglify']);
};