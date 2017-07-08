<header class="fixed-banner">
    <div class="container">
        <div class="mobile-btn menu-btn" id="nav-toggle">
            <span class="lines"></span>
        </div>
        <div class="logo">
            <a href="/">
                <img src="{{asset('img/logo.png')}}">
                <span class="logo-text">Machineshop</span>
            </a>
        </div>
        <div class="navigation" id="menu"> 
            <nav>
                <ul>                   
                    <li class="{{ strpos(Request::path(), 'special-effects') !== false ? 'active' : ''  }}">
                        <a href="/special-effects/1/">Special Effects</a>
                    </li>
                    <li class="{{ strpos(Request::path(), 'special-projects') !== false ? 'active' : ''  }}">
                        <a href="/special-projects/2/">Special Projects</a>
                    </li>
                    <li class="{{ Request::path() ==  'hire' ? 'active' : ''  }}">
                        <a href="/hire/">Hire</a>
                    </li>
                    <li class="{{ Request::path() ==  'news' ? 'active' : ''  }}" >
                        <a  href="/news/">News</a>
                    </li>
                    <li class="{{ Request::path() ==  'about' ? 'active' : ''  }}">
                        <a href="/about/">About Us</a>
                    </li>
                    <li class="{{ Request::path() ==  'contact' ? 'active' : ''  }}">
                        <a href="/contact/">Contact</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>