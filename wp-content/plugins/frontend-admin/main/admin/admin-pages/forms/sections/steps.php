<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$multi = array(
    'field' => 'multi',
    'operator' => '==',
    'value' => 1,
);
$tabs = array(
    'field' => 'steps_display',
    'operator' => '==contains',
    'value' => 'tabs',
);
$counter = array(
    'field' => 'steps_display',
    'operator' => '==contains',
    'value' => 'counter',
);
$fields = array(	   
    array(
        'key' => 'multi',
        'label' => __( 'Enable Multi Step', FEA_NS ),
        'type' => 'true_false',
        'instructions' => '',
        'required' => 0,
        'message' => '',
        'ui' => 1,
        'ui_on_text' => '',
        'ui_off_text' => '',
    ), 
    array(
        'key' => 'steps_display',
        'label' => __( 'Steps Display', FEA_NS ),
        'type' => 'select',
        'instructions' => '',
        'required' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'multiple' => 1,
        'ui' => 1,
        'allow_null' => 1,
        'choices' => [
            'tabs' => __( 'Tabs', FEA_NS ),
            'counter' => __( 'Counter', FEA_NS ),
        ],
       'layout' => 'horizontal',
       'conditional_logic' => array(
            array(
               $multi
            ),
        ),
    ),
    array(
        'key' => 'steps_tabs_display',
        'label' => __( 'Display Tabs On...', FEA_NS ),
        'type' => 'checkbox',
        'instructions' => '',
        'required' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'choices' => [
            'desktop' => __( 'Desktop', FEA_NS ),
            'tablet' => __( 'Tablet', FEA_NS ),
            'phone' => __( 'Mobile', FEA_NS ),
        ],
       'layout' => 'horizontal',
       'conditional_logic' => array(
            array(
            $multi,
            $tabs
            ),
        ),
    ),
    array(
        'key' => 'steps_counter_display',
        'label' => __( 'Display Counter On...', FEA_NS ),
        'type' => 'checkbox',
        'instructions' => '',
        'required' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'choices' => [
            'desktop' => __( 'Desktop', FEA_NS ),
            'tablet' => __( 'Tablet', FEA_NS ),
            'phone' => __( 'Mobile', FEA_NS ),
        ],
       'layout' => 'horizontal',
       'conditional_logic' => array(
            array(
            $multi,
            $counter
            ),
        ),
    ),
    array(
        'key' => 'tabs_align',
        'label' => __( 'Tabs Align', FEA_NS ),
        'type' => 'radio',
        'instructions' => '',
        'required' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'choices' => [
            'horizontal' => __( 'Top', 'elementor' ),
			'vertical' => __( 'Side', 'elementor' ),
        ],
        'layout' => 'horizontal',
        'conditional_logic' => array(
            array(
               $multi,
               $tabs,
            ),
        ),
    ),
    array(
        'key' => 'counter_prefix',
        'label' => __( 'Counter Prefix', FEA_NS ),
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'placeholder' => '',
        'conditional_logic' => array(
            array(
               $multi,
               $counter,
            ),
        ),
    ),
    array(
        'key' => 'counter_suffix',
        'label' => __( 'Counter Suffix', FEA_NS ),
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'placeholder' => '',
        'conditional_logic' => array(
            array(
               $multi,
               $counter,
            ),
        ),
    ),
    array(
        'key' => 'step_nunmber',
        'label' => __( 'Step Number In Tabs', FEA_NS ),
        'type' => 'true_false',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => array(
            array(
                $multi,
                $tabs,
            ),
        ),
        'message' => '',
        'ui' => 1,
        'ui_on_text' => '',
        'ui_off_text' => '',
    ),
    array(
        'key' => 'tab_links',
        'label' => __( 'Link to Step in Tabs', FEA_NS ),
        'type' => 'true_false',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => array(
            array(
                $multi,
                $tabs,
            ),
        ),
        'message' => '',
        'ui' => 1,
        'ui_on_text' => '',
        'ui_off_text' => '',
    ),
);

return $fields;