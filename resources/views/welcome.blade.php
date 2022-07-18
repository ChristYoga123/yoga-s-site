@extends('layouts.home')

@section('content')
    {{-- Hero Section --}}
  <section class="mt-32">
    <div class="container mt-16 flex justify-between items-center mx-auto px-8 md:px-14 lg:px-24 w-full">
      <div class="flex flex-wrap justify-center md:justify-start max-w-xl mt-0 md:my-36">
        {{-- content --}}
        <div class="hero-text text-center md:text-left">
          <p class="md:text-xl mb-3">Hello, <span class="text-selected-text">There!</span></p>
          <h1 class="font-bold  text-5xl md:text-6xl lg:text-7xl">I'm <span class="animate bg-gradient-to-r from-pink-300 via-selected-text to-pink-600 bg-clip-text text-transparent"></span>.</h1>
          <p class="mt-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta tempora fugiat architecto quas neque quod repellat consectetur natus itaque deleniti?</p>
          <a href=""><button class="btn btn-outline btn-secondary mt-5 md:mt-14">Email Me</button></a>
        </div>
      </div>
      <img src="{{ asset('img/blobanimation.svg') }}" alt="" class="w-[450px] hidden lg:flex">
    </div>
  </section>
  {{-- End of Hero Section --}}


  {{-- About Section --}}
  <section class="py-16 mt-24" id="about">
    <div class="flex flex-col md:flex-row items-center justify-center gap-10 md:gap-10">

      <div class="rounded-full w-48 md:w-64 h-48 md:h-64 overflow-hidden">
        <img src="{{ asset('img/profile.jpg') }}" alt="profile" class="w-full h-full object-cover opacity-90 -z-20">
      </div>

      <div class="w-full md:w-1/2 text-base md:text-lg text-center md:text-left">
        <h2 class="text-selected-text font-bold text-2xl md:text-3xl mb-3 md:px-10">
          About Me
        </h2>
        <div class="paragraph px-10 text-center md:px-10 md:text-justify">
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam assumenda omnis placeat saepe corporis labore tenetur libero nulla, earum soluta minima est molestiae quis modi atque itaque nesciunt, aliquam voluptatibus?
          </p>
          <br>
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut voluptate iste eaque voluptas dignissimos. Deleniti excepturi rem vel ratione dolorem.
          </p>
        </div>
      </div>
    </div>
  </section>
  {{-- End of About Section --}}



  {{-- Dots --}}
  <section id="dots" class="container flex justify-between items-center mx-auto px-8 md:px-14 lg:px-24 w-full">
    <div class="flex items-center justify-between gap-3 w-full">
      <div class="bg-selected-text h-3 w-4"></div>
      <div class="bg-selected-text h-3 w-4"></div>
      <div class="bg-selected-text h-3 w-4"></div>
      <div class="bg-selected-text h-3 w-4"></div>
      <div class="bg-selected-text h-3 w-4"></div>
      <div class="bg-selected-text h-3 w-4"></div>
      <div class="bg-selected-text h-3 w-4"></div>
      <div class="bg-gradient-to-r from-selected-text/60 to-selected-text/0 flex-grow h-3"></div>
    </div>
  </section>
  {{-- End of Dots --}}




  {{-- Project Section --}}
  <section class="" id="project">
    <div class="container mt-16 justify-between items-center mx-auto px-8 md:px-14 lg:px-24 w-full">
      <section class="w-full text-center md:text-left">
        <h2 class="text-selected-text font-bold text-2xl md:text-3xl mb-3">My Work</h2>
        <p class="text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, beatae!</p>
      </section>
      <div class="owl-carousel project owl-theme flex justify-center my-16">
        @foreach ($projects as $project)
          <div class="item">
            <div class="card w-96 glass">
              <figure><img src="{{ asset('storage/'. $project->hero_image) }}" class="w-[300px] h-[280px]"></figure>
              <div class="card-body">
                <h2 class="card-title">{{ $project->name }}</h2>
                <div class="card-actions justify-end">
                  <button class="btn btn-primary">Learn now!</button>
                </div>
              </div>
            </div>
          </div>  
        @endforeach
      </div>
    </div>
  </section>
  {{-- End of Project Section --}}



  {{-- Dots --}}
  <section id="dots" class="container flex justify-between items-center mx-auto px-8 md:px-14 lg:px-24 w-full">
    <div class="flex items-center justify-between gap-3 w-full">
      <div class="bg-selected-text h-3 w-4"></div>
      <div class="bg-selected-text h-3 w-4"></div>
      <div class="bg-selected-text h-3 w-4"></div>
      <div class="bg-selected-text h-3 w-4"></div>
      <div class="bg-selected-text h-3 w-4"></div>
      <div class="bg-selected-text h-3 w-4"></div>
      <div class="bg-selected-text h-3 w-4"></div>
      <div class="bg-gradient-to-r from-selected-text/60 to-selected-text/0 flex-grow h-3"></div>
    </div>
  </section>
  {{-- End of Dots --}}




  {{-- Message --}}
  <section id="contact">
    <div class="container mt-16 justify-between items-center mx-auto px-8 md:px-14 lg:px-24 w-full">
      <section class="w-full">
        <h2 class="text-selected-text text-2xl md:text-3xl font-bold text-center md:text-left mb-3">Ask Me</h2>
        <p class="text-center md:text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, ratione.</p>
        <div class="w-full grid lg:grid-cols-2 gap-4 lg:gap-32 mt-24">
          <form action="{{ route('dashboard.store') }}" method="post">
            @csrf
              <div class="space-y-7">
                <div>
                  <label for="nama" class="text-white block mb-6 text-xl font-bold">Name</label>
                  <input type="text" name="nama" id="nama" placeholder="Type your name" class="w-[500px] md:w-full border border-input-border bg-input px-4 py-4 rounded-lg @error('nama') border-input-error @enderror" required value="{{ old('nama') }}">
                  @error('nama')
                    <p class="text-input-error text-xl italic">{{ $message }}</p>
                  @enderror
                </div>
    
                <div>
                  <label for="email" class="text-white block mb-6 text-xl font-bold">Email</label>
                  <input type="email" name="email" id="email" placeholder="Type your email" class="w-[500px] md:w-full border border-input-border bg-input px-4 py-4 rounded-lg @error('email') border-input-error @enderror" required value="{{ old('email') }}">
                  @error('email')
                    <p class="text-input-error text-xl italic">{{ $message }}</p>
                  @enderror
                </div>
    
                <div>
                  <label for="message" class="text-white block mb-6 text-xl font-bold">Message</label>
                  <textarea name="message" id="" cols="30" rows="10" class="w-[500px] md:w-full border border-input-border bg-input px-4 py-4 rounded-lg @error('message') border-input-error @enderror" required></textarea>
                  @error('message')
                    <p class="text-input-error text-xl italic">{{ $message }}</p>
                  @enderror
                </div>

                <div class="text-center md:text-right">
                  <button class="btn btn-outline btn-secondary" type="submit">Send</button>
                </div>
              </div>
          </form>
          <div class="messages">
            <h2 class="text-xl mb-5 text-center md:text-left">Comments</h2>
            <div class="w-[500px] h-[540px] md:w-[600px] md:h-[640px] rounded-xl overflow-y-auto">
              @foreach ($messages as $message)
                <div class="messages-content py-3 px-5 shadow-lg shadow-selected-text rounded-lg mb-10">
                  <div class="guest-comment">
                    <h2 class="text-xl font-bold mb-3">{{ $message->nama }}</h2>
                    <p class="mb-5">{{ $message->message }}</p>
                    <p>{{ $message->created_at }}</p>
                  </div>
                  @if ($message->reply === null)
                    
                  @else
                    <div class="admin-comment text-right">
                      <h2 class="text-xl font-bold mb-3">Admin</h2>
                      <p class="mb-5">{{ $message->reply }}</p>
                      <p>{{ $message->updated_at }}</p>
                    </div>
                  @endif
                </div>   
              @endforeach
            </div>
          </div>
        </div>
      </section>
    </div>
  </section>
  {{-- End of Message Section --}}

@endsection



@section('scripts')
    {{-- Navbar Sticky --}}
    <script>
      window.onscroll = function() {
          const header = document.querySelector('.navigation');
          if(window.scrollY > 0) {
              header.classList.add('navbar-fixed');
          } else {
              header.classList.remove('navbar-fixed');
          }
      };
  </script>

  {{-- Owl-Carousel.js --}}
  <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script>
      $('.project').owlCarousel({
          loop:true,
          margin:50,
          responsive:{
              0:{
                  items:1
              },
              600:{
                  items:1
              },
              1000:{
                  items:2
              }
          }
      })
  </script>

  {{-- Typed.js --}}
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
  <script>
      var typed = new Typed('.animate', {
          strings: [
              'Yoga',
              'Front-End Developer',
              'Back-End Developer'
          ],
          typeSpeed: 50,
          backSpeed: 50,
          loop: true,
      });
  </script>
@endsection