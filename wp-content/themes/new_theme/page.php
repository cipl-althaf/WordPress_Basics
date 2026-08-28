<?php get_header(); ?>

<section class="hero">

    <?php
    while (have_posts()) :
        the_post();
    ?>

        <h1><?php the_title(); ?></h1>

        <?php the_content(); ?>

    <?php endwhile; ?>



    <?php if(is_page('practice-contact-form')){
        
        // echo do_shortcode('[contact-form-7 id="a7998a9" title="Practice_Contact_Form"]');
        echo "First Name = ".get_field('first_name');
        echo "<br>";
        echo "Last Name = ".get_field('last_name');
        echo "<br>";
        echo "Email  = ".get_field('email');
        echo "<br>";
        echo "Age = ".get_field('age');
        echo "<br>";
        echo "Image = ".print_r(get_field('image'));
        echo "<br>";
        echo "Range = ".get_field('range');
        echo "<br>";
        echo "Description Box = ".get_field('description');
        echo "<br>";
        echo "URL = ".get_field('url');
        echo "<br>";
        echo 'Password = '.get_field('password');
        echo '<br>';
        print_r(get_field('file'));
        echo "<br>";
        echo "new editor = ".get_field('editor');
        echo "<br>";
        echo "Embedded  = ".get_field('embeding');
        echo "<br>";
        echo "Sample Text = ".get_field('sample_text');
        echo "<br>";
        echo "Drop Down = ".get_field('drop_down');
        echo "<br>";
        echo "Gender = ".get_field('gender');
        echo "<br>";
        echo "Button Group = ".get_field('button_group');
        echo "<br>";
        echo "DropDown Option = ".get_field('drop_down');
        echo "<br>";
        $sports = get_field('sports');
        // print_r(get_field('sports'));
        // $sports = get_field('sports');
        if($sports){

            echo "Favourite Sports = ".implode(', ',$sports);
        }
        echo "<br>";
        echo "Gender = ".get_field('gender');
        echo "<br>";
        echo "Button Group = ".get_field('button_group');
        echo "<br>";
        echo "Link = ".get_field('link');
        echo "<br>";
        echo "Post Object = ";
        print_r(get_field('post_object'));
        echo "<br>";
        echo "Links = ".get_field('page_links');    
        
        
    
        // print_r(get_field('relation'));
        
    ?>
    <br>
<a href="<?php echo get_field('page_links'); ?>"> Link</a>
    <?php if(get_field('show_section')){ ?>

    <div id="section" class="border border-danger p-5">
            <label for="">Hello</label>
    </div>            

    <?php }?>
    <?php if(get_field('conditions')){ ?>
    <div id="section" class="border border-danger p-5">
            <label for="">Hello</label>
    </div>
    <?php }?>

    <?php
    echo "<br>";
    
    the_field('link');
    echo "<br>";
    $post_object = get_field('post_object');
    echo "<pre>";
    // print_r($post_object);
    echo "</pre>";
    echo "<br>";
    echo "Relationship = ";
    print_r(get_field('relation'));


    $editor = get_field('new_editor');

    echo '<pre>';
    print_r($editor);
    echo '</pre>';
    echo "<br>";
    echo "Taxo  = ";
    print_r(get_field('taxo'));
    echo "<br>";
    echo "User Data =";
    echo "<br>";
    $user_data = get_field('user_data');
    echo "<pre>";
    var_dump(get_field('user_data'));
    echo "</pre>";
    echo "User Id = ".$user_data['ID'];
    echo "<br>";
    echo "User First Name = ".$user_data['user_firstname'];
    echo "<br>";
    echo "User Last Name = ".$user_data['user_lastname'];
    echo "<br>";
    echo "User Last Name = ".$user_data['nickname'];
    echo "<br>";
    echo "User Last Name = ".$user_data['user_email'];
    echo "<br>";
    echo "User Last Name = ".$user_data['user_registered'];
    echo "<br>";
    echo "User Last Name = ".$user_data['user_avatar'];
    echo "<br>";
    echo "User URL = ".$user_data['user_url'];
    echo "<br>";
    echo "Date = ".get_field('date_picker');
    echo "<br>";
    echo "Date And Time = ".get_field('date_time_picker');
    echo "<br>";
    echo "Time = ".get_field('time_picker');
    echo "<br>";
    echo "Color Picker = ";
    print_r(get_field('color_picker'));
    echo "<br>";
    echo "Icon Picker =".get_field('icon_picker');
    echo "<br>";
    echo "Your Name = ".get_field('your_name');
    echo "<br>";
    $group = get_field('group1');
    echo "Group  g_first_name = ".$group['g_first_name'];
    echo "<br>";
    echo "Group g_last_name = ".$group['g_last_name'];
    



    ?>
    <?php }?>

    


    <?php if(is_page('contact-us')){ ?>
<div class="d-flex g-5 border">
    <div class="p-3 contact-us">

    <?php
    if(is_page('contact-us')){
        
        echo do_shortcode('[contact-form-7 id="b8986b1" title="Custom_Contact_Form2"]');

                
    }
    ?>
    </div>

    <div class="p-3">
        <h1>Contact Us</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta minima omnis deserunt id commodi aut odit iure voluptatem maxime cum? Illo atque enim temporibus blanditiis officia accusantium, soluta vitae expedita?</p>
        <div class="p-3">
            <h5 for="">
                <i class="fa-solid fa-phone"></i> 5458784545121</h5>
            <br>
            <h5 for="">
               <i class="fa-solid fa-envelope"></i> hello@gmail.com</h5>
            <br>
            <h5 for="">
               <i class="fa-solid fa-location-dot"></i> 102 street, y cross 485656</h5>
            <br>
        <div class="social-media-links justify-content-center">

    

        <a href="https://facebook.com/" target="_blank">
            <i class="fa-brands fa-facebook-f"></i>
        </a>
    
        <a href="https://instagram.com/" target="_blank">
            <i class="fa-brands fa-instagram"></i>
        </a>
    
        <a href="https://twitter.com/" target="_blank">
            <i class="fa-brands fa-x-twitter"></i>
        </a>
    
        <a href="https://linkedin.com/" target="_blank">
            <i class="fa-brands fa-linkedin-in"></i>
        </a>
    

        </div>  
    </div>
</div>

</div>
<?php };?>
    </section>

<?php get_footer(); ?>