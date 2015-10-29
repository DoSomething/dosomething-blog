'use strict';

var fender = require('fender');

module.exports = function(grunt) {

  /**
   * Use fender for nice and easy Grunt configuration. Optionally, pass a
   * configuration object with overrides for default build settings.
   *
   * If using the default settings, the configuration object may be omitted!
   */
  fender(grunt, {
    bundles: {
      'blog': './web/app/themes/dosomething/js/blog.js'
    },
    output: 'web/app/themes/dosomething/dist/',
  });


};

