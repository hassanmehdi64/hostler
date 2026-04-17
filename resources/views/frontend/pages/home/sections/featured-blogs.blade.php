{{-- ==================== Featured Blogs Section ==================== --}}
<div id="featured_blog_cards">
    <h2 id="featured_blog-heading">Featured Blogs</h2>
    <p id="featured_blog-para">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit ipsam provident, fuga repellat accusamus hic.</p>

    @foreach ($blog as $blg)
        <div class="featured-blog-card">
            <img src="{{ 'frontend/images/blog-img1.jpg' }}" alt="Image 1" class="card-image">
            <div class="card-content">
                <h2 class="card-title">{{ $blg->title }}</h2>
                <p class="card-paragraph">{{ $blg->getshortdescription() }}</p>
                <a href="{{ route('blogdetail', ['id' => $blg->id, 'title' => $blg->title]) }}">
                    <button class="styled-button">Read More</button>
                </a>
            </div>
        </div>
    @endforeach
</div>