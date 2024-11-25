<nav class="main-nav">
    <ul class="menu sf-arrows">
        <li class="active">
            <a href="{{ route('home') }}" class="">Home</a>
        </li>
        @foreach ($categories as $category)
            <li class="">
                <a href="{{ route('home.category', $category->id) }}" class="">{{ $category->name }}</a>
            </li>
        @endforeach
        {{-- <li>
            <a href="#" class="sf-with-ul">Pages</a>
            <ul>
                <li>
                    <a href="about.html" class="sf-with-ul">About</a>

                    <ul>
                        <li><a href="about.html">About 01</a></li>
                        <li><a href="about-2.html">About 02</a></li>
                    </ul>
                </li>
                <li>
                    <a href="contact.html" class="sf-with-ul">Contact</a>

                    <ul>
                        <li><a href="contact.html">Contact 01</a></li>
                        <li><a href="contact-2.html">Contact 02</a></li>
                    </ul>
                </li>
                <li><a href="login.html">Login</a></li>
                <li><a href="faq.html">FAQs</a></li>
                <li><a href="404.html">Error 404</a></li>
                <li><a href="coming-soon.html">Coming Soon</a></li>
            </ul>
        </li>
        <li>
            <a href="blog.html" class="sf-with-ul">Blog</a>

            <ul>
                <li><a href="blog.html">Classic</a></li>
                <li><a href="blog-listing.html">Listing</a></li>
                <li>
                    <a href="#">Grid</a>
                    <ul>
                        <li><a href="blog-grid-2cols.html">Grid 2 columns</a></li>
                        <li><a href="blog-grid-3cols.html">Grid 3 columns</a></li>
                        <li><a href="blog-grid-4cols.html">Grid 4 columns</a></li>
                        <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Masonry</a>
                    <ul>
                        <li><a href="blog-masonry-2cols.html">Masonry 2 columns</a></li>
                        <li><a href="blog-masonry-3cols.html">Masonry 3 columns</a></li>
                        <li><a href="blog-masonry-4cols.html">Masonry 4 columns</a></li>
                        <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Mask</a>
                    <ul>
                        <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                        <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Single Post</a>
                    <ul>
                        <li><a href="single.html">Default with sidebar</a></li>
                        <li><a href="single-fullwidth.html">Fullwidth no sidebar</a></li>
                        <li><a href="single-fullwidth-sidebar.html">Fullwidth with sidebar</a></li>
                    </ul>
                </li>
            </ul>
        </li> --}}
    </ul><!-- End .menu -->
</nav><!-- End .main-nav -->