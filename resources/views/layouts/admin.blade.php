<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('panel.site_title') }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
        rel="stylesheet" />
    <link href="{{ asset('css/adminltev3.css') }}" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    @yield('styles')
    <style>
        .my-button {
            margin-top: 7px;
            background-size: cover;
            background-repeat: no-repeat;
            width: 30px;
            height: 30px;
            border: none;
        }
    </style>
</head>

<body class="sidebar-mini layout-fixed" style="height: auto;">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            @if (count(config('panel.available_languages', [])) > 1)
                <ul class="navbar-nav ml-auto ul1">
                    <li>
                        <div class="form-group">
                            <button class="my-button rounded-circle" style=" background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJsAAACnCAMAAAAxB95oAAAAn1BMVEX///8hHyAREiQAAADIyMlgXV4QDg+7urodGxwODyL7+/sbGRrx8fEYFRf19fXR0dHl5eUGAANaWFl8fHy0tLRsbGycnJxkY2PX19eQkJAAAByHhoapqanAwMCioqLf399GRUUyMjJ1dHUpKCg9Ozx6e4IAABRRUFApKTNubnWNjZMbHCtJSVJaWmNAQEpnZ3AjJTQbHCMODRg2N0GXl58DjvltAAAJgklEQVR4nO1cCXuiPBetRiNb2GRRcQEFEdfOZ///b/uSAFbBhaDEPu/jmc501FKO9+auufHr64MPPvjggw8++DOQJFUhUCXp3VTOoWi9oRtAkAIG7rCnKe8mRTHwzBZmhIRWCgFhli3TG7ybmGIFZ7R+QQgG1luFZ8UAlXjlQCC23sZMn99hlrKb6++h1pHBXWYEQO68g5qF7gstEx16g14dULaAaxCAw5ua9VifJ71yllxHqCY1KrkW1zWnB7AytVYLBjytdV5do1Src37UJmzUMLkJL2pKl0WjBLDLK3wxi42j4GJWsWHBxXyozdjFhgU348LNq8XN40FNiuUa3OSYR6quLaqHhF8IC40Dt3EdlWKljjlw84xa3AwOC0412T0IATTVxrkpwYUpIFjRMuSg+dCgn1VVMgC+ucAFoHxhHgJCEBY5C6j5ZGTwawrQp5FIteb+AtekmA80AECLIO7O+3bcIpnxL0PQfMGqnbiB+UlLujaZerYbm3NnPNFmCvFliuYZIHRPlgOadyKnQF9KyiSCi2f0Puz1Tz/ffLjPCwWjW+WntYnUzSTHoWzIuAmLqstnEAicuTHcif2KukjXmywwXCLInNZbj3IDU4ZLpuklvcY4ZUhdiIBYUsVZ6q6bdiKSTaMpdFmCY1b7QLvZFG5Gjc5gUunX1xAQckLQbF7eIb0jw+ux3aVj0cQKNdt7IJaAYvaMQolR49ZAuME6WaIHG/dwhJtRp6HmGI3Ljaw3g80QUkwxN9jsehvgIquu3KqH4HrQfdSC/RoX9mEL+c1mvsT3IibHm0J1UeO+92uIdROw64YkSsawAT7nII2aGmUwKbibb9f4WKkhq3KkEOHl1gSdC5D8jXnLwAFc8jeJFCfAZokNnk0u6XNoJCk+iVsM1eaAZCHA59PxJZJjcHLYtbWMOj6xDjScx8qVHanuyzhP5tF9I1BdyOBIiPtgy5OfgoUDNwqr3U4NSXrAb7tNWsiVszFSncoLjnMZRE9yUEVwKmnXcemn5lBwOtKCVTywg5cm4uQ/MqSCe2yqOnex4RVHSk7j8UaQSYy0y3kKiNb3D82Btmk4NAULIMHh0YYG3SYBvELCL1JzuBsddJ+/IaSgzS5wr3vZBXxaW1fg0Fvbt8Si2PR17tMhFJJLb+5et8L7rzYOnW5AA/NaHTAj3qMF4zfNSuVjIsai7EqsBXmF72BIARolh2BhlEyfQ0SpcfdsFyxi2mOFYK7l9HRtTluBLfA+hWZMzLRDbwC/74ytsdP3QbrZAcw3U8NJkJcND5K9P4LsEfC4pbplTpNeJhfLL++SAz+zD7034c/RhEaY1YGKA8DZbqkgA+BkHnkQQmRyZjYLDYQgyB9K05hs8SLyHFjE05PDJc8ZIZ+5FQxFH3SsGELfR+C3M6Roluf6vu961tlM9BAg34cwtjoDvcGQL6l6Z+qZfhgsyIQnDAcDIF/kSJKkqpfT5FpLBgOiVqzxRRD6pjft6OqLo5gymboLOiwuC3SaEYY66cXdT2lxckx6bnpIdz4EQaYj5wvX6bxOhsowRuBiNiA1Az2U75YCY4DIW8AGcT5SghmiePgadjPvwgpTt5r+ag0I8m0Hq8tClo4rZsHLYEv2XmAgk6DkvX49vg3gzdaV1IfAzmkWyeFfEjyddDqwNP0M3JNCZgEybt1iYqDfzTXFLZFDlerbOxhecfnn7e4x9l/X/b6KbflsMUr2ld/0VHP6yvQzsM+5SDG8cYchgBcjb+o1ck+0cDRYGnUrVnQ6kIVrW0EdHLkKZlKeNxRg/QQvLI1slYtNB1yb0FJNWK5iyuRgWJdaaQpPAMOSVSoxgrFnzU7uXlJnlhfDa7usw9Lsft1WieIXR7Gu7rJpACdrGLLftW2768vkAbreaXCMAjmhZmVtFTV6o9bMhssFnFwaMD/Yc2OE3CmqAtYyB7UwmX0zPulh+QBIGqyuYFyIMbBbJ/XUL9+iENx8hyUB3xOHFVyqtWjNlVCwBNnuFdHJl39pBBPmua7UKV1lXwqOcZwjhV/QVH6m7gy5G9YLflCAmTCwwy2h8D7qbMEpJT2VcZocLIS23GiUK7GgDHZLnVQZlTWy/ptingsZZSmU7lcZBYbs+YhTaYw3r1O0cwFlrm0WVppSZh9NkPrVRozznkf/l1wW17SK531uZ4C3QPesqgABGuqVk+lkTdTOg7OCv9yY97r0YsC6CVmgvuzk5FLXZlU+wFV9RzHHLKh8EiA7VZcJGrrkQdUTeeTyBWvloFXUCAVNT1InR12bdCVdvg3mvVW2s0SQRHY6Vknd/JxpVJ+5k95jPLnWVaj5kIWtdBmvZU1FpoynOwzsb7GTw65NMRkPXzC3+ZlWDCWHsyIPeDhjYj0Xwlxu9Vm54dxfU1xFK9cYD7mxbnjN2U/FwEXnS2uxn1gxWE9Z2jVO7MhyX65xPsqwH9N5mhsuduoc3Uq9NQOqhtMXAFY6CXEG5iOmH24UtdZbPfCxBU7cmONCfTDHBYbPHXiaG2us73DkxjrKrYd1TufWgXyrdXITqs3LiUCbuVsz5saNvT2o1jrWzA5hUaPJxZr51kStPpLk8nC/Rr3hFp09hWUGZDbSnBxqWnLwzlbdI3KPPgDpOTz38UlSLwDlvZmXQIAg6D25Bd3phvDqR249QQvh3xh2X3HqSO85diikzVrDgPVhZB3fVmg7vZcN3Uh0uMHxvL7tdrsmRbcq8h937b7nOXTk4U99fN0HH3zwwQcf/LfR+bv4Km9a/xl8tf8uKDeRfrXzf9sjUcz+d3rlHSDcxO8R5SCKG0JKNI6b7H/4lfZx805uo+0ORP9W4moRiatV+5/385Os/+evlv7Rgsfk+6WSoyqhf4lA2rmCyPMj/Id8iZnaqE6X602URNvIjA7JPEk8xz1Y6+lPNHY7P9vvl8oNv/mVsdxsRsvNbjUSl5tvcYS/jZbH7/12vztud5v99rhfiSduh8MhOkQb4xCBY3QEsfMTTWE0AEB3wGvXm7iPEidKkgjfD0siOqz/JfjbOkm2yWEXbe01/oHoZ7fMuYn79SrZH5Ptbnc47I7JerqdrtdOYu2mkTt6LbdVtDvgryQ6JoTiLtkTirv94TA8rJMtfm66xZRP3Nqb1WgVj/bbzWZ/bG+wtJer0XYD9sfV5vhiO8UqbI82+I+4GdHv2OrIg/YSa/r7u71ZElpUICk3YpOjdr4KySoVsSOhvqQRFyJmzklMPVTusMTL+/153/tH8X+iI7nZrMvWTQAAAABJRU5ErkJggg==');">
                            </button>
                        </div>
                        <ul class="list-unstyled" >
                          @if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                          @can('profile_password_edit')
                              <li class="nav-item ">
                                  <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}"
                                      href="{{ route('profile.password.edit') }}">
                                      <i class="fa-fw fas fa-key nav-icon">
                                      </i>
                                      
                                          {{ trans('global.my_profile') }}
                                      
                                  </a>
                              </li>
                          @endcan
                      @endif
                      <li class="nav-item">
                          <a href="#" class="nav-link"
                              onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                             
                                  <i class="fas fa-fw fa-sign-out-alt nav-icon">
                                  </i>
                                  {{ trans('global.logout') }}
                              
                          </a>
                      </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            {{ strtoupper(app()->getLocale()) }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            @foreach (config('panel.available_languages') as $langLocale => $langName)
                                <a class="dropdown-item"
                                    href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }}
                                    ({{ $langName }})</a>
                            @endforeach
                        </div>
                    </li>
                </ul>
            @endif

        </nav>

        @include('partials.menu')
        <div class="content-wrapper" style="min-height: 917px;">
            <!-- Main content -->
            <section class="content" style="padding-top: 20px">
                @if (session('message'))
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                        </div>
                    </div>
                @endif
                @if ($errors->count() > 0)
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')
            </section>
            <!-- /.content -->
        </div>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.0.0-alpha
            </div>
            <strong> &copy;</strong> {{ trans('global.allRightsReserved') }}
        </footer>
        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.ul1 ul').slideUp();
            $('.ul1 li').click(function() {
                $(this).children('ul').slideToggle("slow");
            });
        });
    </script>
    <script>
        $(function() {
            let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
            let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
            let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
            let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
            let printButtonTrans = '{{ trans('global.datatables.print') }}'
            let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'
            let selectAllButtonTrans = '{{ trans('global.select_all') }}'
            let selectNoneButtonTrans = '{{ trans('global.deselect_all') }}'

            let languages = {
                'fr': 'https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json',
                'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json',
                'ar': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json'
            };

            $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, {
                className: 'btn'
            })
            $.extend(true, $.fn.dataTable.defaults, {
                language: {
                    url: languages['{{ app()->getLocale() }}']
                },
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }, {
                    orderable: false,
                    searchable: false,
                    targets: -1
                }],
                select: {
                    style: 'multi+shift',
                    selector: 'td:first-child'
                },
                order: [],
                scrollX: true,
                pageLength: 100,
                dom: 'lBfrtip<"actions">',
                buttons: [{
                        extend: 'selectAll',
                        className: 'btn-primary',
                        text: selectAllButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        },
                        action: function(e, dt) {
                            e.preventDefault()
                            dt.rows().deselect();
                            dt.rows({
                                search: 'applied'
                            }).select();
                        }
                    },
                    {
                        extend: 'selectNone',
                        className: 'btn-primary',
                        text: selectNoneButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'copy',
                        className: 'btn-default',
                        text: copyButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn-default',
                        text: csvButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        className: 'btn-default',
                        text: excelButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn-default',
                        text: pdfButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        className: 'btn-default',
                        text: printButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'colvis',
                        className: 'btn-default',
                        text: colvisButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    }
                ]
            });

            $.fn.dataTable.ext.classes.sPageButton = '';
        });
    </script>
    <script>
        /*!
         * AdminLTE v3.0.0-alpha.2 (https://adminlte.io)
         * Copyright 2014-2018 Abdullah Almsaeed <abdullah@almsaeedstudio.com>
         * Licensed under MIT (https://github.com/almasaeed2010/AdminLTE/blob/master/LICENSE)
         */
        ! function(e, t) {
            "object" == typeof exports && "undefined" != typeof module ? t(exports) : "function" == typeof define && define
                .amd ? define(["exports"], t) : t(e.adminlte = {})
        }(this, function(e) {
            "use strict";
            var i, t, o, n, r, a, s, c, f, l, u, d, h, p, _, g, y, m, v, C, D, E, A, O, w, b, L, S, j, T, I, Q, R, P, x,
                B, M, k, H, N, Y, U, V, G, W, X, z, F, q, J, K, Z, $, ee, te, ne = "function" == typeof Symbol &&
                "symbol" == typeof Symbol.iterator ? function(e) {
                    return typeof e
                } : function(e) {
                    return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ?
                        "symbol" : typeof e
                },
                ie = function(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                },
                oe = (i = jQuery, t = "ControlSidebar", o = "lte.control.sidebar", n = i.fn[t], r = ".control-sidebar",
                    a = '[data-widget="control-sidebar"]', s = ".main-header", c = "control-sidebar-open", f =
                    "control-sidebar-slide-open", l = {
                        slide: !0
                    }, u = function() {
                        function n(e, t) {
                            ie(this, n), this._element = e, this._config = this._getConfig(t)
                        }
                        return n.prototype.show = function() {
                            this._config.slide ? i("body").removeClass(f) : i("body").removeClass(c)
                        }, n.prototype.collapse = function() {
                            this._config.slide ? i("body").addClass(f) : i("body").addClass(c)
                        }, n.prototype.toggle = function() {
                            this._setMargin(), i("body").hasClass(c) || i("body").hasClass(f) ? this.show() : this
                                .collapse()
                        }, n.prototype._getConfig = function(e) {
                            return i.extend({}, l, e)
                        }, n.prototype._setMargin = function() {
                            i(r).css({
                                top: i(s).outerHeight()
                            })
                        }, n._jQueryInterface = function(t) {
                            return this.each(function() {
                                var e = i(this).data(o);
                                if (e || (e = new n(this, i(this).data()), i(this).data(o, e)),
                                    "undefined" === e[t]) throw new Error(t + " is not a function");
                                e[t]()
                            })
                        }, n
                    }(), i(document).on("click", a, function(e) {
                        e.preventDefault(), u._jQueryInterface.call(i(this), "toggle")
                    }), i.fn[t] = u._jQueryInterface, i.fn[t].Constructor = u, i.fn[t].noConflict = function() {
                        return i.fn[t] = n, u._jQueryInterface
                    }, u),
                re = (d = jQuery, h = "Layout", p = "lte.layout", _ = d.fn[h], g = ".main-sidebar", y = ".main-header",
                    m = ".content-wrapper", v = ".main-footer", C = "hold-transition", D = function() {
                        function n(e) {
                            ie(this, n), this._element = e, this._init()
                        }
                        return n.prototype.fixLayoutHeight = function() {
                            var e = {
                                    window: d(window).height(),
                                    header: d(y).outerHeight(),
                                    footer: d(v).outerHeight(),
                                    sidebar: d(g).height()
                                },
                                t = this._max(e);
                            d(m).css("min-height", e.window - e.header - e.footer), d(g).css("min-height", e
                                .window - e.header)
                        }, n.prototype._init = function() {
                            var e = this;
                            d("body").removeClass(C), this.fixLayoutHeight(), d(g).on(
                                "collapsed.lte.treeview expanded.lte.treeview collapsed.lte.pushmenu expanded.lte.pushmenu",
                                function() {
                                    e.fixLayoutHeight()
                                }), d(window).resize(function() {
                                e.fixLayoutHeight()
                            }), d("body, html").css("height", "auto")
                        }, n.prototype._max = function(t) {
                            var n = 0;
                            return Object.keys(t).forEach(function(e) {
                                t[e] > n && (n = t[e])
                            }), n
                        }, n._jQueryInterface = function(t) {
                            return this.each(function() {
                                var e = d(this).data(p);
                                e || (e = new n(this), d(this).data(p, e)), t && e[t]()
                            })
                        }, n
                    }(), d(window).on("load", function() {
                        D._jQueryInterface.call(d("body"))
                    }), d.fn[h] = D._jQueryInterface, d.fn[h].Constructor = D, d.fn[h].noConflict = function() {
                        return d.fn[h] = _, D._jQueryInterface
                    }, D),
                ae = (E = jQuery, A = "PushMenu", w = "." + (O = "lte.pushmenu"), b = E.fn[A], L = {
                    COLLAPSED: "collapsed" + w,
                    SHOWN: "shown" + w
                }, S = {
                    screenCollapseSize: 768
                }, j = {
                    TOGGLE_BUTTON: '[data-widget="pushmenu"]',
                    SIDEBAR_MINI: ".sidebar-mini",
                    SIDEBAR_COLLAPSED: ".sidebar-collapse",
                    BODY: "body",
                    OVERLAY: "#sidebar-overlay",
                    WRAPPER: ".wrapper"
                }, T = "sidebar-collapse", I = "sidebar-open", Q = function() {
                    function n(e, t) {
                        ie(this, n), this._element = e, this._options = E.extend({}, S, t), E(j.OVERLAY).length ||
                            this._addOverlay()
                    }
                    return n.prototype.show = function() {
                        E(j.BODY).addClass(I).removeClass(T);
                        var e = E.Event(L.SHOWN);
                        E(this._element).trigger(e)
                    }, n.prototype.collapse = function() {
                        E(j.BODY).removeClass(I).addClass(T);
                        var e = E.Event(L.COLLAPSED);
                        E(this._element).trigger(e)
                    }, n.prototype.toggle = function() {
                        (E(window).width() >= this._options.screenCollapseSize ? !E(j.BODY).hasClass(T) : E(j
                            .BODY).hasClass(I)) ? this.collapse(): this.show()
                    }, n.prototype._addOverlay = function() {
                        var e = this,
                            t = E("<div />", {
                                id: "sidebar-overlay"
                            });
                        t.on("click", function() {
                            e.collapse()
                        }), E(j.WRAPPER).append(t)
                    }, n._jQueryInterface = function(t) {
                        return this.each(function() {
                            var e = E(this).data(O);
                            e || (e = new n(this), E(this).data(O, e)), t && e[t]()
                        })
                    }, n
                }(), E(document).on("click", j.TOGGLE_BUTTON, function(e) {
                    e.preventDefault();
                    var t = e.currentTarget;
                    "pushmenu" !== E(t).data("widget") && (t = E(t).closest(j.TOGGLE_BUTTON)), Q
                        ._jQueryInterface.call(E(t), "toggle")
                }), E.fn[A] = Q._jQueryInterface, E.fn[A].Constructor = Q, E.fn[A].noConflict = function() {
                    return E.fn[A] = b, Q._jQueryInterface
                }, Q),
                se = (R = jQuery, P = "Treeview", B = "." + (x = "lte.treeview"), M = R.fn[P], k = {
                    SELECTED: "selected" + B,
                    EXPANDED: "expanded" + B,
                    COLLAPSED: "collapsed" + B,
                    LOAD_DATA_API: "load" + B
                }, H = ".nav-item", N = ".nav-treeview", Y = ".menu-open", V = "menu-open", G = {
                    trigger: (U = '[data-widget="treeview"]') + " " + ".nav-link",
                    animationSpeed: 300,
                    accordion: !0
                }, W = function() {
                    function i(e, t) {
                        ie(this, i), this._config = t, this._element = e
                    }
                    return i.prototype.init = function() {
                        this._setupListeners()
                    }, i.prototype.expand = function(e, t) {
                        var n = this,
                            i = R.Event(k.EXPANDED);
                        if (this._config.accordion) {
                            var o = t.siblings(Y).first(),
                                r = o.find(N).first();
                            this.collapse(r, o)
                        }
                        e.slideDown(this._config.animationSpeed, function() {
                            t.addClass(V), R(n._element).trigger(i)
                        })
                    }, i.prototype.collapse = function(e, t) {
                        var n = this,
                            i = R.Event(k.COLLAPSED);
                        e.slideUp(this._config.animationSpeed, function() {
                            t.removeClass(V), R(n._element).trigger(i), e.find(Y + " > " + N).slideUp(),
                                e.find(Y).removeClass(V)
                        })
                    }, i.prototype.toggle = function(e) {
                        var t = R(e.currentTarget),
                            n = t.next();
                        if (n.is(N)) {
                            e.preventDefault();
                            var i = t.parents(H).first();
                            i.hasClass(V) ? this.collapse(R(n), i) : this.expand(R(n), i)
                        }
                    }, i.prototype._setupListeners = function() {
                        var t = this;
                        R(document).on("click", this._config.trigger, function(e) {
                            t.toggle(e)
                        })
                    }, i._jQueryInterface = function(n) {
                        return this.each(function() {
                            var e = R(this).data(x),
                                t = R.extend({}, G, R(this).data());
                            e || (e = new i(R(this), t), R(this).data(x, e)), "init" === n && e[n]()
                        })
                    }, i
                }(), R(window).on(k.LOAD_DATA_API, function() {
                    R(U).each(function() {
                        W._jQueryInterface.call(R(this), "init")
                    })
                }), R.fn[P] = W._jQueryInterface, R.fn[P].Constructor = W, R.fn[P].noConflict = function() {
                    return R.fn[P] = M, W._jQueryInterface
                }, W),
                ce = (X = jQuery, z = "Widget", q = "." + (F = "lte.widget"), J = X.fn[z], K = {
                    EXPANDED: "expanded" + q,
                    COLLAPSED: "collapsed" + q,
                    REMOVED: "removed" + q
                }, $ = "collapsed-card", ee = {
                    animationSpeed: "normal",
                    collapseTrigger: (Z = {
                        DATA_REMOVE: '[data-widget="remove"]',
                        DATA_COLLAPSE: '[data-widget="collapse"]',
                        CARD: ".card",
                        CARD_HEADER: ".card-header",
                        CARD_BODY: ".card-body",
                        CARD_FOOTER: ".card-footer",
                        COLLAPSED: ".collapsed-card"
                    }).DATA_COLLAPSE,
                    removeTrigger: Z.DATA_REMOVE
                }, te = function() {
                    function n(e, t) {
                        ie(this, n), this._element = e, this._parent = e.parents(Z.CARD).first(), this._settings = X
                            .extend({}, ee, t)
                    }
                    return n.prototype.collapse = function() {
                        var e = this;
                        this._parent.children(Z.CARD_BODY + ", " + Z.CARD_FOOTER).slideUp(this._settings
                            .animationSpeed,
                            function() {
                                e._parent.addClass($)
                            });
                        var t = X.Event(K.COLLAPSED);
                        this._element.trigger(t, this._parent)
                    }, n.prototype.expand = function() {
                        var e = this;
                        this._parent.children(Z.CARD_BODY + ", " + Z.CARD_FOOTER).slideDown(this._settings
                            .animationSpeed,
                            function() {
                                e._parent.removeClass($)
                            });
                        var t = X.Event(K.EXPANDED);
                        this._element.trigger(t, this._parent)
                    }, n.prototype.remove = function() {
                        this._parent.slideUp();
                        var e = X.Event(K.REMOVED);
                        this._element.trigger(e, this._parent)
                    }, n.prototype.toggle = function() {
                        this._parent.hasClass($) ? this.expand() : this.collapse()
                    }, n.prototype._init = function(e) {
                        var t = this;
                        this._parent = e, X(this).find(this._settings.collapseTrigger).click(function() {
                            t.toggle()
                        }), X(this).find(this._settings.removeTrigger).click(function() {
                            t.remove()
                        })
                    }, n._jQueryInterface = function(t) {
                        return this.each(function() {
                            var e = X(this).data(F);
                            e || (e = new n(X(this), e), X(this).data(F, "string" == typeof t ? e : t)),
                                "string" == typeof t && t.match(/remove|toggle/) ? e[t]() : "object" ===
                                ("undefined" == typeof t ? "undefined" : ne(t)) && e._init(X(this))
                        })
                    }, n
                }(), X(document).on("click", Z.DATA_COLLAPSE, function(e) {
                    e && e.preventDefault(), te._jQueryInterface.call(X(this), "toggle")
                }), X(document).on("click", Z.DATA_REMOVE, function(e) {
                    e && e.preventDefault(), te._jQueryInterface.call(X(this), "remove")
                }), X.fn[z] = te._jQueryInterface, X.fn[z].Constructor = te, X.fn[z].noConflict = function() {
                    return X.fn[z] = J, te._jQueryInterface
                }, te);
            e.ControlSidebar = oe, e.Layout = re, e.PushMenu = ae, e.Treeview = se, e.Widget = ce, Object
                .defineProperty(e, "__esModule", {
                    value: !0
                })
        });
        //# sourceMappingURL=adminlte.min.js.map
    </script>
    @yield('scripts')
</body>

</html>
