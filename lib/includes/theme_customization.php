<?php
add_action('customize_register', 'cooks_customize_register');
function cooks_customize_register($wp_customize) {
    $wp_customize->remove_section( 'title_tagline' );
    $wp_customize->remove_section( 'nav' );
    $wp_customize->remove_section( 'static_front_page' );
	$wp_customize->remove_section( 'background_image' );
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'header_image' );
	$wp_customize->remove_section( 'sidebar-widgets-footer_column_1' );
	$wp_customize->remove_section( 'sidebar-widgets-footer_column_2' );
	$wp_customize->remove_section( 'sidebar-widgets-footer_column_3' );
	$wp_customize->remove_section( 'sidebar-widgets-footer_column_4' );
	$wp_customize->remove_section( 'sidebar-widgets-footer_column_5' );
	$wp_customize->remove_section( 'sidebar-widgets-sidebar-1' );
	}

  function kaya_customize_register( $wp_customize ){
   	class Kaya_Customize_Subtitle_control extends WP_Customize_control{
   			public $type = 'sub-title';
   			public function render_content(){
   				echo '<h4 class="customizer_sub_section">'.esc_html($this->label).'</h4>';
   			}
   		}
   	class Kaya_Customize_Textarea_Control extends WP_Customize_control{
   		public $type = 'text-area';
   		public function render_content(){ ?>
   			<label class="customize-control-title"> <?php echo esc_html( $this->label ); ?></label>
   			<textarea rows="6" width="100%" <?php $this->link(); ?> ><?php echo esc_textarea( $this->value() ); ?></textarea>
   		<?php }
   	}
   	class Kaya_Customize_Description_Control extends WP_Customize_Control{
   		public $type = 'description';
   		public function render_content(){
   			echo '<span class="title_description">'.esc_html( $this->label ).'</span>';
   		}
   	}
   
   	class Kaya_Customize_Multiselect_Control extends WP_Customize_Control
   		{
   			public $type = 'multi-select';
   			public function render_content()
   			{ ?>
   				<label class="customize-control-title"><?php echo esc_html($this->label); ?></label>
   				<select <?php $this->link(); ?> multiple="multiple" style="height: 100%;">
   					<?php 

   						foreach ( $this->choices as $value => $label ) {
   							$selected = ( in_array($value, $this->value()) ) ? selected(1,1,false) : '';
   							echo '<option value="'.esc_attr( $value ).'" '.$selected.'>'.$label.'</option>';	
   						}

   					?>
   				</select>	
   		<?php }
   		}
   	class Kaya_Customize_Images_Radio_Control extends WP_Customize_Control {
			public $type = 'img_radio';
			public function render_content() {
			if ( empty( $this->choices ) )
			return;
			$name = 'customize-image-radios-' . $this->id;	 ?>
			
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php foreach ( $this->choices as $value => $label ) { ?>
				<?php $selected = ( $this->value() == $value ) ? 'kaya-radio-img-selected' : ''; ?>
				<label for="<?php echo esc_attr( $name ); ?>_<?php echo esc_attr( $value ); ?>" class="kaya-radio-img <?php echo $selected; ?>">
				<input id="<?php echo esc_attr( $name ); ?>_<?php echo esc_attr( $value ); ?>" class="img_radio" type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
				<img src="<?php echo $label['img_src']; ?>" alt="" />
				</label>
			<?php
			} // end foreach
		}	
  	 }
  	 // Multi text field
  	  class Kaya_Multi_Text_Control extends WP_Customize_control{
   		public $type = 'multi-text';
   		public function render_content(){ 

   				 $class = 'regular-text';
        echo '<ul id="' . $this->id . '-ul">';

        if(isset($this->choices) && is_array($this->choices)) {
            foreach($this->choices as $k => $value) {
                if($value != '') {
                    echo '<li><input type="text" id="' . $this->$this->id . '-' . $k . '" name="kaya_custom_sidebar[]" value="' . esc_attr($value) . '" class="' . $class . '" /> <a href="javascript:void(0);" class="redux-opts-multi-text-remove">' . __('Remove', 'envata') . '</a></li>';
                }
            }
        } else {
            echo '<li><input type="text"  data-customize-setting-link="kaya_custom_sidebar"  id="' . $this->id . '" name="kaya_custom_sidebar[]" value="" class="' . $class . '" /> <a href="javascript:void(0);" class="redux-opts-multi-text-remove">' . __('Remove', 'envata') . '</a></li>';
        }

        echo '<li style="display:none;"><input type="text" data-customize-setting-link="kaya_custom_sidebar1" id="' . $this->id . '" name="kaya_custom_sidebar[]" value="" class="' . $class . '" /> <a href="javascript:void(0);" class="redux-opts-multi-text-remove">' . __('Remove', 'envata') . '</a></li>';
        echo '</ul>';
        echo '<a href="javascript:void(0);" class="redux-opts-multi-text-add" rel-id="' . $this->id . '-ul" rel-name="kaya_custom_sidebar[]">' . __('Add More', 'envata') . '</a><br/>';
        //echo (isset($this->field['desc']) && !empty($this->field['desc'])) ? ' <span class="description">' . $this->field['desc'] . '</span>' : '';
   		}
   	}
	}
   add_action('customize_register','kaya_customize_register');
  
    // Layout Mode
function kaya_layout_mode( $wp_customize ){

	$wp_customize->add_section(
		'theme-layout-mode',
		array(
			'title' => __('Layout Options','cooks'),
			'priority' => 1,
			'capability' => 'edit_theme_options'
			)
		);
	
	$wp_customize->add_setting( 'theme_layout_mode',
		array( 
			'default' => 'fluid'
		));
	$wp_customize->add_control( 'theme_layout_mode',
		array(
		'label' => __('layout Mode','cooks'),
		'section' => 'theme-layout-mode',
		'priority' => 10,
		'type' => 'radio',
		'choices' => array(
			'fluid' => __('Fluid','cooks'),
			'boxed' => __('Boxed','cooks')	
			)
		)
		);
	$wp_customize->add_setting('fullscreen[bg_img]', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'fullscreen', array(
        'label'    => __('Change Fullscreen Background Defualt Image', 'cooks'),
        'section'  => 'theme-layout-mode',
        'settings' => 'fullscreen[bg_img]',
		'priority' => 11
    )));
  $wp_customize->add_setting( 'fullscreen_bg_img_repeat',
    array( 
      'default' => 'no-repeat'
    ));
  $wp_customize->add_control( 'fullscreen_bg_img_repeat',
    array(
    'label' => __('Background Repeat','cooks'),
    'section' => 'theme-layout-mode',
    'priority' => 12,
    'type' => 'radio',
    'choices' => array(
      'repeat' => __('Repeat','cooks'),
      'no-repeat' => __('No Repeat','cooks')  
      )
    )
    ); 
   $wp_customize->add_setting( 'home_container_bg',
    array( 
      'default' => 'on'
    ));
  $wp_customize->add_control( 'home_container_bg',
    array(
    'label' => __('Front Page Container Background','cooks'),
    'section' => 'theme-layout-mode',
    'priority' => 13,
    'type' => 'radio',
    'choices' => array(
      'on' => __('On','cooks'),
      'off' => __('Off','cooks')  
      )
    )
    ); 
	$wp_customize->add_setting( 'responsive_layout_mode',
		array( 
			'default' => 'on'
		));
	$wp_customize->add_control( 'responsive_layout_mode',
		array(
		'label' => __('Responsive Mode','cooks'),
		'section' => 'theme-layout-mode',
		'priority' => 20,
		'type' => 'radio',
		'choices' => array(
			'on' => __('On','cooks'),
			'off' => __('Off','cooks')	
			)
		)
		);
}
add_action('customize_register','kaya_layout_mode');
//End
function logo_section( $wp_customize ) {
		$wp_customize->add_section(
	// ID
	'logo-section',
	// Arguments array
	array(
		'title' => __( 'Header Section', 'cooks' ),
		'priority'       => 1,
		'capability' => 'edit_theme_options',
		//'description' => __( '', 'cooks' )
	));
$wp_customize->add_setting('kaya_logo_type', array(
		'default' => 'text_logo',
	));
$wp_customize->add_control('kaya_logo_type',array(
		'label' => __('Choose Logo Type','cooks'),
		'type' => 'radio',
		'section' => 'logo-section',
		'choices' => array(
			'text_logo' => __('Text Logo','cooks'),
			'img_logo' => __('Image Logo','cooks')
			),
		'priority' => 10
	));		

  $url=get_template_directory_uri();
  $wp_customize->add_setting('kaya_logo[upload_logo]', array(
        'default'           => $url.'/images/logo.png',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'kaya_logo', array(
        'label'    => __('Upload Logo Image', 'cooks'),
        'section'  => 'logo-section',
        'settings' => 'kaya_logo[upload_logo]',
		'priority' => 20
    )));
$wp_customize->add_setting('text_logo',
    array(
        'default' => 'Cooks',
    ));

$wp_customize->add_control(
    'text_logo',
    array(
        'label' => __('Text Logo','cooks'),
        'section' => 'logo-section',
        'type' => 'text',
		'priority' => 30,
    ));
$wp_customize->add_setting('text_logo_font_size',
    array(
        'default' => '150',
    ));

$wp_customize->add_control(
    'text_logo_font_size',
    array(
        'label' => __('Logo Font Size ( px )','cooks'),
        'section' => 'logo-section',
        'type' => 'text',
		'priority' => 40,
    ));

$wp_customize->add_setting('text_logo_font_color',
    array(
        'default' => '#ffffff',
    ));

$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'text_logo_font_color',
    array(
        'label' => __('Logo Font Color','cooks'),
        'section' => 'logo-section',
        'type' => 'color',
		'priority' => 50,
    )));
$wp_customize->add_setting(
    'text_logo_font_family',
    array(
        'default' => 'Leckerli One',
    )
);
	$wp_customize->add_control(
    'text_logo_font_family',
    array(
        'label' => __('Enter Google font for Logo'),
        'section' => 'logo-section',
        'type' => 'text',
		'priority' => 60,
    )
);

$wp_customize->add_setting('logo_margin_bottom',
    array(
        'default' => '-10',
    ));

$wp_customize->add_control('logo_margin_bottom',
    array(
        'label' => __('Logo Margin Bottom ( px )','cooks'),
        'section' => 'logo-section',
        'type' => 'text',
		'priority' => 70,
    ));

  $wp_customize->add_setting( 'logo_desc', array(
        'default' => '<h4> Restaurant WordPress Theme </h4>'
    ));
  $wp_customize->add_control(
    new Kaya_Customize_Textarea_Control( $wp_customize, 'logo_desc', array(
      'label'    => __( 'Logo Description', 'cooks' ),
      'section'  => 'logo-section',
      'settings' => 'logo_desc',
      'priority' => 80,
      'type' => 'text-area',
      ))  );

  	$wp_customize->add_setting( 'logo_desc_sample' );
 	$wp_customize->add_control(
    new Kaya_Customize_Description_Control( $wp_customize, 'logo_desc_sample', array(
      'label'    => __( '<strong style="font-size:16px; letter-spacing: 2px;"> Restaurant WordPress Theme</strong>', 'cooks' ),
      'section'  => 'logo-section',
      'settings' => 'logo_desc_sample',
      'priority' => 91
    ))
  );
	
$wp_customize->add_setting( 'logo_desc_text_color' );
  $wp_customize->add_control(
    new WP_Customize_Color_Control( $wp_customize, 'logo_desc_text_color', array(
      'label'    => __( 'Logo Description Color', 'cooks' ),
      'section'  => 'logo-section',
      'settings' => 'logo_desc_text_color',
      'priority' => 110,
      'type' => 'color',
      ))  );
	}
add_action( 'customize_register', 'logo_section' );
//end

// Menu Section
function menu_section( $wp_customize ) {
		$wp_customize->add_section(
	// ID
	'menu-section',
	// Arguments array
	array(
		'title' => __( 'Menu Section', 'cooks' ),
		'priority'       => 2,
		'capability' => 'edit_theme_options',
		//'description' => __( '', 'cooks' )
	)
);
  $colors[] = array(
		'slug'=>'menu_background_color',
		'default' => '',
		'label' => __('Menu Links Background Color', 'cooks'),
		'priority' => 1
	);
    $colors[] = array(
    'slug'=>'menu_border_color',
    'default' => '#ffffff',
    'label' => __('Menu Links Border Color', 'cooks'),
    'priority' => 3
  );
 
    $colors[] = array(
		'slug'=>'menu_link_color',
		'priority' => 4,
		'default' => '#fff',
		'label' => __('Menu Links Color', 'cooks'),
	);
		$colors[] = array(
		'slug'=>'menu_icon_color',
		'priority' => 5,
		'default' => '#339933',
		'label' => __('Menu Links Icon Color', 'cooks'),
	);
	$colors[] = array(
		'slug'=>'menu_link_hover_bg_color',
		'default' => '#000',
		'label' => __('Menu Links Hover BG color', 'cooks'),
		'priority' => 6
	);
	$colors[] = array(
		'slug'=>'menu_link_hover_text_color',
		'default' => '#ffffff',
		'label' => __('Menu  Hover BG Links color', 'cooks'),
		'priority' => 7
	);
	$colors[] = array(
		'slug'=>'menu_bg_active_color',
		'default' => '#000',
		'label' => __('Menu Active BG Color', 'cooks'),
		'priority' => 8
	);
	$colors[] = array(
		'slug'=>'menu_link_active_color',
		'priority' => 9,
		'default' => '#fff',
		'label' => __('Menu Active BG Links Color', 'cooks'),
	);
	$wp_customize->add_setting( 'submenu_title' );
	$wp_customize->add_control(
    new Kaya_Customize_Subtitle_control( $wp_customize, 'submenu_title', array(
      'label'    => __( 'Child Menu Settings', 'cooks' ),
      'section'  => 'menu-section',
      'settings' => 'submenu_title',
      'priority' => 10
    ))); 

    $colors[] = array(
		'slug'=>'sub_menu_bg_color',
		'default' => '',
		'label' => __('Background Color', 'cooks'),
		'priority' => 11
	);
    $colors[] = array(
		'slug'=>'sub_menu_bottom_border_color',
		'default' => '#020202',
		'label' => __('Bottom Border Color', 'cooks'),
		'priority' => 12
	);
   	$colors[] = array(
		'slug'=>'sub_menu_link_color',
		'default' => '#848484',
		'label' => __('Links Color', 'cooks'),
		'priority' => 13
	);
	$colors[] = array(
		'slug'=>'sub_menu_link_hover_bg_color',
		'default' => '#333333',
		'label' => __('Hover Background Color', 'cooks'),
		'priority' => 14
	);
	    $colors[] = array(
		'slug'=>'sub_menu_link_hover_color',
		'default' => '#ffffff',
		'label' => __('Links Hover Color', 'cooks'),
		'priority' => 15
	);
	$colors[] = array(
		'slug'=>'sub_menu_active_bg_color',
		'default' => '#333',
		'label' => __('Link Active BG Color', 'cooks'),
		'priority' => 16
	);
	$colors[] = array(
		'slug'=>'sub_menu_link_active_color',
		'default' => '#fff',
		'label' => __('Link Active Color', 'cooks'),
		'priority' => 17
	);  
	$wp_customize->add_setting(
    'menu_margin_top',
    array(
        'default' => '',
    )
);
    foreach( $colors as $color ) {
	// SETTINGS
	$wp_customize->add_setting(
		$color['slug'], array(
			'default' => $color['default'],
			'type' => 'option',
			'capability' =>
			'edit_theme_options'
		)
	);
	// CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'],
			array('label' => $color['label'],
			'section' => 'menu-section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])

		)
	);
}


}
add_action( 'customize_register', 'menu_section'); // End

function skincolors( $wp_customize ) {
		$wp_customize->add_section(
	// ID
	'Custom_color_section',
	// Arguments array
	array(
		'title' => __( 'Accent Colors', 'cooks' ),
		'priority'       => 3,
		'capability' => 'edit_theme_options',
		//'description' => __( '', 'cooks' )
	)
);	
	$colors = array();
$colors[] = array(
	'slug'=>'accent_bg_color',
	'default' => '#339933',
	 'transport'   => 'refresh',
	'label' => __('Accent BG Color', 'cooks')
);

$colors[] = array(
	'slug'=>'accent_text_color',
	'default' => '#ffffff',
	 'transport'   => 'refresh',
	'label' => __('Text Color for Accent BG Color', 'cooks')
);

foreach( $colors as $color ) {
	// SETTINGS
	$wp_customize->add_setting(
		$color['slug'], array(
			'default' => $color['default'],
			'type' => 'option', 
			'capability' => 
			'edit_theme_options'
		)
	);
	// CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'], 
			array('label' => $color['label'], 
			'section' => 'Custom_color_section',
			'settings' => $color['slug'])
		)
	);
}
	
}
add_action( 'customize_register', 'skincolors' );
// End

// Page Title color Settings

function page_titlebar_section( $wp_customize ) {
		$wp_customize->add_section(
	// ID
	'page-titlebar-section',
	// Arguments array
	array(
		'title' => __( 'Page Titlebar Settings', 'cooks' ),
		'priority'       => 4,
		'capability' => 'edit_theme_options',
		//'description' => __( '', 'cooks' )
	)
);

    $colors[] = array(
	'slug'=>'page_titlebar_bg_color',
	'default' => '#f7f7f7',
	'label' => __('Background Color', 'cooks'),
	'priority' => 2
);

 // Page title bar title Color
    $colors[] = array(
	'slug'=>'page_titlebar_title_color',
	'default' => '#3A3A3A',
	'label' => __('Title Color', 'cooks'),
	'priority' => 3
);
    foreach( $colors as $color ) {
	// SETTINGS
	$wp_customize->add_setting(
		$color['slug'], array(
			'default' => $color['default'],
			'type' => 'option',
			'capability' =>
			'edit_theme_options'
		)
	);
	// CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'],
			array('label' => $color['label'],
			'section' => 'page-titlebar-section',
			'settings' => $color['slug'])

		)
	);
}


}
/*
add_action( 'customize_register', 'kaya_slider_titlebar_settings' );

    // Layout Mode
function kaya_slider_titlebar_settings( $wp_customize ){

	$wp_customize->add_section(
		'subheader-section',
		array(
			'title' => 'Page Titlebar Section',
			'priority' => 4,
			'capability' => 'edit_theme_options'
			)
		);
	$wp_customize->add_setting( 'page_title_section' );
	$wp_customize->add_control(
	    new Kaya_Customize_Subtitle_control( $wp_customize, 'page_title_section', array(
	      'label'    => __( 'Page Title Bar Color Section', 'cooks' ),
	      'section'  => 'page-color-section',
	      'settings' => 'page_title_section',
	      'priority' => 1
    ))); 
	$wp_customize->add_setting( 'page_title_bg_color',
		array( 
			'default' => ''
		));
	$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize, 'page_title_bg_color',
		array(
			'label' => 'Background Color',
			'section' => 'subheader-section',
			'priority' => 2,
			'type' => 'color',
		)));
	$wp_customize->add_setting( 'page_titlebar_title_color',
		array( 
			'default' => '#ffffff'
		));
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize, 'page_titlebar_title_color',
		array(
			'label' => 'Title Color',
			'section' => 'subheader-section',
			'priority' => 3,
			'type' => 'color',
		)));
}
*/
// Page Title color Settings

function page_color_section( $wp_customize ) {
		$wp_customize->add_section(
	// ID
	'page-color-section',
	// Arguments array
	array(
		'title' => __( 'Page Color Settings', 'cooks' ),
		'priority'       => 5,
		'capability' => 'edit_theme_options',
		//'description' => __( '', 'cooks' )
	)
);
	$url=get_template_directory_uri().'/images/';	
	$wp_customize->add_setting( 'page_title_section' );
	$wp_customize->add_control(
	    new Kaya_Customize_Subtitle_control( $wp_customize, 'page_title_section', array(
	      'label'    => __( 'Page Title Bar Color Section', 'cooks' ),
	      'section'  => 'page-color-section',
	      'settings' => 'page_title_section',
	      'priority' => 0
    )));

    $wp_customize->add_setting('page_title_bar[bg_img]',array(
    	'default' =>  $url.'titlebar_bg.png',
    	'capability' => 'edit_theme_options',
    	'type' => 'option'
    	));
     $wp_customize->add_control(
    	new WP_Customize_Image_Control($wp_customize,'page_title_bar',array(
    		'label' =>  __('Upload Transparent BG Image','cooks'),
    		'section' => 'page-color-section',
    		'settings' => 'page_title_bar[bg_img]',
    		'priority' => 1
    	 	)));

    $wp_customize->add_setting('page_title_bar_bg_repeat',
	array(
		'deafult' => 'repeat',
		));
	$wp_customize->add_control('page_title_bar_bg_repeat',
	array(
		'label' => __('Background Repeat','cooks'),
		'capability' => 'edit_theme_options', 
		'section' => 'page-color-section',
		'priority' => 2,
		'type' => 'radio',
		'choices' => array(
			'no-repeat' => __('No Repeat','cooks'),
			'repeat' => __('Repeat','cooks')
			)
		));	
	$wp_customize->add_setting( 'page_title_bg_color',
		array( 
			'default' => ''
		));
	$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize, 'page_title_bg_color',
		array(
			'label' => __('Background Color','cooks'),
			'section' => 'page-color-section',
			'priority' => 3,
			'type' => 'color',
		)));
	$wp_customize->add_setting( 'page_titlebar_title_color',
		array( 
			'default' => '#333333'
		));
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize, 'page_titlebar_title_color',
		array(
			'label' => __('Title Color','cooks'),
			'section' => 'page-color-section',
			'priority' => 4,
			'type' => 'color',
		)));	
	$wp_customize->add_setting( 'page_middile_section' );
	$wp_customize->add_control(
	    new Kaya_Customize_Subtitle_control( $wp_customize, 'page_middile_section', array(
	      'label'    => __( 'Page Middle Content Color Section', 'cooks' ),
	      'section'  => 'page-color-section',
	      'settings' => 'page_middile_section',
	      'priority' => 5
    )));

	  $wp_customize->add_setting('page_content_bg[bg_img]',array(
    	'default' =>  $url.'content_opc_bg.png',
    	'capability' => 'edit_theme_options',
    	'type' => 'option'
    	));
     $wp_customize->add_control(
    	new WP_Customize_Image_Control($wp_customize,'page_content_bg',array(
    		'label' =>  __('Upload Transparent BG Image','cooks'),
    		'section' => 'page-color-section',
    		'settings' => 'page_content_bg[bg_img]',
    		'priority' => 6
    	 	)));

    $wp_customize->add_setting('page_content_bg_repeat',
	array(
		'deafult' => 'repeat',
		));
	$wp_customize->add_control('page_content_bg_repeat',
	array(
		'label' => __('Background Repeat','cooks'),
		'capability' => 'edit_theme_options', 
		'section' => 'page-color-section',
		'priority' => 7,
		'type' => 'radio',
		'choices' => array(
			'no-repeat' => __('No Repeat','cooks'),
			'repeat' => __('Repeat','cooks')
			)
		));	
    $colors[] = array(
	'slug'=>'page_bg_color',
	'default' => '',
	'label' => __('Background Color', 'cooks'),
	'priority' => 8
);

    $colors[] = array(
	'slug'=>'page_titles_color',
	'default' => '#333',
	'label' => __('Title Color', 'cooks'),
	'priority' => 9
);
        $colors[] = array(
	'slug'=>'page_description_color',
	'default' => '#555555',
	'label' => __('Content Color', 'cooks'),
	'priority' => 10
);
    $colors[] = array(
	'slug'=>'page_link_color',
	'default' => '#2EA2CC',
	'label' => __('Link Color', 'cooks'),
	'priority' => 11
);
 $colors[] = array(
	'slug'=>'page_link_hover_color',
	'default' => '#339933',
	'label' => __('Link Hover Color', 'cooks'),
	'priority' => 12
);
 $wp_customize->add_setting( 'page_sidebar_section' );
	$wp_customize->add_control(
	    new Kaya_Customize_Subtitle_control( $wp_customize, 'page_sidebar_section', array(
	      'label'    => __( 'Page Sidebar Color Section', 'cooks' ),
	      'section'  => 'page-color-section',
	      'settings' => 'page_sidebar_section',
	      'priority' => 13
    )));
 	$colors[] = array(
		'label' => __('Title Color','cooks'),
		'default' => '#333',
		'priority' => 14	,
		'slug' => 'sidebar_title_color',
		'capability' => 'edit_theme_options'
		);
	$colors[] = array(
			'label' => __('Content Color','cooks'),
			'slug' => 'sidebar_content_color',
			'priority' => 15,
			'default' => '#555555',
			'capability' => 'edit_theme_options'
		);
	$colors[] = array(
			'label' => __('Link Color','cooks'),
			'slug' => 'sidebar_link_color',
			'priority' => 16,
			'capability' => 'edit_theme_options',
			'default' => '#2EA2CC'
		);
	$colors[] = array(
			'label' => __('Link Hover Color','cooks'),
			'slug' => 'sidebar_link_hover_color',
			'default' => '#339933',
			'priority' => 17,
			'capability' => 'edit_theme_options'
		);   
    foreach( $colors as $color ) {
	// SETTINGS
	$wp_customize->add_setting(
		$color['slug'], array(
			'default' => $color['default'],
			'type' => 'option',
			'capability' =>
			'edit_theme_options'
		)
	);
	// CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'],
			array('label' => $color['label'],
			'section' => 'page-color-section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])

		)
	);
}


}
add_action( 'customize_register', 'page_color_section' );

/* Portfolio Thumbnail Color Settings */
function portfolio_thumbnail_color($wp_customize){
	$wp_customize->add_section('pf_page_section', array(
			'title' => 'Foodmenu Section',
			'priority' => '6',
			'capability' => 'edit_theme_options',
		));
/*
	$wp_customize->add_setting( 'portfolio_page_description' );
  	$wp_customize->add_control(
    new Kaya_Customize_Description_Control( 

      $wp_customize, 'portfolio_page_description', array(
      'label'    => __( 'These settings works for the pages which are created using "Portfolio Page" templates, not for Portfolio widgets.', 'cooks' ),
      'section'  => 'pf_page_section',
      'settings' => 'portfolio_page_description',
      'priority' => 0
    ))
  );
*/
  $wp_customize->add_setting('pf_slug_name', array(
      'default' => 'foodmenu'
    ));
  $wp_customize->add_control('pf_slug_name',array(
    'label' => __('Foodmenu Slug Name','cooks'),
    'type' => 'text',
    'section' => 'pf_page_section',
    'priority' => 1
  ));
$wp_customize->add_setting( 'pf_slug_note' );
  	$wp_customize->add_control(
    new Kaya_Customize_Description_Control( 

      $wp_customize, 'pf_slug_note', array(
      'label'    => __( 'Note: Please make sure that the permalinks to be updated by navigating to "Settings > Permalinks" select post and save changes to avoid 404 error page.', 'cooks' ),
      'section'  => 'pf_page_section',
      'settings' => 'pf_slug_note',
      'priority' => 2
    ))
  );
$wp_customize->add_setting('pf_page_sidebar', array(
			'default' => 'fullwidth'
		));

  $wp_customize->add_setting('pf_related_images_height', array(
      'default' => '400'
    ));
  $wp_customize->add_control('pf_related_images_height',array(
    'label' => __('Related Post Thumbnail Height','cooks'),
    'type' => 'text',
    'section' => 'pf_page_section',
    'priority' => 3
  ));
  	$wp_customize->add_setting('pf_related_post_title', array(
			'default' => 'Related Post'
		));
	$wp_customize->add_control('pf_related_post_title',array(
		'label' => __('Related Post Title','cooks'),
		'type' => 'text',
		'section' => 'pf_page_section',
		'priority' => 3
	));
	 $wp_customize->add_setting( 'pf_category_title' );
	$wp_customize->add_control(
	    new Kaya_Customize_Subtitle_control( $wp_customize, 'pf_category_title', array(
	      'label'    => __( 'Foodmenu Category Settings', 'cooks' ),
	      'section'  => 'pf_page_section',
	      'priority' => 4
    )));
     $wp_customize->add_setting( 'pf_category_menu_note' );
    $wp_customize->add_control(
    new Kaya_Customize_Description_Control( 
      $wp_customize, 'pf_category_menu_note', array(
      'label'    => __( 'Note: Use this section when you use "Foodmenu Categories" in menu bar', 'cooks' ),
      'section'  => 'pf_page_section',
      'settings' => 'pf_slug_note',
      'priority' => 5
    ))
  );
    	$wp_customize->add_control('pf_page_sidebar',array(
		'label' => __('Category Page Layout','cooks'),
		'type' => 'radio',
		'section' => 'pf_page_section',
		'choices' => array(
			'fullwidth' => __('No Sidebar','cooks'),
			'two_third' => __('Right','cooks'),
			'two_third_last' => __('Left','cooks')
			),
		'priority' => 6
	));
    $wp_customize->add_setting(
    'pf_thumbnail_columns',
    array(
        'default' => '4',
    )
);
    $wp_customize->add_control(
    'pf_thumbnail_columns',
    array(
        'type' => 'select',
        'label' => __('Select Columns','cooks'),
        'section' => 'pf_page_section',
        'choices' => array(
        	 '4' => __('4 Columns','cooks'),
        	 '3' => __('3 Columns','cooks'),
        	'2' => __('2 Columns','cooks'),
        	),
		'priority' => 6,
    )
);
   $wp_customize->add_setting('pf_lightbox_disable', array(
      'default' => ''
    ));
  $wp_customize->add_control('pf_lightbox_disable',array(
    'label' => __('Disable Lightbox Icon','cooks'),
    'type' => 'checkbox',
    'section' => 'pf_page_section',
    'priority' => 7
  ));
    $wp_customize->add_setting('pf_post_link_disable', array(
      'default' => ''
    ));
  $wp_customize->add_control('pf_post_link_disable',array(
    'label' => __('Disable Post Link Icon','cooks'),
    'type' => 'checkbox',
    'section' => 'pf_page_section',
    'priority' => 8
  ));

$wp_customize->add_setting('pf_images_height', array(
			'default' => '400'
		));
	$wp_customize->add_control('pf_images_height',array(
		'label' => __('Thumbnail Height','cooks'),
		'type' => 'text',
		'section' => 'pf_page_section',
		'priority' => 11
	));
  $wp_customize->add_setting( 'pf_posts_sub_title' );
  $wp_customize->add_control(
      new Kaya_Customize_Subtitle_control( $wp_customize, 'pf_posts_sub_title', array(
        'label'    => __( 'Posts Title Settings', 'cooks' ),
        'section'  => 'pf_page_section',
        'settings' => 'pf_posts_sub_title',
        'priority' => 14
    )));
    $wp_customize->add_setting('pf_enable_title', array(
      'default' => ''
    ));
  $wp_customize->add_control('pf_enable_title',array(
    'label' => __('Enable Posts Title','cooks'),
    'type' => 'checkbox',
    'section' => 'pf_page_section',
    'priority' => 15
  ));
  $wp_customize->add_setting( 'pf_posts_title_bg_color',
    array( 
      'default' => ''
    ));
  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize, 'pf_posts_title_bg_color',
    array(
      'label' => __('Title Background Color','cooks'),
      'section' => 'pf_page_section',
      'priority' => 16,
      'type' => 'color',
    )));  
  $wp_customize->add_setting( 'pf_posts_title_color',
    array( 
      'default' => '#ffffff'
    ));
  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize, 'pf_posts_title_color',
    array(
      'label' => __('Title Color','cooks'),
      'section' => 'pf_page_section',
      'priority' => 17,
      'type' => 'color',
    )));  
}
add_action('customize_register','portfolio_thumbnail_color');
/* Blog Page Section */

function blog_page_section( $wp_customize ){
	// Blog Page Categories
	$blog_cats = get_categories();
	$blog_categories = array();
	foreach ($blog_cats as $blog_cat) {
		$blog_categories[$blog_cat->cat_ID] = $blog_cat->name;
	}

	$wp_customize->add_section('blog_page_section',array(
			'title' => __('Blog Page Section','cooks'),
			'priority' => '7'
		));
	$wp_customize->add_setting('blog_page_sidebar', array(
			'default' => 'two_third'
		));
	$wp_customize->add_control('blog_page_sidebar',array(
		'label' => __('Page Sidebar Settings','cooks'),
		'type' => 'radio',
		'section' => 'blog_page_section',
		'choices' => array(
			'fullwidth' => __('No Sidebar','cooks'),
			'two_third' => __('Right','cooks'),
			'two_third_last' => __('Left','cooks')
			),
		'priority' => 1
	));
	$wp_customize->add_setting('blog_page_categories', array(
			'default' => ''
		));

	$wp_customize->add_control( new Kaya_Customize_Multiselect_Control( $wp_customize,'blog_page_categories',array(
		'label' => __('Select Category','cooks'),
		'type' => 'multi-select',
		'section' => 'blog_page_section',
		'choices' =>$blog_categories,
		'priority' => 2
	)));
	$wp_customize->add_setting('readmore_button_text', array(
			'default' => 'Read More'
		));
	$wp_customize->add_control('readmore_button_text',array(
		'label' => __('Readmore Button Text','cooks'),
		'type' => 'text',
		'section' => 'blog_page_section',
		'priority' => 3
	));
}
// Woo Commerce Page
/*-----------------------------------------------------------------------------------*/ 
function woocommerce_page_section( $wp_customize ){
  // Blog Page Categories
  $wp_customize->add_section('woocommerce_page_section',array(
      'title' => __('Woocommerce Page Section','cooks'),
      'priority' => '10'
    ));
  $wp_customize->add_setting('shop_page_sidebar', array(
      'default' => 'fullwidth'
    ));
  $wp_customize->add_control('shop_page_sidebar',array(
    'label' => __('Shop Page Sidebar','cooks'),
    'type' => 'radio',
    'section' => 'woocommerce_page_section',
    'choices' => array(
      'fullwidth' => __('No Sidebar','cooks'),
      'two_third' => __('Right','cooks'),
      'two_third_last' => __('Left','cooks')
      ),
    'priority' => 1
  ));
    $wp_customize->add_setting('product_tag_page_sidebar', array(
      'default' => 'fullwidth'
    ));
  $wp_customize->add_control('product_tag_page_sidebar',array(
    'label' => __('Product Categories / Tags  Page Sidebar','cooks'),
    'type' => 'radio',
    'section' => 'woocommerce_page_section',
    'choices' => array(
      'fullwidth' => __('No Sidebar','cooks'),
      'two_third' => __('Right','cooks'),
      'two_third_last' => __('Left','cooks')
      ),
    'priority' => 2
  ));
  $wp_customize->add_setting('shop_single_page_sidebar', array(
      'default' => 'two_third'
    ));
  $wp_customize->add_control('shop_single_page_sidebar',array(
    'label' => __('Shop Single Page Sidebar','cooks'),
    'type' => 'radio',
    'section' => 'woocommerce_page_section',
    'choices' => array(
      'fullwidth' => __('No Sidebar','cooks'),
      'two_third' => __('Right','cooks'),
      'two_third_last' => __('Left','cooks')
      ),
    'priority' => 3
  ));
  /* Buttons Colors */
    $wp_customize->add_setting( 'woo-buttons-note' );
    $wp_customize->add_control(
     new Kaya_Customize_Subtitle_control( $wp_customize, 'woo-buttons-note', array(
        'label'    => __( 'Primary Buttons Color Section', 'cooks' ),
      'section'  => 'woocommerce_page_section',
      'settings' => 'woo-buttons-note',
      'priority' => 4
    )));
$wp_customize->add_setting( 'woo-buttons-note_description' );
$wp_customize->add_control(
new Kaya_Customize_Description_Control( 
  $wp_customize, 'woo-buttons-note_description', array(
  'label'    => __( 'Note: Color applies for Add to cart, Update Cart , mini cart items and  Apply Coupon buttons', 'cooks' ),
  'section'  => 'woocommerce_page_section',
  'settings' => 'woo-buttons-note_description',
  'priority' => 4
)));
 $color = array();   
$colors[] = array(
  'slug'=>'primary_buttons_bg_color',
  'default' => '#434a54',
   'transport'   => 'refresh',
   'priority' => 5,
  'label' => __('Primary  Buttons BG Color', 'cooks')
);
$colors[] = array(
  'slug'=>'primary_buttons_text_color',
  'default' => '#ffffff',
   'transport'   => 'refresh',
  'label' => __('Primary  Buttons Text Color', 'cooks'),
  'priority' => 6
);
$colors[] = array(
  'slug'=>'primary_buttons_bg_hover_color',
  'default' => '#cc0069',
   'transport'   => 'refresh',
   'priority' => 7,
  'label' => __('Primary  Buttons BG Hover Color', 'cooks')
);
$colors[] = array(
  'slug'=>'primary_buttons_text_hover_color',
  'default' => '#ffffff',
   'transport'   => 'refresh',
   'priority' => 8,
  'label' => __('Primary  Buttons Text Hover Color', 'cooks')
);
// Secondary Buttons */
  $wp_customize->add_setting( 'woo-buttons-note-secondary' );
    $wp_customize->add_control(
     new Kaya_Customize_Subtitle_control( $wp_customize, 'woo-buttons-note-secondary', array(
        'label'    => __( 'Secondary Buttons Color Section', 'cooks' ),
      'section'  => 'woocommerce_page_section',
      'settings' => 'woo-buttons-note-secondary',
      'priority' => 9
    )));
$wp_customize->add_setting( 'woo-secondary-buttons-note_description' );
$wp_customize->add_control(
new Kaya_Customize_Description_Control( 
  $wp_customize, 'woo-secondary-buttons-note_description', array(
  'label'    => __( 'Note: Color applies for Tabs active color, tab hover color, quantity(plus, minus), view Cart, proceed to checkout and place order buttons', 'cooks' ),
  'section'  => 'woocommerce_page_section',
  'settings' => 'woo-secondary-buttons-note_description',
  'priority' => 10
)));
 $color = array();   
$colors[] = array(
  'slug'=>'secondary_buttons_bg_color',
  'default' => '#cc0069',
   'transport'   => 'refresh',
   'priority' => 11,
  'label' => __('Secondary Buttons BG Color', 'cooks')
);
$colors[] = array(
  'slug'=>'secondary_buttons_text_color',
  'default' => '#ffffff',
   'transport'   => 'refresh',
  'label' => __('Secondary Buttons Text Color', 'cooks'),
  'priority' => 11
);
$colors[] = array(
  'slug'=>'secondary_buttons_bg_hover_color',
  'default' => '#434a54',
   'transport'   => 'refresh',
   'priority' => 12,
  'label' => __('Secondary Buttons BG Hover Color', 'cooks')
);
$colors[] = array(
  'slug'=>'secondary_buttons_text_hover_color',
  'default' => '#ffffff',
   'transport'   => 'refresh',
   'priority' => 13,
  'label' => __('Secondary Buttons Text Hover Color', 'cooks')
);
// Price tag Hover Color 
  $colors[] = array(
  'slug'=>'woo_elments_colors',
  'default' => '#cc0069',
   'transport'   => 'refresh',
   'priority' => 14,
  'label' => __('Elements color', 'cooks')
);
    $wp_customize->add_setting( 'elements_color_note' );
    $wp_customize->add_control(
    new Kaya_Customize_Description_Control( 
      $wp_customize, 'elements_color_note', array(
      'label'    => __( 'Note: color applied for price, onsale tag, star-rating, .quantity .minus / plus hover and etc...', 'cooks' ),
      'section'  => 'woocommerce_page_section',
      'settings' => 'elements_color_note',
      'priority' => 15
    )));
   // Alert Boxes */
  $wp_customize->add_setting( 'woo-notification-msg' );
    $wp_customize->add_control(
     new Kaya_Customize_Subtitle_control( $wp_customize, 'woo-notification-msg', array(
        'label'    => __( 'Alert Boxes Section', 'cooks' ),
      'section'  => 'woocommerce_page_section',
      'settings' => 'woo-notification-msg',
      'priority' => 16
    )));

$colors[] = array(
  'slug'=>'success_msg_bg_color',
  'default' => '#dff0d8',
   'transport'   => 'refresh',
   'priority' => 17,
  'label' => __('Success Alert Box BG Color', 'cooks')
);
$colors[] = array(
  'slug'=>'success_msg_text_color',
  'default' => '#468847',
   'transport'   => 'refresh',
   'priority' => 18,
  'label' => __('Success Alert Box Text Color', 'cooks')
);

$colors[] = array(
  'slug'=>'notification_msg_bg_color',
  'default' => '#b8deff',
   'transport'   => 'refresh',
   'priority' => 19,
  'label' => __('Notification Alert Box BG Color', 'cooks')
);
$colors[] = array(
  'slug'=>'notification_msg_text_color',
  'default' => '#333',
   'transport'   => 'refresh',
   'priority' => 20,
  'label' => __('Notification Alert Box Text Color', 'cooks')
);

$colors[] = array(
  'slug'=>'warning_msg_bg_color',
  'default' => '#f2dede',
   'transport'   => 'refresh',
   'priority' => 21,
  'label' => __('Warning Alert Box BG Color', 'cooks')
); 
$colors[] = array(
  'slug'=>'warning_msg_text_color',
  'default' => '#a94442',
   'transport'   => 'refresh',
   'priority' => 22,
  'label' => __('Warning Alert Box Text Color', 'cooks')
);  
foreach( $colors as $color ) {
  // SETTINGS
  $wp_customize->add_setting(
    $color['slug'], array(
      'default' => $color['default'],
      'type' => 'option', 
      'capability' => 
      'edit_theme_options'
    )
  );
  // CONTROLS
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      $color['slug'], 
      array('label' => $color['label'], 
      'section' => 'woocommerce_page_section',
      'priority' => $color['priority'],
      'settings' => $color['slug'])
    )
  );
}
}
add_action('customize_register','woocommerce_page_section');
    // Footer  Settings

function footer_section( $wp_customize ) {

		$wp_customize->add_section(
	// ID
	'footer-section',
	// Arguments array
	array(
		'title' => __( 'Footer Section', 'cooks' ),
		'priority'       => 12,
		'capability' => 'edit_theme_options',
		//'description' => __( '', 'cooks' )
	)
);
/*
   $wp_customize->add_setting( 'main_footer_disable' );
	$wp_customize->add_control( 'main_footer_disable', array(
	      'label'    => __( 'Main Footer Settings', 'cooks' ),
	      'section'  => 'footer-section',
	      'settings' => 'main_footer_disable',
	      'type' => 'checkbox',
	      'priority' => 1
    ));
   $wp_customize->add_setting( 'main_footer_disable' );
	$wp_customize->add_control( 'main_footer_disable', array(
	      'label'    => __( 'Disable Main Footer', 'cooks' ),
	      'section'  => 'footer-section',
	      'settings' => 'main_footer_disable',
	      'type' => 'checkbox',
	      'priority' => 2
    ));

     $wp_customize->add_setting('main_footer_columns',
	array(
		'deafult' => '3',
		));
     $src = get_template_directory_uri() . '/images/footer_columns/';
$wp_customize->add_control(
new Kaya_Customize_Images_Radio_Control(
$wp_customize,'main_footer_columns',
	array(
		'label' => 'Display Columns',
		'section' => 'footer-section',
		'priority' => 3,
			'type' => 'img_radio', // Image radio replacement
			'choices' => array(
				'1' => array( 'label' => __( 'Col-1', 'cooks' ),'img_src' => $src . 'fc1.png' ),
				'2' => array( 'label' => __( 'Col-2', 'cooks' ),'img_src' => $src . 'fc2.png' ),
				'3' => array( 'label' => __( 'Col-1', 'cooks' ),'img_src' => $src . 'fc3.png' ),
				'4' => array( 'label' => __( 'Col-2', 'cooks' ),'img_src' => $src . 'fc4.png' ),
				'5' => array( 'label' => __( 'Col-1', 'cooks' ),'img_src' => $src . 'fc5.png' ),
				'twothird' => array( 'label' => __( 'Col-2', 'cooks' ),'img_src' => $src . 'two_third_one_third.png' ),
				'onethird' => array( 'label' => __( 'Col-1', 'cooks' ),'img_src' => $src . 'one_third_two_third.png' ),
				'threefourth' => array( 'label' => __( 'Col-2', 'cooks' ),'img_src' => $src . 'three_fourth_one_fourth.png' ),
				'onefourth' => array( 'label' => __( 'Col-1', 'cooks' ),'img_src' => $src . 'one_fourth_three_fourth.png' ),
				'halffourth' => array( 'label' => __( 'Col-2', 'cooks' ),'img_src' => $src . 'two_fourth_fourth_fourth.png' ),
				'twofourth' => array( 'label' => __( 'Col-1', 'cooks' ),'img_src' => $src . 'fourth_fourth_two_fourth.png' ),
				'fifth_fifth' => array( 'label' => __( 'Col-2', 'cooks' ),'img_src' => $src . 'fifth_fifth_three_fifth.png' ),
				'three_fifth' => array( 'label' => __( 'Col-1', 'cooks' ),'img_src' => $src . 'three_fifth_fifth_fifth.png' ),
				'fifth_fifth_fifth' => array( 'label' => __( 'Col-2', 'cooks' ),'img_src' => $src . 'fifth_fifth_fifth_two_fifth.png' ),
				'two_fifth' => array( 'label' => __( 'Col-1', 'cooks' ),'img_src' => $src . 'two_fifth_fifth_fifth_fifth.png' ),
			),	
		)));
    */ 
	$url=get_template_directory_uri().'/images/';
     $wp_customize->add_setting('footerbg[footer]',array(
    	'default' =>  $url.'top-opc.png',
    	'capability' => 'edit_theme_options',
    	'type' => 'option'
    	));
    $wp_customize->add_control(
    	new WP_Customize_Image_Control($wp_customize,'footer',array(
    		'label' =>  __('Upload Footer Background Image','cooks'),
    		'section' => 'footer-section',
    		'settings' => 'footerbg[footer]',
    		'priority' => 4
    	 	)));
    $wp_customize->add_setting('footerbg_repeat',
	array(
		'deafult' => 'no-repeat',
		));
$wp_customize->add_control('footerbg_repeat',
	array(
		'label' => __('Background Repeat','cooks'),
		'capability' => 'edit_theme_options', 
		'section' => 'footer-section',
		'priority' => 5,
		'type' => 'radio',
		'choices' => array(
			'no-repeat' => __('No Repeat','cooks'),
			'repeat' => __('Repeat','cooks')
			)
		));

   // Footer BG Color
    $colors[] = array(
	'slug'=>'footer_bg_color',
	'default' => '',
	'label' => __('Footer Background Color', 'cooks'),
	'priority' => 6
);
    $colors[] = array(
	'slug'=>'footer_title_color',
	'default' => '#ffffff',
	'label' => __('Titles Color', 'cooks'),
	'priority' => 7
);
    $colors[] = array(
	'slug'=>'footer_text_color',
	'default' => '#ffffff',
	'label' => __('Content Color', 'cooks'),
	'priority' =>8
);
    $colors[] = array(
	'slug'=>'footer_link_color',
	'default' => '#ffffff',
	'label' => __('Hyper Link Color', 'cooks'),
	'priority' => 9
);
    $colors[] = array(
	'slug'=>'footer_link_hover_color',
	'default' => '#eee',
	'label' => __('Hyper Link Hover Color', 'cooks'),
	'priority' => 10
);

     $wp_customize->add_setting( 'most_footer_bottom_sub_title' );
	$wp_customize->add_control(
	    new Kaya_Customize_Subtitle_control( $wp_customize, 'most_footer_bottom_sub_title', array(
	      'label'    => __( 'Footer Settings', 'cooks' ),
	      'section'  => 'footer-section',
	      'settings' => 'most_footer_bottom_sub_title',
	      'priority' => 11
    )));
   $wp_customize->add_setting( 'most_footer_disable' );
	$wp_customize->add_control( 'most_footer_disable', array(
	      'label'    => __( 'Disable Footer', 'cooks' ),
	      'section'  => 'footer-section',
	      'settings' => 'most_footer_disable',
	      'type' => 'checkbox',
	      'priority' => 12
    ));
  $wp_customize->add_setting( 'footer_col1_section' ,
  	array(
  		'default' => '<span>Call Us : 085 - 2564 - 453</span> <span> Email Us : cooks@gmail.com</span>',
  		) ); 
  $wp_customize->add_control(
    new Kaya_Customize_Textarea_Control( $wp_customize, 'footer_col1_section', array(
      'label'    => __( 'Contact Information', 'cooks' ),
      'section'  => 'footer-section',
      'settings' => 'footer_col1_section',
      'priority' => 13,
      'type' => 'text-area',
      ))  );
  $wp_customize->add_setting( 'footer_col2_section',
  	array(
  		'default' => 'Copy rights &copy; kayapati.com'
  		)
  	);
  $wp_customize->add_control(
    new Kaya_Customize_Textarea_Control( $wp_customize, 'footer_col2_section', array(
      'label'    => __( 'Copy Rights', 'cooks' ),
      'section'  => 'footer-section',
      'settings' => 'footer_col2_section',
      'priority' => 14,
      'type' => 'text-area',
      ))  );
    $wp_customize->add_setting( 'footer_col3_section' ,
  	array(
  		'default' => '<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-rss"></i></a>
					<a href="#"><i class="fa fa-youtube"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>',
  		) );
  $wp_customize->add_control(
    new Kaya_Customize_Textarea_Control( $wp_customize, 'footer_col3_section', array(
      'label'    => __( 'Social Icons', 'cooks' ),
      'section'  => 'footer-section',
      'settings' => 'footer_col3_section',
      'priority' => 15,
      'type' => 'text-area',
      ))  );
  /*
    $wp_customize->add_setting( 'most_footer_right_section' );
  $wp_customize->add_control(
    new Kaya_Customize_Textarea_Control( $wp_customize, 'most_footer_right_section', array(
      'label'    => __( 'Right Section', 'cooks' ),
      'section'  => 'footer-section',
      'settings' => 'most_footer_right_section',
      'priority' => 14,
      'type' => 'text-area',
      ))  );
*/
    foreach( $colors as $color ) {
	// SETTINGS
	$wp_customize->add_setting(
		$color['slug'], array(
			'default' => $color['default'],
			'type' => 'option',
			'capability' =>
			'edit_theme_options'
		)
	);
	// CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'],
			array('label' => $color['label'],
			'section' => 'footer-section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])

		)
	);
}

}
add_action( 'customize_register', 'footer_section' );
//end

// Typography
function typography( $wp_customize ){

	$wp_customize->add_section(
	// ID
	'typography_section',
	// Arguments array
	array(
		'title' => __( 'Typography', 'cooks' ),
		'priority'       => 13,
		'capability' => 'edit_theme_options',
		'description' => __( 'Select Google Fonts', 'cooks' )."<a href='http://www.google.com/fonts' target='_blank' > here </a>"
	)
);	

	// Body Font
	$wp_customize->add_setting(
    'google_body_font',
    array(
        'default' => 'Open Sans',
    )
);
	
	$wp_customize->add_control(
    'google_body_font',
    array(
        'label' => __('Enter Google font for Body','cooks'),
        'section' => 'typography_section',
        'type' => 'text',
		'priority' => 1,		
    )
);
	// Title Font
	$wp_customize->add_setting(
    'google_heading_font',
    array(
        'default' => 'Viga',
    )
);
	$wp_customize->add_control(
    'google_heading_font',
    array(
        'label' => __('Enter Google font for Headings','cooks'),
        'section' => 'typography_section',
        'type' => 'text',
		    'priority' => 2,
    )
);
	// Menu  Font
	$wp_customize->add_setting(
    'google_menu_font',
    array(
        'default' => 'Viga',
    )
);
	$wp_customize->add_control(
    'google_menu_font',
    array(
        'label' => __('Enter Google font for Top Menu','cooks'),
        'section' => 'typography_section',
        'type' => 'text',
		'priority' => 2,
    )
);
$Body_fontsizes=array( '10' => '10','11' => '11','12' => '12','13' => '13','14' => '14','15' => '15','16' => '16','17' => '17','18' => '18','19' => '19','20' => '20','21' => '21', '22' => '22','23' => '23','24' => '24','25' => '25');
// Body Font Size
$wp_customize->add_setting(
    'body_font_size',
    array(
        'default' => '15',
    )
);

$wp_customize->add_control(
    'body_font_size',
    array(
        'type' => 'select',
        'label' => __('Body Font Size','cooks'),
        'section' => 'typography_section',
        'choices' => $Body_fontsizes,
		'priority' => 3,
    )
);
// Menu Font Size
$wp_customize->add_setting(
    'menu_font_size',
    array(
        'default' => '15',
    )
);
$wp_customize->add_control(
    'menu_font_size',
    array(
        'type' => 'select',
        'label' => __('Menu  Font Size','cooks'),
        'section' => 'typography_section',
        'choices' => $Body_fontsizes,
		'priority' => 4,
    )
);
// Title Font Sizes
// H1
$fontsizes=array( '10' => '10','11' => '11','12' => '12','13' => '13','14' => '14','15' => '15','16' => '16','17' => '17','18' => '18','19' => '19','20' => '20','21' => '21', '22' => '22','23' => '23','24' => '24','25' => '25','26' => '26','27' => '27','28' => '28','29' => '29','30' => '30','31' => '31','32' => '32','33' => '33','34' => '34','35' => '35','36' => '36','37' => '37','38' => '38','39' => '39','40' => '40');
$wp_customize->add_setting(
    'h1_title_fontsize',
    array(
        'default' => '30',
    )
);
$wp_customize->add_control(
    'h1_title_fontsize',
    array(
        'type' => 'select',
        'label' => __('Font size for heading - H1','cooks'),
        'section' => 'typography_section',
        'choices' => $fontsizes,
		'priority' => 4,
		
    )
);
// H2
$wp_customize->add_setting(
    'h2_title_fontsize',
    array(
        'default' => '22',
    )
);
$wp_customize->add_control(
    'h2_title_fontsize',
    array(
        'type' => 'select',
        'label' => __('Font size for heading - H2','cooks'),
        'section' => 'typography_section',
        'choices' => $fontsizes,
		'priority' => 5,
    )
);
// H3
$wp_customize->add_setting(
    'h3_title_fontsize',
    array(
        'default' => '19',
    )
);
$wp_customize->add_control(
    'h3_title_fontsize',
    array(
        'type' => 'select',
        'label' => __('Font size for heading - H3','cooks'),
        'section' => 'typography_section',
        'choices' => $fontsizes,
		'priority' => 6,
    )
);
// H4
$wp_customize->add_setting(
    'h4_title_fontsize',
    array(
        'default' => '18',
    )
);
$wp_customize->add_control(
    'h4_title_fontsize',
    array(
        'type' => 'select',
        'label' => __('Font size for heading - H4','cooks'),
        'section' => 'typography_section',
        'choices' => $fontsizes,
		'priority' => 7,
    )
);
// H5
$wp_customize->add_setting(
    'h5_title_fontsize',
    array(
        'default' => '16',
    )
);
$wp_customize->add_control(
    'h5_title_fontsize',
    array(
        'type' => 'select',
        'label' => __('Font size for heading - H5','cooks'),
        'section' => 'typography_section',
        'choices' => $fontsizes,
		'priority' => 8,
    )
);
// H6
$wp_customize->add_setting(
    'h6_title_fontsize',
    array(
        'default' => '14',
    )
);
$wp_customize->add_control(
    'h6_title_fontsize',
    array(
        'type' => 'select',
        'label' => __('Font size for heading - H6','cooks'),
        'section' => 'typography_section',
        'choices' => $fontsizes,
		'priority' => 9,
    )
);
}
add_action( 'customize_register', 'typography' );
// Global Section
function global_section( $wp_customize ) {
		$wp_customize->add_section(
	// ID
	'global-section',
	// Arguments array
	array(
		'title' => __( 'Global Settings', 'cooks' ),
		'priority'       => 14,
		'capability' => 'edit_theme_options',
		//'description' => __( '', 'cooks' )
	));
	$wp_customize->add_setting('favicon[favi_img]',array(
    	'default' => '',
    	 'capability'   => 'edit_theme_options',
        'type'       => 'option',
    	));
    $wp_customize->add_control(
    	new WP_Customize_Image_Control($wp_customize,'favicon',array(
    		'label' => __('Upload Favicon Image','cooks'),
    		//'default' =>  
    		'section' => 'global-section',
    		'settings' => 'favicon[favi_img]',
    		'priority' => 1
    	 	)));		
  $wp_customize->add_setting( 'google_tracking_code' );
  $wp_customize->add_control(
    new Kaya_Customize_Textarea_Control( $wp_customize, 'google_tracking_code', array(
      'label'    => __( 'Google Analytics Code', 'cooks' ),
      'section'  => 'global-section',
      'settings' => 'google_tracking_code',
      'priority' => 2,
      'type' => 'text-area',
      ))  );
	
  $wp_customize->add_setting( 'kaya_custom_css' );
  $wp_customize->add_control(
    new Kaya_Customize_Textarea_Control( $wp_customize, 'kaya_custom_css', array(
      'label'    => __( 'Custom CSS', 'cooks' ),
      'section'  => 'global-section',
      'settings' => 'kaya_custom_css',
      'priority' => 3,
      'type' => 'text-area',
      ))  );

  $wp_customize->add_setting( 'kaya_custom_jquery' );
  $wp_customize->add_control(
    new Kaya_Customize_Textarea_Control( $wp_customize, 'kaya_custom_jquery', array(
      'label'    => __( 'Custom JQUERY', 'cooks' ),
      'section'  => 'global-section',
      'settings' => 'kaya_custom_jquery',
      'priority' => 3,
      'type' => 'text-area',
      ))  );


	}
add_action( 'customize_register', 'global_section' );
	?>