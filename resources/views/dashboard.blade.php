



 <x-guest-layout>
    <section class="hero d-flex flex-column justify-content-center align-items-center" id="home">



        <div class="bg-overlay"></div>
        @auth
        <div class="justify-start"><h1 data-aos="fade-up" class="text-white" data-aos-delay="400">{{ $user->first_name}} {{ $user->last_name}}</h1><h6 data-aos="fade-up" class="text-white text-xs py-0 my-0" data-aos-delay="400">{{ $user->email }}</h6></div>


        @endauth
        <div class="container">
                <div class="row">

                     <div class="col-lg-8 col-md-10 mx-auto col-12">
                          <div class="hero-text mt-5 text-center">


                                <h6 data-aos="fade-up" data-aos-delay="300"> pitches group</h6>

                                <h1 class="text-white" data-aos="fade-up" data-aos-delay="500">Play football and Have Fun in our best Pitches</h1>

                                <div class="my-2 flex justify-end border-b-2 border-slate-600  " ><a href="{{  route('user.reservations.create') }}" class=" font-extrabold border-2 text-black rounded-lg border-orange-600 bg-orange-200 bg-opacity-40 mt-6 mb-2 px-3 py-1 " data-aos="fade-up" data-aos-delay="100">MAKE RESERVATION</a></div>

                                <a href="#feature" class="btn custom-btn mt-3" data-aos="fade-up" data-aos-delay="400">learn more</a>


                          </div>


                     </div>

                </div>
           </div>
 </section>




 <section class="feature" id="feature">
    <div class="container">
        <div class="row">

            <div class="d-flex flex-column justify-content-center ml-lg-auto mr-lg-5 col-lg-5 col-md-6 col-12">
                <h2 class="mb-3 text-white" data-aos="fade-up">New features</h2>

                <h6 class="mb-4 text-white" data-aos="fade-up">Your Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed mollitia dolore quod hic, aperiam vel est perferendis, alias eum praesentium molestias voluptatum labore ullam voluptatibus quo cupiditate non, maxime ad.</h6>

                <p data-aos="fade-up" data-aos-delay="200">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet quaerat ad numquam voluptas unde eaque. Maxime, amet eum autem voluptates earum delectus cum possimus, est rerum, similique ad enim? Nostrum. <a rel="nofollow" href="https://www.tooplate.com" target="_parent">Tooplate</a> for your commercial website. Bootstrap v4.2.1 Layout. Feel free to use it.</p>

                <a href="{{ route('register') }}" class="btn custom-btn bg-color mt-3" data-aos="fade-up" data-aos-delay="300" data-toggle="modal" >Become a member today</a>
            </div>

            <div class="mr-lg-auto mt-3 col-lg-4 col-md-6 col-12">
                 <div class="about-working-hours">
                      <div>

                            <h2 class="mb-4 text-white" data-aos="fade-up" data-aos-delay="500">Working hours</h2>

                           <strong class="d-block" data-aos="fade-up" data-aos-delay="600">Sunday : Closed</strong>

                           <strong class="mt-3 d-block" data-aos="fade-up" data-aos-delay="700">Monday - Friday</strong>

                            <p data-aos="fade-up" data-aos-delay="800">7:00 AM - 10:00 PM</p>

                            <strong class="mt-3 d-block" data-aos="fade-up" data-aos-delay="700">Saturday</strong>

                            <p data-aos="fade-up" data-aos-delay="800">6:00 AM - 4:00 PM</p>
                           </div>
                      </div>
                 </div>
            </div>

        </div>
    </div>
</section>


 <!-- ABOUT -->
 <section class="about section" id="about">
           <div class="container">
                <div class="row">

                        <div class="mt-lg-5 mb-lg-0 mb-4 col-lg-5 col-md-10 mx-auto col-12">
                            <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300">Hello, We are  Pitches group</h2>

                            <p data-aos="fade-up" data-aos-delay="400">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa voluptatem nobis necessitatibus corporis? Eligendi, nihil! Neque fugit nobis dolorem exercitationem assumenda veritatis, dolorum explicabo earum iusto, ut aliquid id nostrum..</p>

                            <p data-aos="fade-up" data-aos-delay="500">If you have any question regarding <a rel="nofollow" href="https://www.tooplate.com/view/2119-gymso-fitness" target="_parent">Gymso Fitness HTML template</a>, you can <a rel="nofollow" href="https://www.tooplate.com/contact" target="_parent">contact Tooplate</a> immediately. Thank you.</p>

                        </div>

                        <div class="ml-lg-auto col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="700">
                            <div class="team-thumb">
                                <img src="{{ asset('assets/images/team/team-image.jpg') }}" class="img-fluid" alt="Trainer">

                                <div class="team-info d-flex flex-column">

                                    <h3>Mary Yan</h3>
                                    <span>Yoga Instructor</span>

                                    <ul class="social-icon mt-3">
                                        <li><a href="#" class="fa fa-twitter"></a></li>
                                        <li><a href="#" class="fa fa-instagram"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="mr-lg-auto mt-5 mt-lg-0 mt-md-0 col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="800">
                            <div class="team-thumb">
                                <img src="{{ asset('assets/images/team/team-image01.jpg') }}" class="img-fluid" alt="Trainer">

                                <div class="team-info d-flex flex-column">

                                    <h3>Catherina</h3>
                                    <span>Body trainer</span>

                                    <ul class="social-icon mt-3">
                                        <li><a href="#" class="fa fa-instagram"></a></li>
                                        <li><a href="#" class="fa fa-facebook"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                </div>
           </div>
 </section>


 <!-- CLASS -->
 <section class="class section" id="services">
           <div class="container">
                <div class="row">

                        <div class="col-lg-12 col-12 text-center mb-5">
                            <h6 data-aos="fade-up">the best services ever</h6>

                            <h2 data-aos="fade-up" data-aos-delay="200" >Our Services</h2>
                         </div>

                         <div class="flex flex-auto flex-wrap">

                            @foreach ($pitches as $pitch)

                            <div class="mt-5 mt-lg-0 col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="600">
                                <div class="class-thumb">
                                    <img src="{{ asset('assets/images/class/pitch1.jpg') }}" class="img-fluid" alt="Class">

                                    <div class="class-info">
                                        <h3 class="mb-1">{{ $pitch->name }}</h3>

                                        <span><strong>in </strong> {{ $pitch->location }}</span>

                                        <span class="class-price">{{ $pitch->price }} DH</span>

                                        <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                                    </div>
                                </div>
                            </div>

                            @endforeach

                         </div>




                </div>
           </div>
 </section>


 <!-- SCHEDULE -->
 <section class="schedule section" id="schedule">
           <div class="container">
                <div class="row">

                        <div class="col-lg-12 col-12 text-center">
                            <h6 data-aos="fade-up">our weekly GYM schedules</h6>

                            <h2 class="text-white" data-aos="fade-up" data-aos-delay="200">Workout Timetable</h2>
                         </div>

                         <div class="col-lg-12 py-5 col-md-12 col-12">
                             <table class="table table-bordered table-responsive schedule-table" data-aos="fade-up" data-aos-delay="300">

                                 <thead class="thead-light">
                                     <th><i class="fa fa-calendar"></i></th>
                                     <th>Mon</th>
                                     <th>Tue</th>
                                     <th>Wed</th>
                                     <th>Thu</th>
                                     <th>Fri</th>
                                     <th>Sat</th>
                                 </thead>

                                 <tbody>
                                     <tr>
                                        <td><small>7:00 am</small></td>
                                        <td>
                                            <strong>Cardio</strong>
                                            <span>7:00 am - 9:00 am</span>
                                        </td>
                                        <td>
                                            <strong>Power Fitness</strong>
                                            <span>7:00 am - 9:00 am</span>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <strong>Yoga Section</strong>
                                            <span>7:00 am - 9:00 am</span>
                                        </td>
                                     </tr>

                                     <tr>
                                        <td><small>9:00 am</small></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <strong>Boxing</strong>
                                            <span>8:00 am - 9:00 am</span>
                                        </td>
                                        <td>
                                            <strong>Areobic</strong>
                                            <span>8:00 am - 9:00 am</span>
                                        </td>
                                        <td></td>
                                        <td>
                                            <strong>Cardio</strong>
                                            <span>8:00 am - 9:00 am</span>
                                        </td>
                                     </tr>

                                     <tr>
                                        <td><small>11:00 am</small></td>
                                        <td></td>
                                        <td>
                                            <strong>Boxing</strong>
                                            <span>11:00 am - 2:00 pm</span>
                                        </td>
                                        <td>
                                            <strong>Areobic</strong>
                                            <span>11:30 am - 3:30 pm</span>
                                        </td>
                                        <td></td>
                                        <td>
                                            <strong>Body work</strong>
                                            <span>11:50 am - 5:20 pm</span>
                                        </td>
                                     </tr>

                                     <tr>
                                        <td><small>2:00 pm</small></td>
                                        <td>
                                            <strong>Boxing</strong>
                                            <span>2:00 pm - 4:00 pm</span>
                                        </td>
                                        <td>
                                            <strong>Power lifting</strong>
                                            <span>3:00 pm - 6:00 pm</span>
                                        </td>
                                        <td></td>
                                        <td>
                                            <strong>Cardio</strong>
                                            <span>6:00 pm - 9:00 pm</span>
                                        </td>
                                        <td></td>
                                        <td>
                                            <strong>Crossfit</strong>
                                            <span>5:00 pm - 7:00 pm</span>
                                        </td>
                                     </tr>
                                 </tbody>
                             </table>
                         </div>

                </div>
           </div>
 </section>


 <!-- CONTACT -->
 <section class="contact section" id="contact">
      <div class="container">
           <div class="row">

                {{-- <div class="ml-auto col-lg-5 col-md-6 col-12">
                    <h2 class="mb-4 pb-2" data-aos="fade-up" data-aos-delay="200">Feel free to ask anything</h2>

                    <form  method="post" action="{{ route('sendEmail') }}" class="contact-form webform" data-aos="fade-up" data-aos-delay="400" role="form">
                        @csrf
                        <input type="text" class="form-control" name="name" placeholder="Name">
                        @error('name') {{ $message }} @enderror

                        <input type="email" class="form-control" name="email" placeholder="Email">
                        @error('email') {{ $message }} @enderror

                        <textarea class="form-control" rows="5" name="message" placeholder="Message"></textarea>
                        @error('message') {{ $message }} @enderror

                        <button type="submit" class="form-control" id="submit-button" name="submit">Send Message</button>
                    </form>
                </div> --}}

                <div class="mx-auto mt-4 mt-lg-0 mt-md-0 col-lg-5 col-md-6 col-12">
                    <h2 class="mb-4" data-aos="fade-up" data-aos-delay="600">Where you can <span>find us</span></h2>

                    <p data-aos="fade-up" data-aos-delay="800"><i class="fa fa-map-marker mr-1"></i> 120-240 Rio de Janeiro - State of Rio de Janeiro, Brazil</p>

                    <div class="google-map" data-aos="fade-up" data-aos-delay="900">
                       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3306.4122437682404!2d-4.99935928531843!3d34.03329492617696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd9f8c86d1348f1f%3A0x2f4c7b2754044613!2sWebmarko%20agence%20digitale%20%C3%A0%20F%C3%A8s!5e0!3m2!1sfr!2sma!4v1660138395640!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

           </div>
      </div>
 </section>
</x-guest-layout>
