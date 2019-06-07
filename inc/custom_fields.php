<?php

$metaboxes = array(
    'post_meta' => array(
        'title' => 'Extra Post Information',
        'post_type' => 'event',
        'fields' => array(
            'location' => array(
                'title' => 'Post Location',
                'type' => 'text',
                'description' => 'Where is the post located?'
            ),
            'price' => array(
                'title' => 'Post Price',
                'type' => 'number',
                'description' => 'The price of the post'
            ),
            'extra_content' => array(
                'title' => 'Extra Content',
                'type' => 'textarea',
                'description' => '',
                'rows' => 5
            ),
            'side' => array(
                'title' => 'What side is it on?',
                'type' => 'select',
                'description' => '',
                'choices' => array('left', 'right')
            )
        
        )
    ),
    'page_meta' => array(
        'title' => 'Extra Page Information',
        'post_type' => 'page'
    ),
    'events_meta' => array(
        'title' => 'Extra Event Information',
        'post_type' => 'event'
    ),
    'post_formats_meta' => array(
        'title' => 'Post Formats Fields',
        'post_type' => 'post',
        'fields' => array(
            'video_link' => array(
                'title' => 'Video Link',
                'type' => 'text',
                'condition' => 'video'
            ),
            'audio_link' => array(
                'title' => 'Audio Link',
                'type' => 'text',
                'condition' => 'audio'
            ),
            'image_url' => array(
                'title' => 'Image URL',
                'type' => 'text',
                'condition' => 'image'
            ),
            'newImage' => array(
                'title' => 'Upload an image',
                'type' => 'image',
                'condition' => 'image'
            )
            //,
            // 'newImage2' => array(
            //     'title' => 'Upload an image',
            //     'type' => 'image',
            //     'condition' => 'image'
            // )

        )
    )

);

function create_custom_meta_boxes(){
    global $metaboxes;

    if(!empty($metaboxes)){
        foreach ($metaboxes as $metaboxID => $metabox){
            add_meta_box($metaboxID, $metabox['title'], 'output_custom_meta_box', $metabox['post_type'], 'normal', 'high', $metabox);
        };
    }
    //add_meta_box('random_meta_box', 'This is a Meta Box', 'output_custom_meta_box', 'post'); //This can create a new metabox in eg add new post
}
add_action('admin_init', 'create_custom_meta_boxes');

function output_custom_meta_box($post, $metabox){
    // var_dump($metabox);
    //echo '<h1>'.$metabox['title'].'</h1>';
    //echo '<input type="text" name="inputField" class="inputField">';

    $fields = $metabox['args']['fields']; //outputting the information

    $customValues = get_post_custom($post->ID); //output functions
    // var_dump($customValues);
    // echo '<br>';

    echo '<input type="hidden" name="post_format_meta_box_nonce" value="'.wp_create_nonce( basename(__FILE__) ).'">'; //for SECURITY below nonce

    if($fields){
        foreach ($fields as $fieldID => $field) {

            if(isset($field['condition'])){
                $condition = 'class=" formBlock conditionalField" data-condition="'.$field['condition'].'" ';
            } else {
                $condition = 'class="formBlock"';
            }

            switch($field['type']){
                case 'text':
                    // echo $customValues[$fieldID][0];
                    echo '<div id="'.$fieldID.'" '.$condition.' >';
                    echo '<label>'.$field['title'].'</label>';
                    echo '<input type="text" name="'.$fieldID.'" class="inputField" value="'.$customValues[$fieldID][0].'">';
                    echo '</div>';
                break;
                case 'number':
                    
                    echo '<label>'.$field['title'].'</label>';
                    echo '<input type="number" name="'.$fieldID.'" class="inputField" value="'.$customValue[$fieldID][0].'">';
                break;
                case 'textarea':
                    
                    echo '<label for="'.$fieldID.'">'.$field['title'].'</label>';
                    echo '<textarea class="inputField" name="'.$fieldID.'" rows="'.$field['rows'].'"></textarea>';
                break;
                case 'select':
                    
                    echo '<br>';
                    echo '<label for="'.$fieldID.'">'.$field['title'].'</label>';
                    echo '<select name="'.$fieldID.'" class="inputField customSelect">';
                        echo '<option class="customSelect"> -- Please Enter a value -- </option>';
                        foreach($field['choices'] as $choice){
                            // if($choice = 'left'){
                            //     echo 'left';
                            // } else:($choice){
                            //     echo 'right';
                            // }
                            echo '<option class="customSelect" value="'.$choice.'">'.$choice.'</option>';
                        }
                    echo '</select>';
                    //if statement needed
                break;
                case 'image':
                if(get_post_meta($post->ID, $field, true)){
                    $imageID = get_post_meta($post->ID, $field, true);
                    $imageURL = wp_get_attachment_image_src($imageID, 'small');
                }
                    echo '<div id="'.$fieldID.'" '.$condition.' >';
                        echo '<label for="'.$fieldID.'">'.$field['title'].'</label>';
                        echo '<input type="hidden" name="'.$fieldID.'" readonly value="'.$customValues[$fieldID][0].'" class="hiddenImageID">'; //read only stops people adding in something that we dont ant, security
                        if(get_post_meta($post->ID, $fieldID, true)){
                            echo '<img src="'.$imageURL[0].'">';
                            echo '<button class="">Remove Image </button>';
                        }
                        echo '<button class="setCustomImage">Add Image </button>';
                    echo '</div>';
                break;
                default:
                    echo $customValues[$fieldID][0];
                    echo '<br>';
                    echo '<label for="'.$fieldID.'">'.$field['title'].'</label>';
                    echo '<input type="text" name="'.$fieldID.'" class="inputField">';
                    //echo '<p>This is a the default input</p>';
                break;

            }
        }
    }
    
}
                    //hard coding below to style eg input boxes in  posts. $metaboxes to make it easier
                    // function create_custom_meta_boxes(){
                    //     //add_meta_box('random_meta_box', 'This is a Meta Box', 'output_custom_meta_box', 'post');
                    
                    // }

                    // add_action('admin_init', 'create_custom_meta_boxes');

                    // function output_custom_meta_box(){
                    //     echo '<input type="text" name="inputField" class="inputField">';
                    // }

//SECURITY
//$postID what ever post ID we are currently on
function save_custom_metaboxes($postID){
    global $metaboxes;
   
    if(! wp_verify_nonce( $_POST['post_format_meta_box_nonce'], basename(__FILE__) ) ){
        return $postID;
    }  //can random people edit this data (hack) yes or no
    
    if( defined('DOING_AUTOSAVE')  && DOING_AUTOSAVE ){
        return $postID;
    }//can different admins edit this data yes or no. 
    
    if($POST['post_type'] == 'page'){
        if(! current_user_can('edit_page', $postID) ){
            return $postID;
        } //verify if the person's role is allowed to edit the post, can my user actually do this
        } elseif(! current_user_can('edit_post', $postID) ){
            return $postID;
        }

    $postType = get_post_type();
    foreach ( $metaboxes as $metaboxID => $metabox ) {
        if ( $metabox['post_type'] == $postType ){
            $fields = $metabox['fields'];
            foreach ( $fields as $fieldID => $field) {
                $oldValue = get_post_meta($postID, $fieldID, true );
                $newValue = $_POST[$fieldID];

                if ($newValue && $newValue != $oldValue){
                    update_post_meta($postID, $fieldID, $newValue);
                } elseif($newValue == '' || ! isset($_POST[$fieldID]) ){
                    delete_post_meta($postID, $fieldID, $oldValue);
                }
            }
        }
    }


   
}
add_action('save_post', 'save_custom_metaboxes');