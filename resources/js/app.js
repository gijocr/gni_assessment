/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');
require('select2');
require('select2/dist/css/select2.min.css');
require('@ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.min.css');

window.$(document).ready(() => {
  window.$('.datatable').DataTable();
  window.$('.select2').select2({
    theme: 'bootstrap4',
    placeholder: 'Select',
  });

  window.$('[data-dismiss="alert"]').on('click', function() {
    window
      .$(this)
      .parents('.alert')
      .remove();
  });
});

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./src/Routes');
