<div class="catagories-menu">
    <ul id="menu-content2" class="menu-content collapse show">
        <!-- Single Item -->
        @foreach($header_category as $title_category)
            @if($title_category->category_id == 0)
                <li data-toggle="collapse" data-target="#clothing">
                    <a href="{{route('category', $title_category->seo->slug )}}">{{ $title_category->title }}</a>
                    @if(isset($title_category->category))
                    
                    <ul class="sub-menu collapse show" id="clothing">
                        @foreach($title_category->category as $child_category)
                        <li><a href="{{ route('category', $child_category->seo->slug) }}">{{ $child_category->title }}</a></li> 
                        @endforeach
                    </ul>
                    @endif 
                </li>
            @endif 
        @endforeach
        {{-- <!-- Single Item -->
                                <li data-toggle="collapse" data-target="#shoes" class="collapsed">
                                    <a href="#">shoes</a>
                                    <ul class="sub-menu collapse" id="shoes">
                                        <li><a href="#">All</a></li>
                                        <li><a href="#">Bodysuits</a></li>
                                        <li><a href="#">Dresses</a></li>
                                        <li><a href="#">Hoodies &amp; Sweats</a></li>
                                        <li><a href="#">Jackets &amp; Coats</a></li>
                                        <li><a href="#">Jeans</a></li>
                                        <li><a href="#">Pants &amp; Leggings</a></li>
                                        <li><a href="#">Rompers &amp; Jumpsuits</a></li>
                                        <li><a href="#">Shirts &amp; Blouses</a></li>
                                        <li><a href="#">Shirts</a></li>
                                        <li><a href="#">Sweaters &amp; Knits</a></li>
                                    </ul>
                                </li>
                                <!-- Single Item -->
                                <li data-toggle="collapse" data-target="#accessories" class="collapsed">
                                    <a href="#">accessories</a>
                                    <ul class="sub-menu collapse" id="accessories">
                                        <li><a href="#">All</a></li>
                                        <li><a href="#">Bodysuits</a></li>
                                        <li><a href="#">Dresses</a></li>
                                        <li><a href="#">Hoodies &amp; Sweats</a></li>
                                        <li><a href="#">Jackets &amp; Coats</a></li>
                                        <li><a href="#">Jeans</a></li>
                                        <li><a href="#">Pants &amp; Leggings</a></li>
                                        <li><a href="#">Rompers &amp; Jumpsuits</a></li>
                                        <li><a href="#">Shirts &amp; Blouses</a></li>
                                        <li><a href="#">Shirts</a></li>
                                        <li><a href="#">Sweaters &amp; Knits</a></li>
                                    </ul>
                                </li>
                            </ul> --}}
</div>