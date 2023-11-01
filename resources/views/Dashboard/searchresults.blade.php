

<form method="GET" action="{{ url('/search') }}">
    <div class="search-box">
      <input type="search" name="search" value="{{ request('search') }}" placeholder="Search..." />
    <a href=""><i class="bx bx-search"></i></a>
    </div>
</form>



