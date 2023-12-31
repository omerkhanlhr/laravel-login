<nav class="sidebar">
    <div class="sidebar-header">
      <a href="#" class="sidebar-brand">
        Easy<span>Learning</span>
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
          <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
          </a>
        </li>

        <li class="nav-item nav-category">Real Estate</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Property Type</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="emails">
              <ul class="nav sub-menu">
                {{-- @if(Auth::user()->can('site.settings')) --}}
                <li class="nav-item">
                  <a href="{{route('all.type')}}" class="nav-link">All Properties</a>
                </li>

                <li class="nav-item">
                  <a href="{{route('add.property')}}" class="nav-link">Add Type</a>
                </li>

              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ammenitie" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Ammenitie Type</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="ammenitie">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('ammenities.type')}}" class="nav-link">All Ammenities</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('add.ammenitie')}}" class="nav-link">Add Ammenitie</a>
                </li>

              </ul>
            </div>
          </li>



        <li class="nav-item">
          <a href="pages/apps/calendar.html" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Calendar</span>
          </a>
        </li>
        <li class="nav-item nav-category">Components</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
            <i class="link-icon" data-feather="feather"></i>
            <span class="link-title">UI Kit</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="uiComponents">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="#" class="nav-link">Accordion</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">Alerts</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item nav-category">Roles & Permissions</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
            <i class="link-icon" data-feather="anchor"></i>
            <span class="link-title">Roles & Permissions</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="advancedUI">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('all.permission')}}" class="nav-link">All Permission</a>
              </li>
              <li class="nav-item">
                <a href="{{route('all.role')}}" class="nav-link">All Roles</a>
               </li>
              <li class="nav-item">
                <a href="{{route('add.permissions.roles')}}" class="nav-link">Role In Permission</a>
              </li>
              <li class="nav-item">
                <a href="{{route('all_permission_roles')}}" class="nav-link">All Roles & Permissions</a>
              </li>
            </ul>
        <li class="nav-item nav-category">Manage Admin</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#admin" role="button" aria-expanded="false" aria-controls="advancedUI">
            <i class="link-icon" data-feather="anchor"></i>
            <span class="link-title">Manage Admin</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="admin">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('all.admin')}}" class="nav-link">All Admin</a>
              </li>
              <li class="nav-item">
                <a href="{{route('add.admin')}}" class="nav-link">Add Admin</a>
               </li>
            </ul>
          </div>
        </li>
        <li class="nav-item nav-category">Docs</li>
        <li class="nav-item">
          <a href="#" target="_blank" class="nav-link">
            <i class="link-icon" data-feather="hash"></i>
            <span class="link-title">Documentation</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>
