



@include('partials.head')

<body class="about menu-push">

<div class="wrapper" style="background-image:url(/img/staff/background.jpg);">
        
    @include('partials.header')   

        
    <div class="background-image" style="background-image:url('/img/staff/background.jpg');"></div>
    <div class="image-overlay"></div>

   

        <div class="banner-page" style="margin-top:2.5em;">
            <div class="banner-text center">
                <div class="container">
                    <h1>About Us</h1>
                </div>
            </div>
        </div>
      
        <section class="about-us">
            <div class="container">
                <div class="about-summary">
                    <p>Established during 1993 in Acton Vale, we have since moved on to larger purpose fitted workshops in Park Royal. Most disciplines and processes are performed on site or with a small group of nominated specialists that we can trust to deliver to the high standards that we set for your projects. A full design through to manufacture facility is offered to turn your ideas into a reality.</p>
                    <p>Our history shows experience across a wide range of work that has allowed us to build our investment in plant, equipment and most importantly people. We have the facility to take your project forward to a successful result that will enable you to keep your clients coming back time and again.</p>
                    <p>As of August 2013 we have completed 3600 jobs over the last 20 years, averaging 3.46 per week. We have never had a single day of business without a job going through the company - a fact that we are very proud of indeed. You can watch our anniversary showreel here.</p>
                </div>
                <div class="staff">
                    <div class="team-carousel">
                        {{-- Team Carousel --}}
                        <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="member-image">
                                    <div class="image-overlay"></div>
                                    <img src="/img/staff/paul.jpg" />
                                    <span class="image-overlay-title">Paul</span>
                                </div>
                                <div class="member-description">
                                    <p>Paul is the boss. A seasoned veteran in the industry Paul has blown up more stuff than the army and been on more shoots than Naomi Campbell. Paul loves to ride his bike with the Fireflies.</p>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="member-image">
                                    <div class="image-overlay"></div>
                                    <img src="/img/staff/steve.jpg" />
                                    <span class="image-overlay-title">Steve</span>
                                </div>
                                <div class="member-description">
                                    <p>Steve is in charge of design and technical visualisation. He is also a man of great practical skill. Steve plays guitar and drives a vintage car.</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="member-image">
                                    <div class="image-overlay"></div>
                                    <img src="/img/staff/patrick.jpg" />
                                    <span class="image-overlay-title">Patrick</span>
                                </div>
                                <div class="member-description">
                                    <p>Patrick can do all of the things that Steve can do, except for have a name that rhymes with &quot;sleeve&quot;. He likes to take holidays at inconvenient times.</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="member-image">
                                    <div class="image-overlay"></div>
                                    <img src="/img/staff/dean.png" />
                                    <span class="image-overlay-title">Dean</span>
                                </div>
                                <div class="member-description">
                                    <p>Dean is our resident model maker, a very talented chap who only likes dragons and swords and magic.</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="member-image">
                                    <div class="image-overlay"></div>
                                    <img src="/img/staff/mats.png" />
                                    <span class="image-overlay-title">Mats</span>
                                </div>
                                <div class="member-description">
                                    <p>Mats is back with us after a few years working as a Fonz impersonator in Spain. He is from Norway but also speaks Spanish. Somedays he refuses to speak English just for fun.</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="member-image">
                                    <div class="image-overlay"></div>
                                    <img src="/img/staff/joe.jpg" />
                                    <sp

                                    an class="image-overlay-title">Joe </span>
                                </div>
                                <div class="member-description">
                                    <p>Straight  outta Harlesden... Joe is now looking after our hire department. Paul found him looking shifty in the car park. He&#39;s a good bloke, but don&#39;t look him in the eye.</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="member-image">
                                    <div class="image-overlay"></div>
                                    <img src="/img/staff/naomi.jpg" />
                                    <sp

                                    an class="image-overlay-title">Naomi</span>
                                </div>
                                <div class="member-description">
                                    <p>
                                        After starting a career in the navy where fighting fires and touting a gun was the order of the day Naomi discovered that she gets sea-sick and guns petrified her.  Not the career for her. 
                                        She has now taken up the role of Vice Admiral on the bridge at Machine Shop and aims to keep us all in order. Fearsomely efficient & more accurate than a cruise missile, she will be happy to take your calls….
                                    </p>
                                </div>
                            </div>



                        </div> {{-- End swiper-wrapper --}}
                        <div class="swiper-pagination"></div>
                    </div>{{-- End swiper-container --}}
                    </div>
                </div>
            </div>
        </section>


</div> {{-- End wrapper --}}
     
    @include('partials.search')

    @include('partials.footer')







