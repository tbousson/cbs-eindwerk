<div class="sidebar" data-color="purple" data-background-color="black" data-image="{{asset("assets/img/sidebar-2.jpg")}}">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
    <div class="logo">
      <a href="{{route('admin')}}" class="simple-text logo-normal">
        Mudking Comics <br>Dashboard
      </a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item {{ request()->is('admin/v2') ? 'active' : '' }}  ">
          <a class="nav-link" href="{{route('admin')}}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <!-- your sidebar here -->
        <li class="nav-item {{ request()->is('admin/v2/users*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route("users.index")}}">
                  <i class="material-icons">table</i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item {{ request()->is('admin/v2/roles*') ? 'active' : '' }}">
                  <a class="nav-link" href="{{route("roles.index")}}">
                    <i class="material-icons">table</i>
                    <p>Roles</p>
                  </a>
                </li>
                <li class="nav-item {{ request()->is('admin/v2/comics*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route("comics.index")}}">
                      <i class="material-icons">table</i>
                      <p>Comics</p>
                    </a>
                  </li>
                  <li class="nav-item {{ request()->is('admin/v2/authors*') ? 'active' : '' }}">
                      <a class="nav-link" href="{{route("authors.index")}}">
                        <i class="material-icons">table</i>
                        <p>Authors</p>
                      </a>
                    </li>
                    <li class="nav-item {{ request()->is('admin/v2/series*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route("series.index")}}">
                          <i class="material-icons">table</i>
                          <p>Series</p>
                        </a>
                      </li>
                      <li class="nav-item {{ request()->is('admin/v2/publishers*') ? 'active' : '' }}">
                          <a class="nav-link" href="{{route("publishers.index")}}">
                            <i class="material-icons">table</i>
                            <p>Publishers</p>
                          </a>
                        </li>
                        <li class="nav-item {{ request()->is('admin/v2/genres*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{route("genres.index")}}">
                              <i class="material-icons">table</i>
                              <p>Genres</p>
                            </a>
                          </li>
      </ul>
    </div>
  </div>