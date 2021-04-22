<?php

return [

    'title' => '',
    'title_prefix' => '',
    'title_postfix' => ' | PEMEX',
    /* Para colocar el icono habria que habilitar cualquier de las 2 siguientes propiedades y bien guardar nuestro logo en public/favicons/favicon.ico */
    'use_ico_only' => false,/* Solo colocar la etiqueta importante del icono */
    'use_full_favicon' => false,/* Es por si queremos aplicar todas las propiedades asociadas a un icon */

    'logo' => '<p><b>Contrataciones temporales de plazas de confianza</b></p>',/* Titulo de nuestro sidebar */
    'logo_img' => 'vendor/adminlte/dist/img/logo-pemex.webp',
    'logo_img_class' => 'brand-image img-circle elevation-3',/* Clase para el logo del sidebar */
    'logo_img_xl' =>  null,/* Es por si nuestro logo es demasiado grande */
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => '',

    'usermenu_enabled' => true,/* Si esta en false, simplemente mostrara el boton de LOGOUT/Salir */
    'usermenu_header' => true,/* Este muestra un encabezado del nombre del usuario autenticado despliegado en el menu */
    'usermenu_header_class' => 'bg-primary',/* Color del encabezado del nombre de usuario autenticado */
    'usermenu_image' => true,/* Si colocamos true, en el Modelo User.php tenemos que definir un metodo public llamado adminlte_image() y retornar la url de la imagen */
    'usermenu_desc' => true,/* Si colocamos true, en el modelo User.php tenemos que definir un metodo public llamado adminlte_desc() y retornar la descripcion */
    'usermenu_profile_url' => false,/* Si colocamos en true nos creara un boton del lado izquierdo de nuestro boton LOGOUT, y en el modelo User.php definir un metodo public llamado adminlte_profile_url() y retornar una ruta */

    'layout_topnav' => null,/* Esto es por si queremos quitar el sidebar y poner todo en la parte superior */
    'layout_boxed' => null,/* Si es true, entonces todo el contenido incluyendo el sidebar sera de un ancho de 1200px */
    'layout_fixed_sidebar' => true,/* Esto es para hacer fixed al sidebar, es decir, al hacer scroll el sidebar no se desplace junto al contenido */
    'layout_fixed_navbar' => true,/* Es para poner fixed la parte superior de nuestro adminlte */
    'layout_fixed_footer' => null,

    /* Clases para modificar la apariencia de nuestro Login */
    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /* Clases para el cuerpo del adminlte */
    'classes_body' => '',/* Modifico algo que tenga que ver con todo el body */
    'classes_brand' => '',/* Modifico el sidebar en general */
    'classes_brand_text' => '',/* Modifico el texto dentro del Sidebar (solo la cabezera) */
    'classes_content_wrapper' => 'bg-white',/* El contenido central se encuentra encerrado en un wrapper */
    'classes_content_header' => '',/* Modifico la cabezera del contenido principal */
    'classes_content' => '',/* Esto modifica el contenido central excluyendo la cabezera */
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',/* Modifca la apariencia del sidebar en general con solamente estas 2 opciones */
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-dark navbar-dark',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/8.-Menu-Configuration
    |
    */

    'menu' => [
        [
            'text'        => 'Contratados',
            'route'         => 'contratados.index',
            'icon'        => 'fa fa-user-circle',
            /* 'label' => 4, */
            /* 'label_color' => 'success', */
        ],
        [
            'text'        => 'Rechazados',
            'route'         => 'rechazados.index',
            'icon'        => 'fa fa-window-close',
            /* 'label' => 4, */
            /* 'label_color' => 'success', */
        ],
        ['header' => 'AREAS DE CONTRATACION'],
        [
            'text'    => 'Area Usuaria',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text'    => 'Registrar Postulados',
                    'route'     => 'area-usuaria',
                    'icon' => 'fa fa-user-plus'
                ],
                /*   [
                    'text'    => 'Lista Rechazados',
                    'route'     => 'rechazados.index',
                    'icon' => 'fa fa-user-times'
                ], */
            ],
        ],
        [
            'text'    => 'Integracion Regional',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text' => 'Validacion',
                    'route'  => 'integracion-regional.index',
                    'icon' => 'fa fa-folder-open',
                ],
            ],
        ],
        [
            'text'    => 'Desarrollo Humano',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text' => 'Validacion',
                    'route'  => 'desarrollo-humano.index',
                    'icon' => 'fa fa-folder-open',
                ],
            ],
        ],
        [
            'text'    => 'Departamento Personal',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text' => 'Validacion',
                    'route'  => 'departamento-personal.index',
                    'icon' => 'fa fa-folder-open',
                ],
            ],
        ],

        ['header' => 'Status'],
        [
            'text'    => 'Consultar Status',
            'route' => 'consultar-status.index',
            'icon'    => 'fas fa-fw fa-share',

        ],

        ['header' => 'RECEPCION DE DOCUMENTOS'],
        [
            'text'    => 'Proceso de Fechas',
            'route' => 'proceso-fechas.index',
            'icon'    => 'fas fa-fw fa-share',

        ],
        ['header' => 'REPORTES EXCEL'],
        [
            'text'    => 'Generar reporte Excel',
            'route' => 'list-contratados-excel',
            'icon'    => 'fas fa-fw fa-share',

        ],
        /*   ['header' => 'labels'],
        [
            'text'       => 'important',
            'icon_color' => 'red',
            'url'        => '#',
        ],
        [
            'text'       => 'warning',
            'icon_color' => 'yellow',
            'url'        => '#',
        ],
        [
            'text'       => 'information',
            'icon_color' => 'cyan',
            'url'        => '#',
        ], */
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/8.-Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    */

    'livewire' => false,
];
