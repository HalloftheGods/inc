module.exports = function (grunt) {
    grunt.initConfig({
        jshint: {
            files: ['assets/js/woo-confirmation-email-admin.js'],
            options: {
                globals: {
                    jQuery: true,
                    console: true,
                    module: true
                }
            }
        },
        uglify: {
            build: {
                files: {
                    'assets/js/woo-confirmation-email-admin.min.js': 'assets/js/woo-confirmation-email-admin.js',
                }
            }
        },
        watch: {
            scripts: {
                files: ['assets/js/woo-confirmation-email-admin.js'],
                tasks: ['jshint', 'uglify']
            }
        }
    });

    // load npm tasks
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', ['jshint', 'uglify', 'watch']);
};
