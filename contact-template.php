<?php
    /*
    Template Name: Contact Template
    */

    if($_POST){
        $errors = array();
            //if(wp_verify_nonce)
        if(!$_POST['enquiryFname']){
            array_push($errors, 'your first name is required');
        }
        
        if(!$_POST['enquiryLname']){
            array_push($errors, 'your last name is required');
        }

        if(!$_POST['enquiryEmail']){
            array_push($errors, 'Your email is required');
        }
        if(!$_POST['enquiryComment']){
            array_push($errors, 'Your comments are required');
        }
        if(empty($errors)){
            $args = array(
                'post_content' => $_POST['enquiryComment'],
                'post_title' => $_POST['enquiryFname'],
                'post_type' => 'Contact', //enquires
                'meta_input' => array(
                'email' => $POST['enquiresEmail']
            )
        );
        wp_insert_post($args);
        }
        // var_dump($_Post);
        // die('the form has been submitted');

    } else{
        array_push($errors,'something went wrong with submitting the form');
    //}

}

?>

<?php get_header(); ?>

<div class="container contact">
    <div class="row">   
        <div class="col-md-3">
            <?php the_title();?>
    </div>

<?php if(have_posts() ): ?>
    <?php while( have_posts() ): the_post()?>

        <div class="row">
            <div class="col">
                <h1> <?php //the_content();?> </h1> 

        <?php if($_POST && !empty($errors)):?>
        <!-- alert message goes here -->
        <?php endif;?> 

        
            <div class="col-md-3">
                <div class="contact-info">
                    <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
                    <h2>Contact Us</h2>
                    <h4>We would love to hear from you !</h4>
                </div>
            </div>
            <div class="col-md-9">
                <div action=" <?php echo get_permalink();?>" method="post" class="contact-form">
                    <?php wp_nonce_field('wp_enquiery_form'); ?>
                    <div class="form-group">
                    <label class="control-label col-sm-2" for="fname">First Name:</label>
                    <div class="col-sm-10">          
                        <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="enquiryFname" value="<?php echo $_POST['enquiriesName']?>">
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-sm-2" for="lname">Last Name:</label>
                    <div class="col-sm-10">          
                        <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="enquiryLname">
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="enquiryEmail">
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-sm-2" for="comment">Comment:</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="5" id="comment" name="enquiryComment"></textarea>
                    </div>
                    </div>
                    <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                        <button id="enquiry-submit" type="submit" class="btn btn-default" name="submit" value="enquiry">Submit</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>

            <?php endwhile; ?>

<?php endif;?>

        <?php

            // $args = array(
            //     'post_type' => 'Contact',
            //     'posts_per_page' => -1
            // );
            // // $allContacts = new WP_Query($args)
            // var_dump($allContacts);
            // var_die();
        ?>
        <?php //if( $allContacts->have_posts() ): ?>


		



 </div>
 <!-- CONTAINER CLOSED -->

<?php get_footer(); ?>