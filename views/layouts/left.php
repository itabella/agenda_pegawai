<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php if(Yii::$app->session->get('user.level')=== 'admin') {
                            echo "<img src=".Yii::getAlias('@web')."/uploads/admin.png class='img-circle' alt='User Image' />";

                            }
                            else {
                                echo "<img src=".Yii::getAlias('@web')."/uploads/".Yii::$app->session->get('user.foto')." class='image-circle' alt='User Image'/>";
                       
                            }
                            ?>
                        
            </div>
            <div class="pull-left info">
            <?= @Yii::$app->user->identity->username ?>
                </br>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

       <?php if(Yii::$app->session->get('user.level')=== 'peserta') {
       
        echo
        dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],

                'items' => [
                    ['label' => 'Menu Agenda', 'options' => ['class' => 'header']],
                    
                    [
                        'label' => 'Tampilan kalender', 'icon' => 'glyphicon glyphicon-calendar', 'url' => ['/agenda-peserta/index-date'],
                    ],
                ],
            ]
        ) ;
    }
   else {




         echo 
        dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],

                'items' => [
                    ['label' => 'Menu Agenda', 'options' => ['class' => 'header']],
                    
                    [
                        'label' => 'Agenda',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Daftar Agenda', 'icon' => 'glyphicon glyphicon-edit', 'url' => ['/detail-agenda-pegawai']],
                            ['label' => 'Jenis Agenda', 'icon' => 'fa fa-dashboard', 'url' => ['/jenis-agenda']],
                            ['label' => 'Sifat Agenda', 'icon' => 'fa fa-file-code-o', 'url' => ['/sifat-agenda']],
                            ['label' => 'Perencanaan Agenda', 'icon' => 'fa fa-dashboard', 'url' => ['/agenda']],
                            ['label' => 'Pimpinan Rombongan', 'icon' => 'glyphicon glyphicon-user', 'url' => ['/detail-agenda-pegawai/create']],
                            ['label' => 'Tambah Peserta', 'icon' => 'glyphicon glyphicon-user', 'url' => ['/detail-agenda-peserta/create']],
                        ],
                    ],

                    [
                        'label' => 'Ruang',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Daftar Ruang', 'icon' => 'fa fa-file-code-o', 'url' => ['/ruang']],
                        ],
                    ],

                    [
                        'label' => 'Pegawai',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Pegawai', 'icon' => 'glyphicon glyphicon-user', 'url' => ['/pegawai'],],
                            ['label' => 'Jabatan', 'icon' => 'glyphicon glyphicon-education', 'url' => ['/jabatan'],],
                            ['label' => 'Unit', 'icon' => 'glyphicon glyphicon-oil', 'url' => ['/unit'],],
                            ['label' => 'Tugas', 'icon' => 'glyphicon glyphicon-list-alt', 'url' => ['/tugas'],],
                        ],
                    ],
                    [
                        'label' => 'Agenda Peserta',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Agenda Peserta', 'icon' => 'glyphicon glyphicon-list', 'url' => ['/agenda-peserta'],],
                            ['label' => 'Rincian Agenda Peserta', 'icon' => 'fa fa-file-code-o', 'url' => ['/detail-agenda-peserta'],],
                        ],
                    ],

                    [
                        'label' => 'Tampilan kalender', 'icon' => 'glyphicon glyphicon-calendar', 'url' => ['/agenda-peserta/index-date'],
                    ],
                ],
            ]
        ) ;
    }

    ?>

    </section>

</aside>
