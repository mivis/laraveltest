module.exports = function(grunt) {
    // Задачи
    grunt.initConfig({
        
       // Склеиваем css
	cssmin: {
		  combine: {
			files: {
			  'build/output.css': 
              ['../css/app.css']
			}
		  }
		}
    });

    // Загрузка плагинов, установленных с помощью npm install
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    // Задача по умолчанию
    grunt.registerTask('default', ['cssmin']);
};
