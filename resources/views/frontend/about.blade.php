@extends("frontend.layout.main")

@section('main-container')


    <!----------------------
        About section start"
       ----------------------->

       <div class="about-section">
        <h2>About Us</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur, dolorum necessitatibus ullam, nihil voluptatibus libero illo praesentium optio ea labore tempore atque totam architecto eveniet, consectetur quos! Laudantium ab sit eum! Delectus praesentium quam dolorem. Facilis laborum vitae illo id, reprehenderit impedit vero eaque, voluptates iusto distinctio laboriosam, accusamus molestias dignissimos doloribus itaque reiciendis error pariatur.</p>
    </div>

    <!-- hostel cads start-->
    <div class="hostel-by-location">
        <h2>Find Hostels By Location</h2>

        <div class="container">
            
       <div class="filter-buttons">
        <a href="{{ route('categoryhostel' , 'Jutial' ) }}" class="filter-button" data-filter="category1">Jutial</a>
        <a href="{{ route('categoryhostel' , 'Gilgit' ) }}" class="filter-button" data-filter="category2">Gilgit</a>
        <a href="{{ route('categoryhostel' , 'Danyor' ) }}" class="filter-button" data-filter="category3">Danyor</a>
      </div>


            <div class="hostel-container">


                @foreach ($hostels as $hostel )


                <div class="hostel-card">
                  <img src="{{ $hostel->hostel_image }}" alt="Hostel Image 1">
                  <div class="hostel-details">
                    <h2>{{ $hostel->name }}</h2>
                    <a href="{{ route('hostel-detail', ['id'=>$hostel->id , 'name'=>$hostel->name]) }}">View Hostel</a>
                  </div>
                </div>

                @endforeach


          </div>
         </div>

         <!-- latest Blog Section -->


<div class="latest-blog-cards">
    <div class="blog-section">
        <h2>Our Latest Blogs</h2>
       <p id="blog-para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis possimus minima aut culpa amet consequatur sit beatae repudiandae nisi optio?</p>
       <div class="container">

        <div class="blog-container">

            @foreach ($blog as $post )


            <div class="blog-card">
              <img src="{{ $post->image }}" alt="Blog Image 1">
              <div class="blog-details">
                <h2>{{ $post->title }}</h2>
                <p>Posted on: Date 1</p>
                <p>{{ $post->description }}</p>
                <a href="{{ route('blogdetail', ['id'=>$post->id , 'title'=>$post->title]) }}">Read More</a>
              </div>
            </div>

            @endforeach



    </div>
</div>

     <!----------------------
          Frequently Asked Questions section start"
           ----------------------->

           <div class="faq-section">
            <h2>Frequently Asked Questions</h2>
            <div class="faq-container">
              <div class="faq">
                <h3 class="question">How does the hostel finder work? </h3>
                <p class="answer"> Our hostel finder website utilizes a user-friendly search interface where you can enter your desired location, dates, and other preferences. It then provides you with a list of available hostels that match your criteria.            </p>
              </div>
              <div class="faq">
                <h3 class="question">Is the information about the hostels accurate and up-to-date?</h3>
                <p class="answer">bsolutely! We strive to provide accurate and up-to-date information about the hostels listed on our website. Our team regularly verifies and updates the hostel details to ensure the information is reliable.</p>
              </div>
              <div class="faq">
                <h3 class="question">Can I see photos of the hostels before making a reservation?</h3>
                <p class="answer">Yes, each hostel listing includes a gallery of photos that showcase the hostel's rooms, common areas, and facilities. You can get a visual representation of the hostels to make an informed decision.</p>
              </div>
              <div class="faq">
                <h3 class="question">How can I make a reservation through the hostel finder website?</h3>
                <p class="answer">Once you have selected a hostel, our website provides a seamless booking experience. Simply follow the instructions to enter your details, choose your room type, and make a secure reservation.</p>
              </div>
              <div class="faq">
                <h3 class="question">Are there user reviews and ratings available for the hostels?</h3>
                <p class="answer"> Yes, we encourage users to leave reviews and ratings for the hostels they have stayed at. You can read these reviews to gain insights from other travelers and make an informed choice.</p>
              </div>
              <div class="faq">
                <h3 class="question">What if I need assistance or have questions regarding a specific hostel?</h3>
                <p class="answer"> If you have any questions or need assistance regarding a particular hostel, our website offers a contact or support feature. You can reach out to our team, and we'll be happy to assist you.</p>
              </div>
              <!-- Add more FAQs as needed -->
            </div>
            </div>

   @endsection







