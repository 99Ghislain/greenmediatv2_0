<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #252e38;">
    <!-- Brand Logo -->
    <a href="{{url('/dashboard')}}" class="brand-link">
      <img src="{{ url('assets/img/short-logo-green-media-white.png') }}" alt="GREEN MEDIA AFRICA" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">GREEN MEDIA AFRICA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link active bg-success bg-btn-green">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tableau de Board
              </p>
            </a>
          </li>
          <li class="nav-header" style="color: #64b802; font-weight: bolder;">&nbsp;&nbsp;&nbsp;&nbsp; <i class=" fas fa-folder"></i>&nbsp;&nbsp;Gestion des Articles</li>
          <li class="nav-item has-treeview <?=(isset($pgactive)&&(($pgactive=='allluposts')||($pgactive=='todayluposts')||($pgactive=='addlupost')||($pgactive=='uplupost')))?'menu-open':false;?>" style="display: none;">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-bars"></i>
              <p>
                A la Une 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview border-bottom-phx">
              <li class="nav-item">
                <a href="{{route('admins.addlupost')}}" class="nav-link <?=(isset($pgactive)&&($pgactive=='addlupost'))?'active':false;?>">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Ajouter</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admins.allluposts')}}" class="nav-link <?=(isset($pgactive)&&(($pgactive=='allluposts')||($pgactive=='uplupost')))?'active':false;?>">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Historique</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?=(isset($pgactive)&&(($pgactive=='allposts')||($pgactive=='todayposts')||($pgactive=='addpost')||($pgactive=='uppost')||($pgactive=='allluposts')))?'menu-open':false;?>" style="">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Articles 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview border-bottom-phx">
              <li class="nav-item">
                <a href="{{route('admins.addpost')}}" class="nav-link <?=(isset($pgactive)&&($pgactive=='addpost'))?'active':false;?>">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Ajouter</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admins.allluposts')}}" class="nav-link <?=(isset($pgactive)&&($pgactive=='allluposts'))?'active':false;?>">
                  <i class="fa fa-list nav-icon"></i>
                  <p>A la Une</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admins.allposts')}}" class="nav-link <?=(isset($pgactive)&&(($pgactive=='allposts')||($pgactive=='uppost')))?'active':false;?>">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Tous les Articles</p>
                </a>
              </li>
            </ul>
          </li>
          <!--<li class="nav-item has-treeview <?=(isset($pgactive)&&(($pgactive=='allpbposts')||($pgactive=='todaypbposts')||($pgactive=='addpbpost')||($pgactive=='uppbpost')))?'menu-open':false;?>" style="">-->
          <!--  <a href="#" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-edit"></i>-->
          <!--    <p>-->
          <!--      Publicités Articles -->
          <!--      <i class="fas fa-angle-left right"></i>-->
          <!--    </p>-->
          <!--  </a>-->
          <!--  <ul class="nav nav-treeview border-bottom-phx">-->
          <!--    <li class="nav-item">-->
          <!--      <a href="{{route('admins.addpbpost')}}" class="nav-link <?=(isset($pgactive)&&($pgactive=='addpbpost'))?'active':false;?>">-->
          <!--        <i class="fa fa-plus nav-icon"></i>-->
          <!--        <p>Ajouter</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="{{route('admins.allpbposts')}}" class="nav-link <?=(isset($pgactive)&&(($pgactive=='allpbposts')||($pgactive=='uppbpost')))?'active':false;?>">-->
          <!--        <i class="fa fa-list nav-icon"></i>-->
          <!--        <p>Tous les Articles</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--  </ul>-->
          <!--</li>-->
          <!--<li class="nav-item has-treeview <?=(isset($pgactive)&&(($pgactive=='allanvposts')||($pgactive=='todayanvposts')||($pgactive=='addanvpost')||($pgactive=='upanvpost')))?'menu-open':false;?>" style="">-->
          <!--  <a href="#" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-star"></i>-->
          <!--    <p>-->
          <!--      Anniv & Contribution -->
          <!--      <i class="fas fa-angle-left right"></i>-->
          <!--    </p>-->
          <!--  </a>-->
          <!--  <ul class="nav nav-treeview border-bottom-phx">-->
          <!--    <li class="nav-item">-->
          <!--      <a href="{{route('admins.addanvpost')}}" class="nav-link <?=(isset($pgactive)&&($pgactive=='addanvpost'))?'active':false;?>">-->
          <!--        <i class="fa fa-plus nav-icon"></i>-->
          <!--        <p>Ajouter</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="{{route('admins.allanvposts')}}" class="nav-link <?=(isset($pgactive)&&(($pgactive=='allanvposts')||($pgactive=='upanvpost')))?'active':false;?>">-->
          <!--        <i class="fa fa-list nav-icon"></i>-->
          <!--        <p>Historique</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--  </ul>-->
          <!--</li>-->
          <!--<li class="nav-item has-treeview <?=(isset($pgactive)&&(($pgactive=='allpapers')||($pgactive=='nwpapers')||($pgactive=='addpaper')||($pgactive=='uppaper')))?'menu-open':false;?>" style="">-->
          <!--  <a href="#" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-edit"></i>-->
          <!--    <p>-->
          <!--      Presses Ecrites-->
          <!--      <i class="fas fa-angle-left right"></i>-->
          <!--    </p>-->
          <!--  </a>-->
          <!--  <ul class="nav nav-treeview border-bottom-phx" style="">-->
          <!--    <li class="nav-item">-->
                <!-- <a href="pages/layout/top-nav.html"> -->
          <!--        <p class="nav-link" style="color: #64b802;">&nbsp;&nbsp;&nbsp;Presses Ecrites:</p>-->
                <!-- </a> -->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="{{route('admins.addpaper')}}" class="nav-link <?=(isset($pgactive)&&($pgactive=='addpaper'))?'active':false;?>">-->
          <!--        <i class="fa fa-plus nav-icon"></i>-->
          <!--        <p>Ajouter</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="{{route('admins.nwpapers')}}" class="nav-link <?=(isset($pgactive)&&($pgactive=='nwpapers'))?'active':false;?>">-->
          <!--        <i class="fa fa-list nav-icon"></i>-->
          <!--        <p>Ecrits en Ligne</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="{{route('admins.allpapers')}}" class="nav-link <?=(isset($pgactive)&&(($pgactive=='allpapers')||($pgactive=='uppaper')))?'active':false;?>">-->
          <!--        <i class="fa fa-list nav-icon"></i>-->
          <!--        <p>Tous les Ecrits</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--  </ul>-->
          <!--</li>-->
          <li class="nav-header" style="color: #64b802; font-weight: bolder;">&nbsp;&nbsp;&nbsp;&nbsp; <i class=" fas fa-list-alt"></i>&nbsp;&nbsp;Gestion Brèves et Pubs</li>
          <li class="nav-item has-treeview <?=(isset($pgactive)&&(($pgactive=='allflashs')||($pgactive=='nwflashs')||($pgactive=='addflash')||($pgactive=='upflash')))?'menu-open':false;?>" style="">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Les Brèves
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview border-bottom-phx">
              <li class="nav-item">
                <a href="{{route('admins.addflash')}}" class="nav-link <?=(isset($pgactive)&&($pgactive=='addflash'))?'active':false;?>">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Ajouter</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admins.nwflashs')}}" class="nav-link <?=(isset($pgactive)&&($pgactive=='nwflashs'))?'active':false;?>">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Brèves en Ligne</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admins.allflashs')}}" class="nav-link <?=(isset($pgactive)&&(($pgactive=='allflashs')||($pgactive=='upflash')))?'active':false;?>">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Tous les Brèves</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?=(isset($pgactive)&&(($pgactive=='allblocks')||($pgactive=='allpubs')||($pgactive=='nwpubs')||($pgactive=='addpub')||($pgactive=='uppub')))?'menu-open':false;?>" style="">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-rss"></i>
              <p>
                Publicités
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview border-bottom-phx" style="">
              <li class="nav-item">
                <!-- <a href="pages/layout/top-nav.html"> -->
                  <p class="nav-link" style="color: #64b802;">&nbsp;&nbsp;&nbsp;Publicité(s):</p>
                <!-- </a> -->
              </li>
              <li class="nav-item">
                <a href="{{route('admins.addpub')}}" class="nav-link <?=(isset($pgactive)&&($pgactive=='addpub'))?'active':false;?>">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Ajouter</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admins.nwpubs')}}" class="nav-link <?=(isset($pgactive)&&($pgactive=='nwpubs'))?'active':false;?>">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Pub(s) en Ligne</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admins.allpubs')}}" class="nav-link <?=(isset($pgactive)&&(($pgactive=='allpubs')||($pgactive=='uppub')))?'active':false;?>">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Toutes les Publicités</p>
                </a>
              </li>
              <li class="nav-item">
                  <p class="nav-link" style="color: #64b802;">&nbsp;&nbsp;&nbsp;Espaces Pubs:</p>
              </li>
              <li class="nav-item">
                <a href="{{route('admins.allblocks')}}" class="nav-link <?=(isset($pgactive)&&($pgactive=='allblocks'))?'active':false;?>">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Liste des Espaces</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header" style="color: #64b802; font-weight: bolder;">&nbsp;&nbsp;&nbsp;&nbsp; <i class=" fas fa-images"></i>&nbsp;&nbsp;Gestion Médiathèque</li>
          <li class="nav-item has-treeview <?=(isset($pgactive)&&(($pgactive=='allpictures')||($pgactive=='addpicture')||($pgactive=='uppicture')||($pgactive=='allalbums')||($pgactive=='upalbum')))?'menu-open':false;?>" style="">
            
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Photothèque
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview border-bottom-phx">
              <li class="nav-item">
                  <p class="nav-link" style="color: #64b802;">&nbsp;&nbsp;&nbsp;Photothèque:</p>
              </li>
              <li class="nav-item">
                <a href="{{route('admins.addpicture')}}" class="nav-link <?=(isset($pgactive)&&($pgactive=='addpicture'))?'active':false;?>">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Ajouter</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admins.allpictures')}}" class="nav-link <?=(isset($pgactive)&&(($pgactive=='allpictures')||($pgactive=='uppicture')))?'active':false;?>">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Tous des Photos</p>
                </a>
              </li>
              <li class="nav-item">
                  <p class="nav-link" style="color: #64b802;">&nbsp;&nbsp;&nbsp;Liste des Albums:</p>
              </li>
              <li class="nav-item">
                <a href="{{route('admins.allalbums')}}" class="nav-link <?=(isset($pgactive)&&(($pgactive=='allalbums')||($pgactive=='upalbum')))?'active':false;?>">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Tous les Albums</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?=(isset($pgactive)&&(($pgactive=='livesstreaming')||($pgactive=='allvideos')||($pgactive=='addvideo')||($pgactive=='upvideo')))?'menu-open':false;?>" style="">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-video"></i>
              <p>
                Vidéothèque
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview border-bottom-phx">
              <li class="nav-item">
                <a href="{{route('admins.addvideo')}}" class="nav-link  <?=(isset($pgactive)&&($pgactive=='addvideo'))?'active':false;?>">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Ajouter</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admins.livesstreaming')}}" class="nav-link bg-danger <?=(isset($pgactive)&&(($pgactive=='livesstreaming')||($pgactive=='upvideo')))?'active':false;?>">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Lives Streaming</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admins.allvideos')}}" class="nav-link <?=(isset($pgactive)&&(($pgactive=='allvideos')||($pgactive=='upvideo')))?'active':false;?>">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Tous les Vidéos</p>
                </a>
              </li>
            </ul>
          </li>
          <!--<li class="nav-item has-treeview <?=(isset($pgactive)&&(($pgactive=='allradios')||($pgactive=='addradio')||($pgactive=='upradio')))?'menu-open':false;?>" style="">-->
          <!--  <a href="#" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-podcast"></i>-->
          <!--    <p>-->
          <!--      Podcasts MP4-->
          <!--      <i class="fas fa-angle-left right"></i>-->
          <!--    </p>-->
          <!--  </a>-->
          <!--  <ul class="nav nav-treeview border-bottom-phx">-->
          <!--    <li class="nav-item">-->
          <!--      <a href="{{route('admins.addradio')}}" class="nav-link  <?=(isset($pgactive)&&($pgactive=='addradio'))?'active':false;?>">-->
          <!--        <i class="fa fa-plus nav-icon"></i>-->
          <!--        <p>Ajouter</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="{{route('admins.allradios')}}" class="nav-link <?=(isset($pgactive)&&(($pgactive=='allradios')||($pgactive=='upradio')))?'active':false;?>">-->
          <!--        <i class="fa fa-list nav-icon"></i>-->
          <!--        <p>Tous les Podcasts MP4</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--  </ul>-->
          <!--</li>-->
        <li class="nav-header" style="color: #64b802; font-weight: bolder;">&nbsp;&nbsp;&nbsp;&nbsp; <i class=" fas fa-cog"></i>&nbsp;&nbsp;Configuration</li>
          <!--<li class="nav-item has-treeview <?=(isset($pgactive)&&(($pgactive=='allabouts')||($pgactive=='addabout')||($pgactive=='upabout')))?'menu-open':false;?>" style="">-->
          <!--  <a href="#" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-info-circle"></i>-->
          <!--    <p>-->
          <!--      A Propos-->
          <!--      <i class="fas fa-angle-left right"></i>-->
          <!--    </p>-->
          <!--  </a>-->
          <!--  <ul class="nav nav-treeview border-bottom-phx">-->
          <!--    <li class="nav-item">-->
          <!--      <a href="{{route('admins.addabout')}}" class="nav-link  <?=(isset($pgactive)&&($pgactive=='addabout'))?'active':false;?>">-->
          <!--        <i class="fa fa-plus nav-icon"></i>-->
          <!--        <p>Ajouter</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="{{route('admins.allabouts')}}" class="nav-link <?=(isset($pgactive)&&(($pgactive=='allabouts')||($pgactive=='upabout')))?'active':false;?>">-->
          <!--        <i class="fa fa-list nav-icon"></i>-->
          <!--        <p>A Propos</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--  </ul>-->
          <!--</li>-->
          <li class="nav-item has-treeview <?=(isset($pgactive)&&(($pgactive=='allpartens')||($pgactive=='addparten')||($pgactive=='upparten')))?'menu-open':false;?>" style="">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Partenaires
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview border-bottom-phx">
              <li class="nav-item">
                <a href="{{route('admins.addparten')}}" class="nav-link  <?=(isset($pgactive)&&($pgactive=='addparten'))?'active':false;?>">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Ajouter</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admins.allpartens')}}" class="nav-link <?=(isset($pgactive)&&(($pgactive=='allpartens')||($pgactive=='upparten')))?'active':false;?>">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Tous les partenaires</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?=(isset($pgactive)&&(($pgactive=='myprofil')||($pgactive=='allusers')||($pgactive=='adduser')||($pgactive=='upuser')))?'menu-open':false;?>" style="">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Utilisateurs
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview border-bottom-phx">
              <li class="nav-item">
                  <p class="nav-link" style="color: #64b802;">&nbsp;&nbsp;&nbsp;Gestion de mon profile :</p>
              </li>
              <li class="nav-item">
                <a href="{{route('admins.myprofilus')}}" class="nav-link <?=(isset($pgactive)&&($pgactive=='myprofil'))?'active':false;?>">
                  <i class="fa fa-user nav-icon"></i>
                  <p>Mon profile</p>
                </a>
              </li>
              <li class="nav-item">
                <p class="nav-link" style="color: #64b802;">&nbsp;&nbsp;&nbsp;Gestion des Utilisateurs :</p>
              </li>
              <li class="nav-item">
                <a href="{{route('admins.adduser')}}" class="nav-link <?=(isset($pgactive)&&($pgactive=='adduser'))?'active':false;?>">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Ajouter</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admins.allusers')}}" class="nav-link <?=(isset($pgactive)&&(($pgactive=='allusers')||($pgactive=='upuser')))?'active':false;?>">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Tous les Utilisateurs</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a type="button" href="#deconnexion" class="nav-link" data-toggle="modal" data-target="#deconnexion" style="color: #64b802; text-shadow: 0 0 0 #64b802;">
              <i class="nav-icon fas fa-lock"></i>
                Déconnexion
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
