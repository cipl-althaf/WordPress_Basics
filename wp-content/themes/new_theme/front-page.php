<?php get_header(); ?>



<section class="hero">

    
    <h1><?php echo esc_html(get_field('hero_title')) ?></h1>
    
    <p>
        <?php echo esc_html(get_field('hero_description'))?>
    </p>
    

        <?php
        
            $event_date = get_field('event_date');
            echo $event_date;
        ?>
        <br>
    
        <?php
            $hero_image = get_field('hero_image');
        ?>
    
        <?php if ($hero_image) : ?>
    
            <img
                src="<?php echo esc_url($hero_image); ?>" width="150" height="150"
                alt="Hero Image"
            >
    
        <?php endif; ?>
        <br>
    <a href="<?php echo esc_html(get_field('buttton_url')); ?>">
        <?php echo esc_html(get_field('button_text')); ?>
    </a>

    
</section>

<br>
<?php
$image_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
?>

<?php if ($image_url) : ?>
    
    <img
        src="<?php echo esc_url($image_url); ?>"
        alt="<?php echo esc_attr(get_the_title()); ?>"
    >

<?php endif; ?>


<section class="contact-section mt-5">



<?php
    // echo do_shortcode('[wpforms id="127"]');
    // echo do_shortcode('[contact-form-7 id="f082e61" title="Custom_Contact_Form"]');
    // echo do_shortcode('[contact-form-7 id="b8986b1" title="Custom_Contact_Form2"]');
?>

</section>



<?php  echo get_footer(); ?>


    <!-- <section class="hero">
    <div class="hero-content">
        <h1>Welcome to My Website</h1>
        <p>
            Build something amazing with our simple, powerful and modern solutions.
        </p>
        <a href="#" class="btn">Get Started</a>
    </div>
</section>

<section class="about">
    <h2>About Us</h2>
    <p>
        We provide quality services and solutions designed to help individuals
        and businesses achieve their goals.
    </p>
</section>

<section class="services">
    <h2>Our Services</h2>

    <div class="service-container">

        <div class="service-card">
            <h3>Web Development</h3>
            <p>
                We create modern, responsive and user-friendly websites.
            </p>
        </div>

        <div class="service-card">
            <h3>WordPress Development</h3>
            <p>
                Custom WordPress websites and themes built according to your needs.
            </p>
        </div>

        <div class="service-card">
            <h3>Technical Support</h3>
            <p>
                Get reliable technical assistance and support whenever you need it.
            </p>
        </div>

    </div>
</section>

<section class="contact">
    <h2>Let's Work Together</h2>
    <p>
        Have a project in mind? Get in touch with us today.
    </p>
    <a href="#" class="btn">Contact Us</a>
</section> -->




