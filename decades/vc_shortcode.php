<?php 


// Background Video
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Background Video", 'decades'),
   "base" => "bgvideo",
   "class" => "",
   "category" => 'Decades Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Video Link (Youtube Only)", 'decades'),
         "param_name" => "video", 
         "value" => "",
         "description" => esc_html__("Example: https://www.youtube.com/watch?v=0pXYp72dwl0", 'decades')
      ), 
    )
    ));
}

// Button
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Button", 'decades'),
   "base" => "otbutton",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Decades Element',
   "params" => array( 
      array(
         "type" => "vc_link",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Button", 'decades'),
         "param_name" => "btn",
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Button Color", 'decades'),
         "param_name" => "style",
         "value" => array(                        
                     esc_html__('Default', 'decades')       => 'dl-btn',
                     esc_html__('Border Left', 'decades')   => 'dl-btn btn-1',
                     esc_html__('Border Right', 'decades')  => 'dl-btn btn-2',
                     esc_html__('Animation', 'decades')     => 'btn btn-ellipse',
                  ),
      ),
    )));
}

// Icon box
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Icon Box", 'decades'),
   "base" => "servicesbox",
   "class" => "",
   "category" => 'Decades Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "dropdown",
         "heading" => esc_html__('Type Box', 'decades'),
         "param_name" => "style",
         "value" => array(
            esc_html__('Icon Right', 'decades')  => 'right', 
            esc_html__('Icon Left', 'decades')   => 'left',
         ), 
      ),  
      array(
         "type" => "iconpicker",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Icon", 'decades'),
         "param_name" => "icon",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'decades'),
         "param_name" => "title",
         "value" => "",
         "description" => esc_html__("Title of box", 'decades')
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description", 'decades'),
         "param_name" => "content",
         "value" => "",
         "description" => esc_html__("content right.", 'decades')
      ),
    )
    ));
}

// Member Team
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Member Team", 'decades'),
   "base" => "member",
   "class" => "",
   "category" => 'Decades Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Photo", 'decades'),
         "param_name" => "photo",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Member Name", 'decades'),
         "param_name" => "name",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Member Job", 'decades'),
         "param_name" => "job",
         "value" => "",
      ),
      array(
          'type' => 'param_group',
          'heading' => esc_html__("Socials", 'decades'),
          'value' => '',
          'param_name' => 'social',
          // Note params is mapped inside param-group:
          'params' => array(
               array(
                  'type' => 'iconpicker',
                  'value' => '',
                  'heading' => 'Social Icon',
                  'param_name' => 'icon',
               ),
               array(
                  'type' => 'textfield',
                  'value' => '',
                  'heading' => 'Social Link',
                  'param_name' => 'link',
               ),
          )
      ),
    )
    ));
}


// Testimonial Slider
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Testimonials", 'decades'),
   "base" => "testslide",
   "class" => "",
   "category" => 'Decades Element',
   "icon" => "icon-st",
   "params" => array(
      array(
          'type' => 'param_group',
          'heading' => esc_html__("Testimonial", 'decades'),
          'value' => '',
          'param_name' => 'testi',
          // Note params is mapped inside param-group:
          'params' => array(
               array(
                  'type' => 'textarea',
                  'value' => '',
                  'heading' => esc_html__('Text', 'decades'),
                  'param_name' => 'text',
               ),
               array(
                  'type' => 'textfield',
                  'value' => '',
                  'heading' => esc_html__('Name', 'decades'),
                  'param_name' => 'name',
               ),
               array(
                  'type' => 'textfield',
                  'value' => '',
                  'heading' => esc_html__('Job', 'decades'),
                  'param_name' => 'job',
               ),
               array(
                  'type' => 'attach_image',
                  'value' => '',
                  'heading' => esc_html__('Avatar', 'decades'),
                  'param_name' => 'photo',
               ),
          )
      ),
    )));
}


// Pricing Table
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Pricing Table", 'decades'),
   "base" => "table",
   "class" => "",
   "category" => 'Decades Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'decades'),
         "param_name" => "title",
         "value" => "",
         "description" => esc_html__("Title of table", 'decades')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Currency", 'decades'),
         "param_name" => "cur",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Price", 'decades'),
         "param_name" => "price",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Per", 'decades'),
         "param_name" => "per",
         "value" => "",
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description", 'decades'),
         "param_name" => "content",
         "value" => "",
      ),
      array(
        'type' => 'vc_link',
         "heading" => esc_html__("Button", 'decades'),
         "param_name" => "linkbox",         
         "description" => esc_html__("Add link to Button.", 'decades'),
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Feature Table?', 'decades'),
         "param_name" => "feature",
      ), 
    )));
}


// FAQs
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT FAQs", 'decades'),
   "base" => "otfaqs",
   "class" => "",
   "category" => 'Decades Element',
   "icon" => "icon-st",
   "params" => array(
      array(
          'type' => 'param_group',
          'heading' => esc_html__("FAQs", 'decades'),
          'value' => '',
          'param_name' => 'faqs',
          // Note params is mapped inside param-group:
          'params' => array(
               array(
                  'type' => 'textfield',
                  'value' => '',
                  'heading' => 'Title',
                  'param_name' => 'title',
               ),
               array(
                  'type' => 'textarea',
                  'value' => '',
                  'heading' => 'Description',
                  'param_name' => 'des',
               ),
          )
      ),
    )
    ));
}


// Popup Video
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Popup Video", 'decades'),
   "base" => "popupvideo",
   "class" => "",
   "category" => 'Decades Element',
   "icon" => "icon-st",
   "params" => array(  
      array(
        'type' => 'textfield',
         "heading" => esc_html__("Link Video", 'decades'),
         "param_name" => "link",         
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'decades'),
         "param_name" => "title",
         "value" => "",
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description", 'decades'),
         "param_name" => "content",
         "value" => "",
      ),     
    )
   ));
}



// Lastest Blog
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Latest Blog", 'decades'),
   "base" => "lastest_blog",
   "class" => "",
   "category" => 'Decades Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Number Visible", 'decades'),
         "param_name" => "cols",
         "value" => array(                        
                     esc_html__('3 Items', 'decades')   => '3',
                     esc_html__('2 Items', 'decades')   => '2',
                     esc_html__('4 Items', 'decades')   => '4',
                     ),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Number Posts", 'decades'),
         "param_name" => "number",
         "value" => "",
      ),
   )));
}



// Showcase
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Showcase", 'decades'),
   "base" => "clients",
   "class" => "",
   "category" => 'Decades Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "attach_images",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__('Images', 'decades'),
         "param_name" => "gallery",
         "value" => "",
         "description" => esc_html__("Use link out for logo client by enter link input caption image, View guide here: http://vegatheme.com/images/add-link-logo.jpg , Recomended Size: 200 x 130. ", 'decades')
      ), 
      array(
         "type" => "textfield",
         "heading" => esc_html__('Visible Number', 'decades'),
         "param_name" => "num",
         "value" => '',
         "description" => esc_html__('Number columns each rows. Recommend: 4, 5 or 6. Default: 6.', 'decades')
      ),     
    )
    ));
}

//Google Map

if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("OT Google Maps", 'decades'),
   "base"      => "maps",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Latitude", 'decades'),
         "param_name"=> "latitude",
         "value"     => 40.706187,
         "description" => __("", 'decades')
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Longitude", 'decades'),
         "param_name"=> "longitude",
         "value"     => -74.008833,
         "description" => __("", 'decades')
      ),     
     array(
         "type"      => "attach_image",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Location Image", 'decades'),
         "param_name"=> "imgmap",
         "value"     => "",
         "description" => __("Upload Location Image.", 'decades')
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Zoom map number", 'decades'),
         "param_name"=> "zoom",
         "value"     => '',
         "description" => __("", 'decades')
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Height (px)", 'decades'),
         "param_name"=> "height",
         "value"     => '',
         "description" => __("Ex: 400px.", 'decades')
      ),
    )));
}