require('./bootstrap');

/* pace-progress */
window.Pace = require('@dlghq/pace-progress');



 window.feather = require('feather-icons')
 feather.replace();

 require('vuexy/app-assets/vendors/js/charts/chart.min.js');

/* toastr */
window.toastr = require('vuexy/app-assets/vendors/js/extensions/toastr.min.js')
toastr.options = {

  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": 300,
  "hideDuration": 1000,
  "timeOut": 5000,
  "extendedTimeOut": 1000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "slideDown",
  "hideMethod": "fadeOut"
}

//Icheck
require('icheck');




require('vuexy/app-assets/vendors/js/forms/validation/jquery.validate.min.js');
require('vuexy/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js');
require('vuexy/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js');
require('vuexy/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js');
require('vuexy/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js');
require('vuexy/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js');
require('vuexy/app-assets/vendors/js/tables/datatable/jszip.min.js');
require('vuexy/app-assets/vendors/js/tables/datatable/pdfmake.min.js');
require('vuexy/app-assets/vendors/js/tables/datatable/vfs_fonts.js');
require('vuexy/app-assets/vendors/js/tables/datatable/buttons.html5.min.js');
require('vuexy/app-assets/vendors/js/tables/datatable/buttons.print.min.js');
require('vuexy/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js');






