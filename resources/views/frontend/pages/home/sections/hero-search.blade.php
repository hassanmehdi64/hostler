{{-- ==================== Hero Search Section ==================== --}}
<div id="main-container">
    <div>
        <div id="landing-header">
            <h1 class="find-hostsel">Find Hostel</h1>
            <div class="search-container">
                <h2 class="search-heading"></h2>
                <form action="{{ route('searchhere') }}">
                    <div>
                        <div class="search-container">
                            <input type="text" name="search" id="search-input" placeholder="Search">
                            <div class="search-icon">
                                <button type="submit" class="read-more-button" id="submit-button">Search</button>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="filter-">
                            <select name="gender">
                                <option value="">Gender Filter</option>
                                <option value="male">For Male</option>
                                <option value="female">For Female</option>
                            </select>
                        </div>

                        <div class="filter-">
                            <select name="location">
                                <option value="">Location Filter</option>
                                <option value="gilgit">Gilgit</option>
                                <option value="jutial">Jutial</option>
                                <option value="danyore">Ddanyor</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>

            <ul class="slideshow">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </div>
</div>