<nav class="sidenav shadow-right sidenav-light" style="background-color:  #e8f1ff">
    <div class="sidenav-menu">
       <div class="nav accordion" id="accordionSidenav">
        <div>
          {{-- <!-- Sidenav Menu Heading (Account)-->
          <!-- * * Note: * * Visible only on and above the sm breakpoint-->
          <div class="sidenav-menu-heading d-sm-none">Account</div>
          <!-- Sidenav Link (Alerts)-->
          <!-- * * Note: * * Visible only on and above the sm breakpoint-->
          <a class="nav-link d-sm-none" href="#!">
             <div class="nav-link-icon"><i data-feather="bell"></i></div>
             Alerts
             <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
          </a>
          <!-- Sidenav Link (Messages)-->
          <!-- * * Note: * * Visible only on and above the sm breakpoint-->
          <a class="nav-link d-sm-none" href="#!">
             <div class="nav-link-icon"><i data-feather="mail"></i></div>
             Messages
             <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
          </a>
          --}}
       </div>
          <div class="sidenav-menu-heading"></div>
          <a class="nav-link collapsed" href="dashboard" aria-controls="collapseDashboards">
             <div class="nav-link-icon"><i data-feather="activity"></i></div>
             Dashboards
             <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
          </a>
          <div class="sidenav-menu-heading">Sertifikat</div>
          <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
             <div class="nav-link-icon"><i data-feather="folder"></i></div>
             Sertifikat Umum
             <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
          </a>
          <div class="collapse" id="collapsePages" data-bs-parent="#accordionSidenav">
             <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                <a class="nav-link collapsed" href="csr" aria-controls="pagesCollapseAccount">
                   Sertifikat CSR
                   <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <a class="nav-link collapsed" href="hse" aria-controls="pagesCollapseAuth">
                   Sertifikat HSE
                   <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <a class="nav-link collapsed" href="penghargaan" aria-controls="pagesCollapseError">
                   Penghargaan
                   <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <a class="nav-link collapsed" href="proper" aria-controls="pagesCollapseError">
                   Proper
                   <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <a class="nav-link collapsed" href="swa" aria-controls="pagesCollapseError">
                   SWA
                   <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <a class="nav-link collapsed" href="sni_award" aria-controls="pagesCollapseError">
                   SNI Award
                   <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
             </nav>
          </div>
          <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseApps" aria-expanded="false" aria-controls="collapseApps">
             <div class="nav-link-icon"><i data-feather="globe"></i></div>
             ISO
             <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
          </a>
          <div class="collapse" id="collapseApps" data-bs-parent="#accordionSidenav">
             <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavAppsMenu">
                <a class="nav-link collapsed" href="iso1" aria-controls="appsCollapseKnowledgeBase">
                   ISO 9001 : 2015
                   <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <a class="nav-link collapsed" href="iso2" aria-controls="appsCollapseUserManagement">
                   ISO 14001 : 2015
                   <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <a class="nav-link collapsed" href="iso3" aria-controls="appsCollapsePostsManagement">
                   ISO 27001 : 2015
                   <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <a class="nav-link collapsed" href="iso4" aria-controls="appsCollapsePostsManagement">
                   ISO 37001 : 2016
                   <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <a class="nav-link collapsed" href="iso5" aria-controls="appsCollapsePostsManagement">
                   ISO 17025 : 2017
                   <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <a class="nav-link collapsed" href="iso6" aria-controls="appsCollapsePostsManagement">
                   ISO 45001 : 2018
                   <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
             </nav>
          </div>
          @if(Auth::user()->privilages == 'Full-access')
          <a class="nav-link collapsed" href="user" >
             <div class="nav-link-icon"><i data-feather="user"></i></div>
             User
             <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
          </a>
          @endif
       </div>
    </div>
    <!-- Sidenav Footer-->
    <div class="sidenav-footer">
       <div class="sidenav-footer-content">
          <div class="sidenav-footer-subtitle">Logged in as:</div>
          <div class="sidenav-footer-title">{{Auth::user()->nama}}</div>
       </div>
    </div>
 </nav>
