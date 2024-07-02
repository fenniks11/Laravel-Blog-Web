<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ request()->is('dashboard') ? 'active' : '' }}"  href="/dashboard">
              <i class="house"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ request()->is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
              <svg class="bi"><use xlink:href="#file-earmark"/></svg>
              My Posts
            </a>
          </ul>
        </li>
        @can('admin')
        <ul class="nav flex-column">
          <h6 class="d-flex justify-content-between align-items-center p-md-2 text-muted mt-3">
            <span>
              Administrator  
            </span>
          </h6>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ request()->is('dashboard/categories*') ? 'active' : '' }}"  href="/dashboard/categories">
              <i class="bi bi-grid"></i>
              Post Categories
            </a>
          </li>
        </ul>
        @endcan
        <hr>
        <ul class="nav flex-column mb-auto">
          <li class="nav-item">
              <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="nav-link d-flex align-items-center gap-2">
                      <svg class="bi"><use xlink:href="#door-closed"/></svg>
                      Sign out
                  </button>
                </form>
          </li>
        </ul>
        
      </div>
    </div>
  </div>