<?php

return [


    // admin assets
    "admin" => [

        // admin css assets

        "css" => [

            "default" => [
                // begin:: Global Mandatory Vendors

                "assets/admin/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css",

                // end:: Global Mandatory Vendors



                /* begin:: Global Optional Vendors */

                "assets/admin/vendors/general/tether/dist/css/tether.css",

                "assets/admin/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css",
                "assets/admin/vendors/general/bootstrap-daterangepicker/daterangepicker.css",
                "assets/admin/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css",
                "assets/admin/vendors/general/bootstrap-select/dist/css/bootstrap-select.css",
                "assets/admin/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css",


                "assets/admin/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css",
                "assets/admin/vendors/general/animate.css/animate.css",

                "assets/admin/vendors/general/morris.js/morris.css",

                "assets/admin/vendors/general/socicon/css/socicon.css",
                "assets/admin/vendors/custom/vendors/line-awesome/css/line-awesome.css",
                "assets/admin/vendors/custom/vendors/flaticon/flaticon.css",
                "assets/admin/vendors/custom/vendors/flaticon2/flaticon.css",
                "assets/admin/vendors/general/@fortawesome/fontawesome-free/css/all.min.css",

                /* end:: Global Optional Vendors */


                /*begin::Global Theme Styles(used by all pages)*/

                "assets/admin/css/demo1/style.bundle.css",

                /* end::Global Theme Styles */


                /* begin::Layout Skins(used by all pages) */

                "assets/admin/css/demo1/skins/header/base/light.css",
                "assets/admin/css/demo1/skins/header/menu/light.css",
                "assets/admin/css/demo1/skins/brand/dark.css",
                "assets/admin/css/demo1/skins/aside/dark.css",
            ],

            "login" => [
                "assets/admin/css/demo1/pages/login/login-3.css"
            ],
            "select2" => [
                "assets/admin/vendors/general/select2/dist/css/select2.css",
            ],
            "summernote" => [
                "assets/admin/vendors/general/summernote/dist/summernote.css",
            ],
            "datepicker" => [
                "assets/admin/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css",
                "assets/admin/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css",
            ],
            "bootstrap-select" => [
                "assets/admin/vendors/general/bootstrap-select/dist/css/bootstrap-select.css"
            ],
            "wizard" => [
                "assets/admin/css/demo1/pages/wizard/wizard-2.css"
            ],
            "tree-view" =>[
                "assets/admin/vendors/custom/jstree/jstree.bundle.css"
            ],
            "dropzone" => [
                "assets/admin/vendors/general/dropzone/dist/dropzone.css"
            ],

            "croppie" =>[
                "assets/admin/css/croppie.min.css"
            ],
        ],


        // admin js assets


        "js" => [


            "default" => [

                /*begin:: Global Mandatory Vendors*/
		        "assets/admin/vendors/general/jquery/dist/jquery.js",

                "assets/admin/vendors/general/popper.js/dist/umd/popper.js",
                "assets/admin/vendors/general/bootstrap/dist/js/bootstrap.min.js",
                "assets/admin/vendors/general/js-cookie/src/js.cookie.js",
                "assets/admin/vendors/general/moment/min/moment.min.js",
                "assets/admin/vendors/general/tooltip.js/dist/umd/tooltip.min.js",
                "assets/admin/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js",
                "assets/admin/vendors/general/sticky-js/dist/sticky.min.js",
                "assets/admin/vendors/general/wnumb/wNumb.js",

                /* end:: Global Mandatory Vendors */

                /* begin:: Global Optional Vendors */

                "assets/admin/vendors/general/jquery-form/dist/jquery.form.min.js",
                "assets/admin/vendors/general/block-ui/jquery.blockUI.js",

                "assets/admin/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js",
                "assets/admin/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js",
                "assets/admin/vendors/custom/js/vendors/bootstrap-timepicker.init.js",

                "assets/admin/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js",

                "assets/admin/vendors/general/autosize/dist/autosize.js",


                "assets/admin/vendors/general/jquery-validation/dist/jquery.validate.js",
                "assets/admin/vendors/general/jquery-validation/dist/additional-methods.js",
                "assets/admin/vendors/custom/js/vendors/jquery-validation.init.js",


                "assets/admin/vendors/general/dompurify/dist/purify.js",

		        /* end:: Global Optional Vendors */

		        /*  begin::Global Theme Bundle(used by all pages)  */
		        "assets/admin/js/demo1/scripts.bundle.js",

		        /* end::Global Theme Bundle */

		        /* begin::Page Vendors(used by this page) */

		        #"assets/admin/vendors/custom/fullcalendar/fullcalendar.bundle.js",
                "assets/admin/js/demo1/pages/my-script.js",

                /* end::Page Vendors */

                /*"asset/vendors/general/sweetalert2/dist/sweetalert2.min.js",
                "asset/vendors/custom/js/vendors/sweetalert2.init.js",
                "asset/js/demo1/pages/components/extended/sweetalert2.js"*/
            ],

            "login" => [
                "assets/admin/js/demo1/pages/login/login-general.js"
            ],

            "select2" => [
                "assets/admin/vendors/general/select2/dist/js/select2.full.js",
            ],

            "summernote" => [
                "assets/admin/vendors/general/summernote/dist/summernote.js",
            ],

            "datepicker" => [
                "assets/admin/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js",
                "assets/admin/vendors/custom/js/vendors/bootstrap-datepicker.init.js",
            ],

            "bootstrap-select" => [
                "assets/admin/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js",
                "assets/admin/vendors/general/bootstrap-select/dist/js/bootstrap-select.js",

            ],
            "dropzone" => [
                "assets/admin/vendors/general/dropzone/dist/dropzone.js",
            ],

            "tree-view" => [
                "assets/admin/js/jquery-menu-editor.min.js",
            ],
            "croppie" => [
                "assets/admin/js/croppie.js",
            ]


        ],
    ],


    "website" => [

        // css for website

        "css" => [
            "default" => [
                /*"assets/web/css/bootstrap.min.css",
                "assets/web/css/hover-min.css",
                "assets/web/css/animate.css",
                "assets/web/css/owl.carousel.min.css",
                "assets/web/css/menu.css",
                "assets/web/css/style.css",*/
            ],
        ],


        // js for website

        "js" => [
            "default" => [
                /*"assets/web/js/jquery.min.js",
                "assets/web/js/popper.min.js",
                "assets/web/js/bootstrap.min.js",
                "assets/web/js/owl.carousel.min.js",
                "assets/web/js/modernizr.js",
                "assets/web/js/main.js",
                "assets/web/js/wow.min.js",
               */
            ],
        ]
    ]

];

?>
