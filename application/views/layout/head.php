<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->config->item('nama_aplikasi') ?> - Dashboard</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="<?= base_url('assets/adminlte/')?>plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/adminlte/')?>dist/css/adminlte.min.css?v=3.2.0">
    <script nonce="6110a63a-e34e-4496-889d-a198cc376529">
    (function(w, d) {
        ! function(bb, bc, bd, be) {
            bb[bd] = bb[bd] || {};
            bb[bd].executed = [];
            bb.zaraz = {
                deferred: [],
                listeners: []
            };
            bb.zaraz.q = [];
            bb.zaraz._f = function(bf) {
                return async function() {
                    var bg = Array.prototype.slice.call(arguments);
                    bb.zaraz.q.push({
                        m: bf,
                        a: bg
                    })
                }
            };
            for (const bh of ["track", "set", "debug"]) bb.zaraz[bh] = bb.zaraz._f(bh);
            bb.zaraz.init = () => {
                var bi = bc.getElementsByTagName(be)[0],
                    bj = bc.createElement(be),
                    bk = bc.getElementsByTagName("title")[0];
                bk && (bb[bd].t = bc.getElementsByTagName("title")[0].text);
                bb[bd].x = Math.random();
                bb[bd].w = bb.screen.width;
                bb[bd].h = bb.screen.height;
                bb[bd].j = bb.innerHeight;
                bb[bd].e = bb.innerWidth;
                bb[bd].l = bb.location.href;
                bb[bd].r = bc.referrer;
                bb[bd].k = bb.screen.colorDepth;
                bb[bd].n = bc.characterSet;
                bb[bd].o = (new Date).getTimezoneOffset();
                if (bb.dataLayer)
                    for (const bo of Object.entries(Object.entries(dataLayer).reduce(((bp, bq) => ({
                            ...bp[1],
                            ...bq[1]
                        })), {}))) zaraz.set(bo[0], bo[1], {
                        scope: "page"
                    });
                bb[bd].q = [];
                for (; bb.zaraz.q.length;) {
                    const br = bb.zaraz.q.shift();
                    bb[bd].q.push(br)
                }
                bj.defer = !0;
                for (const bs of [localStorage, sessionStorage]) Object.keys(bs || {}).filter((bu => bu
                    .startsWith("_zaraz_"))).forEach((bt => {
                    try {
                        bb[bd]["z_" + bt.slice(7)] = JSON.parse(bs.getItem(bt))
                    } catch {
                        bb[bd]["z_" + bt.slice(7)] = bs.getItem(bt)
                    }
                }));
                bj.referrerPolicy = "origin";
                bj.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(bb[bd])));
                bi.parentNode.insertBefore(bj, bi)
            };
            ["complete", "interactive"].includes(bc.readyState) ? zaraz.init() : bb.addEventListener(
                "DOMContentLoaded", zaraz.init)
        }(w, d, "zarazData", "script");
    })(window, document);
    </script>
      <script src="<?= base_url('assets/swal/')?>sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="<?= base_url('assets/swal/')?>sweetalert2.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li> -->
            </ul>

            <ul class="navbar-nav ml-auto">

                <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li> -->

                <!-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">

                            <div class="media">
                                <img src="<?= base_url('assets/adminlte/')?>dist/img/user1-128x128.jpg"
                                    alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">

                            <div class="media">
                                <img src="<?= base_url('assets/adminlte/')?>dist/img/user8-128x128.jpg"
                                    alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">

                            <div class="media">
                                <img src="<?= base_url('assets/adminlte/')?>dist/img/user3-128x128.jpg"
                                    alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li> -->
<!-- 
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li> -->


                <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li> -->
            </ul>
        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="index3.html" class="brand-link">
                <img src="<?= base_url('assets/adminlte/')?>dist/img/watermelon.png"
                    alt="<?= $this->config->item('nama_aplikasi') ?> Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light"><?= $this->config->item('nama_aplikasi') ?></span>
            </a>

            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/adminlte/')?>dist/img/muslimah.png"
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?=$this->session->userdata('username')?></a>
                    </div>
                </div>

                <!-- <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div> -->

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Side Bar
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">





                                <li class="nav-item">
                                    <a href="<?= base_url('login/logout') ?>" class="nav-link ">
                                        <i class="nav-icon fas fa-power-off"></i>
                                        <p>
                                            Logout
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>




                            </ul>
                </nav>

            </div>

        </aside>