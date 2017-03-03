
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

window.$ = window.jQuery = require('../../../public/custom_vendors/jQuery/jQuery-2.1.4.min.js');
require('imports?this=>window!../../../public/custom_vendors/site_sidebar/modernizr.js');
require('../../../public/plugins/moment/min/moment.min.js');
window.CodeMirror = require('codemirror');

require('bootstrap-sass');
require('../../../public/plugins/fastclick/lib/fastclick.js');
require('../../../public/plugins/jquery-slimscroll/jquery.slimscroll.min.js');
require('../../../public/plugins/iCheck/icheck.min.js');
plyr = require('../../../public/plugins/plyr/dist/plyr.js');
Dropzone = require('../../../public/plugins/dropzone/dist/dropzone.js');
$.select2 = require('select2');
require('../../../public/custom_vendors/input-mask/jquery.inputmask.js');
require('../../../public/custom_vendors/input-mask/jquery.inputmask.date.extensions.js');
require('../../../public/custom_vendors/input-mask/jquery.inputmask.extensions.js');
require('moment-datepicker');
$.datepicker = require('../../../public/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');
$.colorpicker = require('../../../public/plugins/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js');
require('../../../public/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js');
require('../../../public/plugins/jquery-slimscroll/jquery.slimscroll.min.js');
require('../../../public/plugins/iCheck/icheck.min.js');
require('../../../public/plugins/fastclick/lib/fastclick.js');
$.sparkline = require('../../../public/plugins/bower-jquery-sparkline/dist/jquery.sparkline.retina.js');
require('../../../public/custom_vendors/jvectormap/jquery-jvectormap-1.2.2.min.js');
require('../../../public/custom_vendors/jvectormap/jquery-jvectormap-world-mill-en.js');
Chart = require('../../../public/plugins/chart.js/Chart.js');
require('../../../public/plugins/morris.js/morris.min.js');
toastr = require('../../../public/plugins/toastr/toastr.js');
require('../../../public/plugins/jquery-bar-rating/dist/jquery.barrating.min.js');
$.magnificPopup = require('../../../public/plugins/magnific-popup/dist/jquery.magnific-popup.min.js');
$.fn.extend({
    magnificPopup: function() {
        return $.magnificPopup;
    },
    sparkline: () => {
        return $.sparkline;
    },
    datepicker: () => {
        return $.datepicker;
    },
    colorpicker: () => {
        return $.colorpicker;
    },
    select2: function () {
        return $.select2;
    }
});
require('../../../public/plugins/datatables.net/js/jquery.dataTables.min.js');
require('../../../public/custom_vendors/site_sidebar/jquery.menu-aim.js');
require('../../../public/js/admin.js');
require('../../../public/js/main.js');
require('../../../public/js/modules.js');
require('../../../public/custom_vendors/site_sidebar/index.js');
require('./plugins-default');
/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

window.Vue = require('vue');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
};

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from "laravel-echo"

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });
