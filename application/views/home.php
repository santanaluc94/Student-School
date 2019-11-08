 <section id="quote" class="testimonial-section py-5">
     <div class="container py-lg-5">
         <h3 class="mb-1 mb-md-5 text-center">Loved by thousands of app developers like you</h3>


         <div id="flipster-carousel" class="flipster-carousel pt-md-3">
             <div class="flip-items pb-5">
                 <?php foreach ($courses as $course) : ?>
                     <div class="flip-item">
                         <div class="item-inner shadow-lg rounded">
                             <h5 class="mb-2"><?= $course['course'] ?></h5>
                             <div class="mb-3"><?= $course['description'] ?>
                             </div>
                             <div class="source media ">
                                 <img class="source-profile rounded-circle mr-3" src="<?= base_url('public/images/courses/' . $course['course'] . 'jpg') ?>" alt="" />
                                 <div class="source-info media-body pt-3">
                                     <div><?= $course['workload'] ?> hours</div>
                                     <div>R$<?= $course['price'] ?>,00</div>
                                 </div>
                             </div>
                         </div>
                         <!--//item-inner-->
                     </div>
                     <!--//flip-item-->
                 <?php endforeach; ?>



             </div>
             <!--//items-wrapper-->
             <div class="pt-5 text-center">
                 <a class="btn btn-primary theme-btn font-weight-bold" href="https://themes.3rdwavemedia.com/bootstrap-templates/free/nova-bootstrap-landing-page-template-for-mobile-apps/">Try Nova Now</a>
             </div>

         </div>
     </div>
     <!--//container-->

 </section>
 <!--//testimonial-section-->

 <section class="cta-section py-5 theme-bg-secondary text-center">
     <div class="container">
         <h3 class="text-white font-weight-bold mb-3">Ready to turn your visitors to app users?</h3>
         <div class="text-white mx-auto single-col-max-width section-intro">Try Nova Free Today. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis.</div>
         <a class="btn theme-btn theme-btn-ghost theme-btn-on-bg mt-4" href="https://themes.3rdwavemedia.com/bootstrap-templates/free/nova-bootstrap-landing-page-template-for-mobile-apps/">Download Now - It's FREE</a>
     </div>
 </section>
 <!--//cta-section-->

 <section class="benefits-section py-5">

     <div class="container py-lg-5">
         <h3 class="mb-5 text-center font-weight-bold">Market your mobile app effectively with Nova</h3>
         <div class="row">
             <div class="item col-12 col-lg-4">
                 <div class="item-inner text-center p-3 p-lg-5">
                     <img class="mb-3" src="<?= base_url('public/images/icon-target.svg'); ?>" alt="" />
                     <h5>Focused on UX</h5>
                     <div>Use this area to list your app's key benefits. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. </div>
                 </div>
                 <!--//item-inner-->
             </div>
             <!--//item-->
             <div class="item col-12 col-lg-4">
                 <div class="item-inner text-center p-3 p-lg-5">
                     <img class="mb-3" src="<?= base_url('public/images/icon-rocket.svg'); ?>" alt="" />
                     <h5>Convert Users</h5>
                     <div>Use this area to list your app's key benefits. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. </div>
                 </div>
                 <!--//item-inner-->
             </div>
             <!--//item-->
             <div class="item col-12 col-lg-4">
                 <div class="item-inner text-center p-3 p-lg-5">
                     <img class="mb-3" src="<?= base_url('public/images/icon-cogs.svg'); ?>" alt="" />
                     <h5>Easy Customisations</h5>
                     <div>Use this area to list your app's key benefits. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. </div>
                 </div>
                 <!--//item-inner-->
             </div>
             <!--//item-->
         </div>
         <!--//row-->
         <div class="pt-3 text-center">
             <a class="btn btn-primary theme-btn theme-btn-ghost font-weight-bold" href="https://themes.3rdwavemedia.com/bootstrap-templates/free/nova-bootstrap-landing-page-template-for-mobile-apps/">Learn More</a>
         </div>
     </div>

 </section>
 <!--//benefits-section-->