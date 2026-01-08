@include('partials.home-head')
<body class="home-body">
    @include('partials.home-header')
    <section class="home-hero">
        <div class="container">
        <div class="row align-items-center">
               <div class="col-md-5">
                    <h1>Visual <span class="gradient-text">project</span> <span class="gradient-text">management</span> for modern teams</h1>
                    <p class="lede">Plan tasks, collaborate visually, and track progress in one powerful workispace.</p>
                    <div class="hero-actions">
                        <a class="btn primary" href="{{ route('login') }}">Get started free</a>
                        <a class="btn ghost" href="{{ route('register') }}">View demo</a>
                    </div>
                    <p>No credit card required</p>
                </div>
                <div class="col-md-7">
                    <div class="hero-visual">
                        <img src="/assets/images/banner-image.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="hero-after-section sec_shadow">
        <div class="container position-relative z-1">
            <div class="hero-after-card p-5">
                <h2 class="display-5 fw-bold mb-3 text-center font-44">
                    Everything <span class="gradient-text">your team needs</span> to stay aligned
                </h2>
                <p class="text-center mb-4">
                    TEAMTASKTRACK provides all the features your team needs to effectively plan, collaborate,
                    and track your project from start to finish.
                </p>
                <div class="row g-3 g-md-4 mt-4">
                    <div class="col-md-4">
                        <div class="feature-card">
                            <div class="feature-icon"><img src="/assets/images/streamline_task-list-solid.png" alt="" srcset=""></div>
                            <div>
                                <h5>Visual Task Boards</h5>
                                <p>Organize tasks visually with drag-and-drop boards.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-card">
                            <div class="feature-icon"><img src="/assets/images/streamline-ultimate_team-meeting-bold.png" alt="" srcset=""></div>
                            <div>
                                <h5>Team Collaboration</h5>
                                <p>Discuss projects, share files, and keep everyone on the same page.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-card">
                            <div class="feature-icon"><img src="/assets/images/clock.png" alt="" srcset=""></div>
                            <div>
                                <h5>Time Tracking</h5>
                                <p>Track time spent on tasks with a built-in timer and logs.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-card">
                            <div class="feature-icon"><img src="/assets/images/project-insight.png" alt="" srcset=""></div>
                            <div>
                                <h5>Project Insight</h5>
                                <p>Gain insight with reports that monitor overall project progress.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-card">
                            <div class="feature-icon"><img src="/assets/images/role-management.png" alt="" srcset=""></div>
                            <div>
                                <h5>Role Management</h5>
                                <p>Control user permission and assign roles easily.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-card">
                            <div class="feature-icon"><img src="/assets/images/real-time-updates.png" alt="" srcset=""></div>
                            <div>
                                <h5>Real-time Updates</h5>
                                <p>Receive instant notifications about project activities.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- How it works --}}
    <section class="how-steps-section sec_shadow">
        <div class="container position-relative z-1">
            <div class="text-center mb-4">
                <h2 class="how-title mb-2 font-44">How <span class="gradient-text">TEAMTASKTRACK</span> works</h2>
                <p class="how-subtitle">Get your team up and running in just a few simple steps.</p>
            </div>

            <div class="how-timeline">
                <span class="timeline-line"></span>
                <span class="timeline-dot left">1</span>
                <span class="timeline-dot center">2</span>
                <span class="timeline-dot right">3</span>
            </div>

            <div class="row g-4 align-items-start">
                <div class="col-md-4">
                    <article class="how-card">
                        <div class="how-text">
                            <h5>1. Create project</h5>
                            <p>Set up projects and break work into manageable tasks.</p>
                        </div>
                        <div class="how-visual">
                            <img src="/assets/images/create-project.png" alt="Create project" class="img-fluid">
                        </div>
                        <div class="how-icon"><img src="/assets/images/entypo_folder.png" alt=""></div>
                    </article>
                </div>
                <div class="col-md-4">
                    <article class="how-card">
                        <div class="how-text">
                            <h5>2. Assign tasks visually</h5>
                            <p>Use drag-and-drop boards to assign tasks and set deadlines.</p>
                        </div>
                        <div class="how-visual">
                            <img src="/assets/images/assign-visual.png" alt="Assign tasks visually" class="img-fluid">
                        </div>
                        <div class="how-icon"><img src="/assets/images/streamline-plump_file-report-solid.png" alt=""></div>
                    </article>
                </div>
                <div class="col-md-4">
                    <article class="how-card">
                        <div class="how-text">
                            <h5>3. Track progress in real time</h5>
                            <p>Monitor your team's progress, receive updates, and make adjustments as needed.</p>
                        </div>
                        <div class="how-visual">
                            <img src="/assets/images/track-progress.png" alt="Track progress" class="img-fluid">
                        </div>
                        <div class="how-icon"><img src="/assets/images/mingcute_time-duration-fill.png" alt=""> </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    {{-- Deliver faster section --}}
    <section class="deliver-section home-hero">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-5">
                    <div class="deliver-text">
                        <h2 class="font-44">See work clearly.<br>Deliver faster.</h2>
                        <p class="deliver-lede">Empower your team with intuitive tools to manage tasks, timelines, and communication all in one place.</p>
                        <ul class="feature-list">
                            <li>
                                <span class="icon">âœ“</span>
                                <div>
                                    <strong>Easy Task Management</strong>
                                    <p>Organize tasks with simple drag-and-drop boards and lists.</p>
                                </div>
                            </li>
                            <li>
                                <span class="icon">âœ“</span>
                                <div>
                                    <strong>Stay on Track</strong>
                                    <p>Visualize project timeline, set deadlines, and monitor progress.</p>
                                </div>
                            </li>
                            <li>
                                <span class="icon">âœ“</span>
                                <div>
                                    <strong>Collaborate Effortlessly</strong>
                                    <p>Get real-time updates, comments, and notifications.</p>
                                </div>
                            </li>
                        </ul>
                        <a class="btn btn-gradient" href="{{ route('register') }}">Get started free</a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="deliver-visual">
                        <img src="/assets/images/work.png" alt="Deliver faster preview" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Teams section --}}
    <section class="teams-section ">
        <div class="container position-relative z-1">
            <div class="text-center mb-4">
                <h2 class="teams-title font-44">Prefect for all <span class="gradient-text ">teams</span></h2>
                <p class="teams-subtitle">Whether you're building a new product, designing a new website, or running a marketing campaign, TEAMTASKTRACK has you covered.</p>
            </div>
            <div class="row g-3 g-lg-4 justify-content-center">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="team-card text-center">
                        <div class="team-icon">
                            <img src="/assets/images/product-teams.png" alt="Product teams">
                        </div>
                        <h5>Product teams</h5>
                        <p>Plan sprints, track feature development, and prioritize product.</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="team-card text-center">
                        <div class="team-icon">
                            <img src="/assets/images/design-teams.png" alt="Design teams">
                        </div>
                        <h5>Design Teams</h5>
                        <p>Manage design projects, feedback, and ensure creative alignment.</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="team-card text-center">
                        <div class="team-icon">
                            <img src="/assets/images/marketing-teams.png" alt="Marketing teams">
                        </div>
                        <h5>Marketing Teams</h5>
                        <p>Coordinate campaigns, track performance, and analyze results.</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="team-card text-center">
                        <div class="team-icon">
                            <img src="/assets/images/agencies.png" alt="Agencies">
                        </div>
                        <h5>Agencies</h5>
                        <p>Manage multiple clients, deadlines, and project deliverables.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Testimonials section --}}
    <section class="testimonials-section">
        <div class="container position-relative z-1">
            <div class="text-center mb-4">
                <h2 class="testimonials-title font-44">What teams say about <span class="gradient-text">TEAMTASKTRACK</span></h2>
                <p class="testimonials-subtitle">Loved by project managers, designers, and growing teams</p>
            </div>
            <div class="row g-3 g-lg-4 justify-content-center">
                <div class="col-12 col-md-4">
                    <div class="testimonial-card">
                        <div class="stars">★★★★★</div>
                        <p>â€œWe tried multiple project tools, but TEAMTASKTRACK is the only one that feels visual and intuitive. Our team adopted it instantly.â€</p>
                        <div class="testimonial-person">
                            <img src="/assets/images/avatar-1.jpg" alt="Aarav Mehta" class="rounded-circle">
                            <div>
                                <strong>Aarav Mehta</strong>
                                <span>Product Manager</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="testimonial-card">
                        <div class="stars">★★★★★</div>
                        <p>â€œTime tracking inside tasks is a game-changer. We no longer switch tools, and productivity has gone up.â€</p>
                        <div class="testimonial-person">
                            <img src="/assets/images/avatar-2.jpg" alt="Lila Chen" class="rounded-circle">
                            <div>
                                <strong>Lila Chen</strong>
                                <span>UX Designer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="testimonial-card">
                        <div class="stars">★★★★★</div>
                        <p>â€œTEAMTASKTRACK keeps everyone alignedâ€”tasks, timelines, and progress are crystal clear.â€</p>
                        <div class="testimonial-person">
                            <img src="/assets/images/avatar-3.png" alt="Jamal Patel" class="rounded-circle">
                            <div>
                                <strong>Jamal Patel</strong>
                                <span>Project Lead</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA section --}}
    <section class="cta-section">
        <div class="cta-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="cta-kicker">TEAMTASKTRACK</span>
                    <h2 class="cta-title font-44">Ready to manage projects visually?</h2>
                     <p class="cta-subtitle">Bring clarity to your workflow, collaborate with your team, and deliver work faster <br> â€” all in one place.</p>
                     <a class="btn btn-gradient-white" href="{{ route('register') }}"><span class="btn-text-gradient">Get started free</span></a>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ section --}}
    <section class="faq-section">
        <div class="container">
            <div class="row g-4 align-items-start">
                <div class="col-lg-6">
                    <div class="faq-intro">
                        <h2 class="font-44">Frequently Asked Question</h2>
                        <p>Answers to your common questions about our integration solutions</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="accordion faq-accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Can I try TEAMTASKTRACK for free?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="faqOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes. TEAMTASKTRACK offers a free plan with access to core features so you can explore the platform before upgrading.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    What kind of teams is TEAMTASKTRACK built for?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="faqTwo" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Product, design, marketing, and agency teams use TEAMTASKTRACK to plan, collaborate, and deliver faster.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Do I need a credit card to get started?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="faqThree" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    No. You can start on the free plan without a credit card and upgrade later.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    How do I invite my team members?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="faqFour" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    From the team settings, add member emails and send invites. You can control roles and permissions per member.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Is there a limit to the number of projects I can create?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="faqFive" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    On paid plans you can create unlimited projects. The free plan includes a generous quota to get you started.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.home-footer')

