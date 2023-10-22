<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php require_once('inc/header.php') ?>

<body>

   <!-- Header
   ================================================== -->
   <header id="home">

      <nav id="nav-wrap">

         <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
         <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>

         <ul id="nav" class="nav">
            <li class="current"><a class="smoothscroll" href="#home">Inicio</a></li>
            <li><a class="smoothscroll" href="#about">Acerca de</a></li>
            <li><a class="smoothscroll" href="#resume">Educación</a></li>
            <li><a class="smoothscroll" href="#work">Experiencia</a></li>
            <li><a class="smoothscroll" href="#portfolio">Proyectos</a></li>
            <li><a class="smoothscroll" href="#testimonials">Testimonios</a></li>
         </ul> <!-- end #nav -->

      </nav> <!-- end #nav-wrap -->
      <?php
      $u_qry = $conn->query("SELECT * FROM users where id = 1");
      foreach ($u_qry->fetch_array() as $k => $v) {
         if (!is_numeric($k)) {
            $user[$k] = $v;
         }
      }
      $c_qry = $conn->query("SELECT * FROM contacts");
      while ($row = $c_qry->fetch_assoc()) {
         $contact[$row['meta_field']] = $row['meta_value'];
      }
      // var_dump($contact['facebook']);
      ?>
      <div class="row banner">
         <div class="banner-text">
            <h1 class="responsive-headline">Soy <?php echo isset($user) ? ucwords($user['firstname'] . ' ' . $user['lastname']) : ""; ?></h1>
            <h3>Desarrollador web y creo aplicaciones web increíbles y efectivas para empresas de todos los tamaños en todo el mundo. Comencemos a desplazarnos y aprendamos más sobre mí.</h3>
            <hr />
            <ul class="social">
               <li><a target="_blank" href="<?php echo $contact['facebook'] ?>"><i class="fa fa-facebook"></i></a></li>
               <li><a target="_blank" href="<?php echo $contact['twitter'] ?>"><i class="fa fa-twitter"></i></a></li>
               <li><a target="_blank" href="mailto:<?php echo $contact['email'] ?>"><i class="fa fa-google-plus"></i></a></li>
               <li><a target="_blank" href="<?php echo $contact['linkin'] ?>"><i class="fa fa-linkedin"></i></a></li>
            </ul>
         </div>
      </div>

      <p class="scrolldown">
         <a class="smoothscroll" href="#about"><i class="icon-down-circle"></i></a>
      </p>

   </header> <!-- Header End -->


   <!-- About Section
   ================================================== -->
   <section id="about">

      <div class="row">

         <div class="three columns">

            <img class="profile-pic" src="./uploads/1697503020_avatar.jpg" alt="" />

         </div>

         <div class="nine columns main-col">

            <h2>Acerca de mí</h2>
            <style>
               #about_me * {
                  color: #7A7A7A !important;
               }
            </style>
            <div id="about_me"><?php include "about.html"; ?></div>

            <div class="row">

               <div class="columns contact-details">

                  <h2>Información de Contacto</h2>
                  <p class="address">
                     <span><?php echo $contact['address'] ?></span><br>
                     <span><?php echo $contact['mobile'] ?></span><br>
                     <span><?php echo $contact['email'] ?></span>
                  </p>

               </div>

               <div class="columns download">
                  <p>
                     <!-- <a href="#" class="button"><i class="fa fa-download"></i>Download Resume</a> -->
                  </p>
               </div>

            </div> <!-- end row -->

         </div> <!-- end .main-col -->

      </div>

   </section> <!-- About Section End-->


   <!-- Resume Section
   ================================================== -->
   <section id="resume">

      <!-- Education
      ----------------------------------------------- -->
      <div class="row education">

         <div class="three columns header-col">
            <h1><span>Educación</span></h1>
         </div>

         <div class="nine columns main-col">
            <?php
            $e_qry = $conn->query("SELECT * FROM education order by year desc, month desc");
            while ($row = $e_qry->fetch_assoc()) :
            ?>
               <div class="row item">

                  <div class="twelve columns">

                     <h3><?php echo $row['school'] ?></h3>
                     <p class="info"><?php echo $row['degree'] ?> <span>&bull;</span> <em class="date"><?php echo $row['month'] . ' ' . $row['year'] ?></em></p>

                     <p>
                        <?php echo stripslashes(html_entity_decode($row['description'])) ?>
                     </p>

                  </div>

               </div> <!-- item end -->
            <?php endwhile; ?>


         </div> <!-- main-col end -->

      </div> <!-- End Education -->


      <!-- Work
      ----------------------------------------------- -->
      <section id="work">

         <br><br>
         <div class="row work">

            <div class="three columns header-col">
               <h1><span>Experiencia</span></h1>
            </div>

            <div class="nine columns main-col">
               <?php
               $w_qry = $conn->query("SELECT * FROM work ");
               while ($row = $w_qry->fetch_assoc()) :
               ?>
                  <div class="row item">

                     <div class="twelve columns">

                        <h3><?php echo $row['company'] ?></h3>
                        <p class="info"><?php echo $row['position'] ?> <span>&bull;</span> <em class="date"><?php echo str_replace("_", " ", $row['started']) ?> - <?php echo str_replace("_", " ", $row['ended']) ?></em></p>


                        <p><?php echo stripslashes(html_entity_decode($row['description'])) ?></p>

                     </div>

                  </div> <!-- item end -->
               <?php endwhile; ?>
            </div> <!-- main-col end -->

         </div> <!-- End Work -->

      </section>

      <!-- Skills
      ----------------------------------------------- -->
      <div class="row skill">

         <div class="three columns header-col">
            <h1><span>Habilidades</span></h1>
         </div>

         <div class="nine columns main-col">

            <p>Los siguientes son mis habilidades en porcentajes específicos, si deseas más información me puedes contactar.
            </p>

            <div class="bars">

               <ul class="skills">
                  <li><span class="bar-expand photoshop"></span><em>Photoshop</em></li>
                  <li><span class="bar-expand illustrator"></span><em>Illustrator</em></li>
                  <li><span class="bar-expand wordpress"></span><em>Wordpress</em></li>
                  <li><span class="bar-expand css"></span><em>CSS</em></li>
                  <li><span class="bar-expand html5"></span><em>HTML5</em></li>
                  <li><span class="bar-expand jquery"></span><em>jQuery</em></li>
               </ul>

            </div>

         </div>

      </div>

   </section>
   -

   <!-- Portfolio Section
   ================================================== -->
   <section id="portfolio">

      <div class="row">

         <div class="twelve columns collapsed">

            <h1>Mira alguno de mis trabajos</h1>

            <!-- portfolio-wrapper -->
            <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-thirds cf">
               <?php
               $p_qry = $conn->query("SELECT * FROM project ");
               while ($row = $p_qry->fetch_assoc()) :
               ?>
                  <div class="columns portfolio-item">
                     <div class="item-wrap">

                        <a href="#modal-<?php echo $row['id'] ?>" title="">
                           <img alt="" src="<?php echo validate_image($row['banner']) ?>">
                           <div class="overlay">
                              <div class="portfolio-item-meta">
                                 <h5 class="truncate-1"><?php echo $row['name'] ?></h5>
                                 <!-- <p>Illustrration</p> -->
                              </div>
                           </div>
                           <div class="link-icon"><i class="icon-plus"></i></div>
                        </a>
                     </div>
                  </div> <!-- item end -->

               <?php endwhile; ?>

            </div> <!-- portfolio-wrapper end -->

         </div> <!-- twelve columns end -->


         <?php
         $p_qry = $conn->query("SELECT * FROM project ");
         while ($row = $p_qry->fetch_assoc()) :
         ?>

            <!-- Modal Popup
        --------------------------------------------------------------- -->

            <div id="modal-<?php echo $row['id'] ?>" class="popup-modal mfp-hide">

               <img class="scale-with-grid" src="<?php echo validate_image($row['banner']) ?>" alt="" />

               <div class="description-box">
                  <h4><?php echo $row['name'] ?></h4>
                  <p><?php echo stripslashes(html_entity_decode($row['description'])) ?></p>
                  <span class="categories"><i class="fa fa-tag"></i><?php echo $row['client'] ?></span>
               </div>

               <div class="link-box">
                  <!-- <a href="http://srikrishnacommunication.com/Giridesigns.html" target="_blank">Details</a> -->
                  <a class="popup-modal-dismiss">Close</a>
               </div>

            </div><!-- modal-01 End -->

         <?php endwhile; ?>


      </div> <!-- row End -->

   </section> <!-- Portfolio Section End-->




   <!-- Testimonials Section
   ================================================== -->
   <section id="testimonials">

      <div class="text-container">

         <div class="row">

            <div class="two columns header-col">

               <h1><span>Testimonios de Clientes</span></h1>

            </div>

            <div class="ten columns flex-container">

               <div class="flexslider">

                  <ul class="slides">

                     <li>
                        <blockquote>
                           <p>Sin duda un gran desarrollador, me ayudó a escalar mi aplicación, mejorar su rendimiento, hoy día después de 8 años sigo siendo su cliente.
                           </p>
                           <cite>Juan Cliente</cite>
                        </blockquote>
                     </li> <!-- slide ends -->

                     <li>
                        <blockquote>
                           <p>Tienen mucho conocimiento en lo que hacen, andan comprometidos con realizar su trabajo, son de gran ayuda con su asistencia.
                           </p>
                           <cite>Pedro Cliente</cite>
                        </blockquote>
                     </li> <!-- slide ends -->

                  </ul>

               </div> <!-- div.flexslider ends -->

            </div> <!-- div.flex-container ends -->

         </div> <!-- row ends -->

      </div> <!-- text-container ends -->

   </section> <!-- Testimonials Section End-->



   <!-- /.content-wrapper -->
   <?php require_once('inc/footer.php') ?>
</body>

</html>