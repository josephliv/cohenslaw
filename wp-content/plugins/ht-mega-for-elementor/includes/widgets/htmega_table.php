<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class HTMega_Elementor_Widget_Data_Table extends Widget_Base {

    public function get_name() {
        return 'htmega-datatable-addons';
    }
    
    public function get_title() {
        return __( 'Data Table', 'htmega-addons' );
    }

    public function get_icon() {
        return 'htmega-icon eicon-table';
    }

    public function get_categories() {
        return [ 'htmega-addons' ];
    }

    public function get_script_depends() {
        return [ 'datatables' ];
    }

    public function get_style_depends() {
        return [ 'datatables', 'htmega-widgets', ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'datatable_layout',
            [
                'label' => __( 'Table Layout', 'htmega-addons' ),
            ]
        );

            $this->add_control(
                'datatable_style',
                [
                    'label' => __( 'Layout', 'htmega-addons' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1'   => __( 'Layout One', 'htmega-addons' ),
                        '2'   => __( 'Layout Two', 'htmega-addons' ),
                        '3'   => __( 'Layout Three', 'htmega-addons' ),
                    ],
                ]
            );

            $this->add_control(
                'show_datatable_sorting',
                [
                    'label' => __( 'Show Sorting Options', 'htmega-addons' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'htmega-addons' ),
                    'label_off' => __( 'Hide', 'htmega-addons' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

        $this->end_controls_section();

        // Sorting Options
        $this->start_controls_section(
            'datatable_sorting_options',
            [
                'label' => __( 'Sorting Options', 'htmega-addons' ),
                'condition'=>[
                    'show_datatable_sorting'=>'yes',
                ]
            ]
        );

            $this->add_control(
                'show_datatable_paging',
                [
                    'label' => __( 'Pagination', 'htmega-addons' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'htmega-addons' ),
                    'label_off' => __( 'Hide', 'htmega-addons' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'show_datatable_searching',
                [
                    'label' => __( 'Searching', 'htmega-addons' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'htmega-addons' ),
                    'label_off' => __( 'Hide', 'htmega-addons' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'show_datatable_ordering',
                [
                    'label' => __( 'Ordering', 'htmega-addons' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'htmega-addons' ),
                    'label_off' => __( 'Hide', 'htmega-addons' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'show_datatable_info',
                [
                    'label' => __( 'Footer Info', 'htmega-addons' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'htmega-addons' ),
                    'label_off' => __( 'Hide', 'htmega-addons' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

        $this->end_controls_section();

        // Table Header
        $this->start_controls_section(
            'datatable_header',
            [
                'label' => __( 'Table Header', 'htmega-addons' ),
            ]
        );

            $repeater = new Repeater();

            $repeater->add_control(
                'column_name',
                [
                    'label'   => __( 'Column Name', 'htmega-addons' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( 'No', 'htmega-addons' ),
                ]
            );

           $repeater->add_control(
                'column_heading',
                [
                    'label' => esc_html__( 'Column styles', 'htmega-addons' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

           $repeater->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'column_heading_background_color',
                    'label' => __( 'Background', 'htmega-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .htmega-table-style {{CURRENT_ITEM}}',
                ]
            );

           $repeater->add_group_control(
                Group_Control_Border::get_type(),
                    [
                    'name' => 'column_background_border',
                    'label' => esc_html__( 'Border', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-table-style {{CURRENT_ITEM}}',
                ]
            );

           $repeater->add_responsive_control(
                'column_background_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selector' => '{{WRAPPER}} .htmega-table-style {{CURRENT_ITEM}}',
                ]
            );

           $repeater->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'column_background_border_shadow',
                    'label' => __( 'Box Shadow', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-table-style {{CURRENT_ITEM}}',
                ]
            );

            $this->add_control(
                'header_column_list',
                [
                    'type'    => Controls_Manager::REPEATER,
                    'fields'  => $repeater->get_controls(),
                    'default' => [
                        [
                            'column_name' => __( 'No', 'htmega-addons' ),
                        ],

                        [
                            'column_name' => __( 'Name', 'htmega-addons' ),
                        ],

                        [
                            'column_name' => __( 'Designation', 'htmega-addons' ),
                        ],

                        [
                            'column_name' => __( 'Email', 'htmega-addons' ),
                        ]

                    ],
                    'title_field' => '{{{ column_name }}}',
                ]
            );
            
        $this->end_controls_section();

        // Table Content
        $this->start_controls_section(
            'datatable_content',
            [
                'label' => __( 'Table Content', 'htmega-addons' ),
            ]
        );

            $repeater_one = new Repeater();

            $repeater_one->add_control(
                'field_type',
                [
                    'label' => __( 'Fild Type', 'htmega-addons' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'row',
                    'options' => [
                        'row'   => __( 'Row', 'htmega-addons' ),
                        'col'   => __( 'Column', 'htmega-addons' ),
                    ],
                ]
            );

            $repeater_one->add_control(
                'cell_data_type',
                [
                    'label' => __( 'Data Type', 'htmega-addons' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'text',
                    'options' => [
                        'text'   => __( 'Text', 'htmega-addons' ),
                        'icon'   => __( 'Icon', 'htmega-addons' ),
                        'image'   => __( 'Image', 'htmega-addons' ),
                    ],
                    'condition'=>[
                        'field_type'=>'col',
                    ]
                ]
            );

            $repeater_one->add_control(
                'cell_text',
                [
                    'label'   => __( 'Cell Content', 'htmega-addons' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( 'Louis Hudson', 'htmega-addons' ),
                    'condition'=>[
                        'cell_data_type'=>'text',
                        'field_type'=>'col',
                    ]
                ]
            );

            $repeater_one->add_control(
                'cell_icon',
                [
                    'label'   => esc_html__( 'Cell Icon', 'htmega-addons' ),
                    'type'    => Controls_Manager::ICONS,
                    'condition'=>[
                        'cell_data_type'=>'icon',
                        'field_type'=>'col',
                    ]
                ]
            );

            $repeater_one->add_responsive_control(
                'cell_icon_size',
                [
                    'label' => esc_html__( 'Icon SIze', 'htmega-addons' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 20,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-table-style {{CURRENT_ITEM}} svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}',
                        '{{WRAPPER}} .htmega-table-style {{CURRENT_ITEM}}' => 'font-size: {{SIZE}}{{UNIT}};',

                    ],
                    'condition'=>[
                        'cell_data_type'=>'icon',
                        'field_type'=>'col',
                    ]
                ]
            );

            $repeater_one->add_control(
                'cell_icon_color',
                [
                    'label'     => __( 'Color', 'htmega-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .htmega-table-style {{CURRENT_ITEM}} i' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .htmega-table-style {{CURRENT_ITEM}} svg path' => 'fill: {{VALUE}};',
                    ],
                    'condition'=>[
                        'cell_data_type'=>'icon',
                        'field_type'=>'col',
                    ]
                ]
            );

            $repeater_one->add_control(
                'cell_image',
                [
                    'label' => esc_html__( 'Cell Image', 'htmega-addons' ),
                    'type' => Controls_Manager::MEDIA,
                    'condition'=>[
                        'cell_data_type'=>'image',
                        'field_type'=>'col',
                    ]
                ]
            );

            $repeater_one->add_responsive_control(
                'cell_image_width',
                [
                    'label' => esc_html__( 'Image Width', 'htmega-addons' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-table-style {{CURRENT_ITEM}} img' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                    'condition'=>[
                        'cell_data_type'=>'image',
                        'field_type'=>'col',
                    ]
                ]
            );

            $repeater_one->add_responsive_control(
                'cell_image_height',
                [
                    'label' => esc_html__( 'Image Height', 'htmega-addons' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-table-style {{CURRENT_ITEM}} img' => 'height: {{SIZE}}{{UNIT}}',
                    ],
                    'condition'=>[
                        'cell_data_type'=>'image',
                        'field_type'=>'col',
                    ]
                ]
            );


            $repeater_one->add_control(
                'row_colspan',
                [
                    'label' => __( 'Colspan', 'htmega-addons' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'step' => 1,
                    'default' => 1,
                    'condition'=>[
                        'field_type'=>'col',
                    ]
                ]
            );

            $repeater_one->add_control(
                'cell_heading',
                [
                    'label' => esc_html__( 'Cell Styles', 'htmega-addons' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                    'condition'=>[
                        'field_type'=>'col',
                    ]
                ]
            );

            $repeater_one->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'cell_background_color',
                    'label' => __( 'Background', 'htmega-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .htmega-table-style {{CURRENT_ITEM}}',
                    'condition'=>[
                        'field_type'=>'col',
                    ]
                ]
            );

            $repeater_one->add_group_control(
                Group_Control_Border::get_type(),
                    [
                    'name' => 'cell_background_border',
                    'label' => esc_html__( 'Border', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-table-style {{CURRENT_ITEM}}',
                    'condition'=>[
                        'field_type'=>'col',
                    ]
                ]
            );

            $this->add_control(
                'content_list',
                [
                    'type'    => Controls_Manager::REPEATER,
                    'fields'  => $repeater_one->get_controls(),
                    'default' => [
                        [
                            'field_type' => __( 'row', 'htmega-addons' ),
                        ],

                        [
                            'field_type' => __( 'col', 'htmega-addons' ),
                            'cell_text' => __( '1', 'htmega-addons' ),
                            'row_colspan' => __( '1', 'htmega-addons' ),
                        ],

                        [
                            'field_type' => __( 'col', 'htmega-addons' ),
                            'cell_text' => __( 'Louis Hudson', 'htmega-addons' ),
                            'row_colspan' => __( '1', 'htmega-addons' ),
                        ],

                        [
                            'field_type' => __( 'col', 'htmega-addons' ),
                            'cell_text' => __( 'Developer', 'htmega-addons' ),
                            'row_colspan' => __( '1', 'htmega-addons' ),
                        ],


                        [
                            'field_type' => __( 'col', 'htmega-addons' ),
                            'cell_text' => __( 'jondoy@gmail.com', 'htmega-addons' ),
                            'row_colspan' => __( '1', 'htmega-addons' ),
                        ]

                    ],
                    'title_field' => '{{{field_type}}}',
                ]
            );
            
        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'htmega_table_style_section',
            [
                'label' => __( 'Table', 'htmega-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'datatable_bg_color',
                    'label' => __( 'Background', 'htmega-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .htmega-table-style .dataTables_wrapper',
                ]
            );

            
            $this->add_responsive_control(
                'datatable_padding',
                [
                    'label' => esc_html__( 'Padding', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                            '{{WRAPPER}} .htmega-table-style' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'datatable_margin',
                [
                    'label' => esc_html__( 'Margin', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                            '{{WRAPPER}} .htmega-table-style' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                    [
                        'name' => 'datatable_border',
                        'label' => esc_html__( 'Border', 'htmega-addons' ),
                        'selector' => '{{WRAPPER}} .htmega-table-style',
                    ]
            );

            $this->add_responsive_control(
                'datatable_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .htmega-table-style' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'datatable_border_shadow',
                    'label' => __( 'Box Shadow', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-table-style',
                ]
            );
            
        $this->end_controls_section();

        // Table Header Style tab section
        $this->start_controls_section(
            'htmega_table_header_style_section',
            [
                'label' => __( 'Table Header', 'htmega-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'datatable_header_text_color',
                [
                    'label' => esc_html__( 'Text Color', 'htmega-addons' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .htmega-table-style thead tr th' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'datatable_header_bg_color',
                    'label' => __( 'Background', 'htmega-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .htmega-table-style thead tr th',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'datatable_header_typography',
                    'label' => __( 'Typography', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-table-style thead tr th',
                ]
            );

            $this->add_responsive_control(
                'datatable_header_padding',
                [
                    'label' => esc_html__( 'Table Header Padding', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                            '{{WRAPPER}} .htmega-table-style thead tr th' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                    [
                        'name' => 'datatable_header_border',
                        'label' => esc_html__( 'Border', 'htmega-addons' ),
                        'selector' => '{{WRAPPER}} .htmega-table-style thead tr th',
                    ]
            );

            $this->add_responsive_control(
                'datatable_header_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .htmega-table-style thead tr th' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'datatable_header_align',
                [
                    'label' => __( 'Alignment', 'htmega-addons' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'htmega-addons' ),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'htmega-addons' ),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'htmega-addons' ),
                            'icon' => 'eicon-text-align-right',
                        ],
                        'justify' => [
                            'title' => __( 'Justified', 'htmega-addons' ),
                            'icon' => 'eicon-text-align-justify',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-table-style thead tr th' => 'text-align: {{VALUE}};',
                    ],
                    'default' => '',
                    'separator' =>'before',
                ]
            );

        $this->end_controls_section();

        // Table Body Style tab section
        $this->start_controls_section(
            'htmega_table_body_style_section',
            [
                'label' => __( 'Table Body', 'htmega-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'datatable_body_bg_color',
                [
                    'label' => esc_html__( 'Background Color ( Event )', 'htmega-addons' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .htmega-table-style tbody tr.even' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'datatable_body_odd_bg_color',
                [
                    'label' => esc_html__( 'Background Color ( Odd )', 'htmega-addons' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .htmega-table-style tbody tr.odd' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'datatable_body_text_color',
                [
                    'label' => esc_html__( 'Text Color', 'htmega-addons' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .htmega-table-style tbody tr td' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'datatable_body_typography',
                    'label' => __( 'Typography', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-table-style tbody tr td',
                ]
            );

            $this->add_responsive_control(
                'datatable_body_padding',
                [
                    'label' => esc_html__( 'Table Cell Padding', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                            '{{WRAPPER}} .htmega-table-style tbody tr td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                    [
                        'name' => 'datatable_body_border',
                        'label' => esc_html__( 'Border', 'htmega-addons' ),
                        'selector' => '{{WRAPPER}} .htmega-table-style tbody tr td',
                    ]
            );

            $this->add_responsive_control(
                'datatable_body_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .htmega-table-style tbody tr td' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'datatable_body_align',
                [
                    'label' => __( 'Alignment', 'htmega-addons' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'htmega-addons' ),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'htmega-addons' ),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'htmega-addons' ),
                            'icon' => 'eicon-text-align-right',
                        ],
                        'justify' => [
                            'title' => __( 'Justified', 'htmega-addons' ),
                            'icon' => 'eicon-text-align-justify',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-table-style tbody tr td' => 'text-align: {{VALUE}};',
                    ],
                    'default' => '',
                    'separator' =>'before',
                ]
            );

        $this->end_controls_section();

         // Table Header Style tab section
         $this->start_controls_section(
            'htmega_table_sorting_style_section',
            [
                'label' => __( 'Sorting Style', 'htmega-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'show_datatable_sorting'=>'yes',
                ]
            ]
        );
            
            $this->add_control(
                'htmega_table_sorting_pagination_header',
                [
                    'label' => esc_html__( 'Pagination Header', 'htmega-addons' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                    'condition'=>[
                        'show_datatable_paging'=>'yes',
                    ]
                ]
            );

            $this->add_control(
                'datatable_sorting_text_color_header',
                [
                    'label' => esc_html__( 'Text Color', 'htmega-addons' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .htmega-table-style .dataTables_length label' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .htmega-table-style .dataTables_filter label' => 'color: {{VALUE}};',
                    ],
                    'condition'=>[
                        'show_datatable_paging'=>'yes',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'datatable_sorting_typography_header',
                    'label' => __( 'Typography', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-table-style .dataTables_length label',
                    'condition'=>[
                        'show_datatable_paging'=>'yes',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                    [
                    'name' => 'datatable_sorting_border_header',
                    'label' => esc_html__( 'Border', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-table-style .dataTables_wrapper .dataTables_length, {{WRAPPER}} .htmega-table-style .dataTables_wrapper .dataTables_filter input, {{WRAPPER}} .htmega-table-style .dataTables_wrapper .dataTables_paginate',
                    'condition'=>[
                        'show_datatable_paging'=>'yes',
                    ]
                ]
            );

            $this->add_control(
                'htmega_table_sorting_length_pagination_header',
                [
                    'label' => esc_html__( 'Pagination Header length', 'htmega-addons' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                    'condition'=>[
                        'show_datatable_paging'=>'yes',
                    ]
                ]
            );

            $this->add_control(
                'datatable_sorting_length_text_color_header',
                [
                    'label' => esc_html__( 'Text Color', 'htmega-addons' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .htmega-table-style .dataTables_length label select' => 'color: {{VALUE}};',
                    ],
                    'condition'=>[
                        'show_datatable_paging'=>'yes',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'datatable_sorting_length_typography_background_color_header',
                    'label' => __( 'Background', 'htmega-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .htmega-table-style .dataTables_length label select',
                    'condition'=>[
                        'show_datatable_paging'=>'yes',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                    [
                    'name' => 'datatable_sorting_length_border_header',
                    'label' => esc_html__( 'Border', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-table-style .dataTables_length label select',
                    'condition'=>[
                        'show_datatable_paging'=>'yes',
                    ]
                ]
            );

            $this->add_control(
                'htmega_table_sorting_pagination',
                [
                    'label' => esc_html__( 'Pagination Style', 'htmega-addons' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                    'condition'=>[
                        'show_datatable_paging'=>'yes',
                    ]
                ]
            );

            $this->add_control(
                'datatable_pagination_text_color',
                [
                    'label' => esc_html__( 'Text Color', 'htmega-addons' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .htmega-table-style .dataTables_paginate a.paginate_button' => 'color: {{VALUE}} !important;',
                    ],
                    'condition'=>[
                        'show_datatable_paging'=>'yes',
                    ]
                ]
            );

            $this->add_control(
                'datatable_pagination_text_active_color',
                [
                    'label' => esc_html__( 'Text Active Color', 'htmega-addons' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .htmega-table-style .dataTables_paginate span a.paginate_button' => 'color: {{VALUE}} !important;',
                    ],
                    'condition'=>[
                        'show_datatable_paging'=>'yes',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'datatable_pagination_typography',
                    'label' => __( 'Typography', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-table-style .dataTables_paginate a.paginate_button',
                    'condition'=>[
                        'show_datatable_paging'=>'yes',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'datatable_pagination_background_color',
                    'label' => __( 'Background', 'htmega-addons' ),
                    'types' => [ 'gradient' ],
                    'selector' => '{{WRAPPER}} .htmega-table-style .dataTables_paginate span a.paginate_button',
                    'condition'=>[
                        'show_datatable_paging'=>'yes',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                    [
                    'name' => 'datatable_pagination_border_header',
                    'label' => esc_html__( 'Border', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-table-style .dataTables_paginate span a.paginate_button',
                    'condition'=>[
                        'show_datatable_paging'=>'yes',
                    ]
                ]
            );

            $this->add_control(
                'htmega_table_sorting_pagination_footer',
                [
                    'label' => esc_html__( 'Pagination Footer', 'htmega-addons' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                    'condition'=>[
                        'show_datatable_info'=>'yes',
                    ]
                ]
            );
           
            $this->add_control(
                'datatable_sorting_text_color_footer',
                [
                    'label' => esc_html__( 'Text Color', 'htmega-addons' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .htmega-table-style .dataTables_info' => 'color: {{VALUE}};',
                    ],
                    'condition'=>[
                        'show_datatable_info'=>'yes',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'datatable_sorting_typography_footer',
                    'label' => __( 'Typography', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-table-style .dataTables_info',
                    'condition'=>[
                        'show_datatable_info'=>'yes',
                    ]
                ]
            );

            $this->add_control(
                'htmega_table_sorting_pagination_ordering',
                [
                    'label' => esc_html__( 'Pagination Ordering', 'htmega-addons' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                    'condition'=>[
                        'show_datatable_ordering'=>'yes',
                    ]
                ]
            );

            $this->add_control(
                'datatable_sorting_Ordering_color',
                [
                    'label' => esc_html__( 'Sorting Ordering Color', 'htmega-addons' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .htmega-table-style .htb-table thead tr th.sorting::before' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .htmega-table-style .htb-table thead tr th.sorting::after' => 'color: {{VALUE}};',
                    ],
                    'condition'=>[
                        'show_datatable_ordering'=>'yes',
                    ]
                ]
            );

            $this->add_control(
                'datatable_sorting_Ordering_before_color',
                [
                    'label' => esc_html__( 'Sorting Ordering Before Color', 'htmega-addons' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .htmega-table-style .htb-table thead tr th.sorting_asc::before' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .htmega-table-style .htb-table thead tr th.sorting_desc::after' => 'color: {{VALUE}};',
                    ],
                    'condition'=>[
                        'show_datatable_ordering'=>'yes',
                    ]
                ]
            );

            $this->add_control(
                'datatable_sorting_Ordering_after_color',
                [
                    'label' => esc_html__( 'Sorting Ordering After Color', 'htmega-addons' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .htmega-table-style .htb-table thead tr th.sorting_desc::before' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .htmega-table-style .htb-table thead tr th.sorting_asc::after' => 'color: {{VALUE}};',
                    ],
                    'condition'=>[
                        'show_datatable_ordering'=>'yes',
                    ]
                ]
            );

        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();
        $id = $this->get_id();

        $this->add_render_attribute( 'datatable_attr', 'class', 'htmega-table-style htmega-table-style-'.$settings['datatable_style'] );

        if( $settings['show_datatable_sorting'] != 'yes' ){
            $this->add_render_attribute( 'datatable_attr', 'class', 'htb-table-responsive' );
        }

        $table_tr = array();
        $table_td = array();

        foreach( $settings['content_list'] as $content_row ) {

            $row_id = rand(0, 1000);
            if( $content_row['field_type'] == 'row' ) {
                $table_tr[] = [
                    'id' => $row_id,
                    'type' => $content_row['field_type'],
                ];
            }
            if( $content_row['field_type'] == 'col' ) {

                $table_tr_keys = array_keys( $table_tr );
                $last_key = end( $table_tr_keys );

                //Image Control
                if( isset($content_row['cell_image']) ){
                    $table_cell_data = Group_Control_Image_Size::get_attachment_image_html( $content_row, 'large', 'cell_image' );
                
                //Icon Control
                }elseif( isset($content_row['cell_icon']) ){
                    $table_cell_data = '<div class="elementor-repeater-item-'.$content_row['_id'].'">' . HTMega_Icon_manager::render_icon( $content_row['cell_icon'], [ 'aria-hidden' => 'false' ] ) . '</div>';
                
                //Text Control
                }else{
                    $table_cell_data = $content_row['cell_text'];
                }
                
                $table_td[] = [
                    'row_id' => $table_tr[$last_key]['id'],
                    'title' => $table_cell_data,
                    'colspan' => $content_row['row_colspan'],
                    'content_sal_id' => $content_row['_id'],
                ];
            }

        }

        ?>
        <div <?php echo $this->get_render_attribute_string( 'datatable_attr' ); ?>>
            <table class="htb-table <?php if( $settings['show_datatable_sorting'] == 'yes' ){ echo 'htmega-datatable-'.esc_attr( $id ); } ?>">
                <?php if( $settings['header_column_list'] ): ?>
                    <thead>
                        <tr>
                            <?php
                                foreach ( $settings['header_column_list'] as $headeritem ) {
                                    echo "<th class='elementor-repeater-item-". esc_attr( $headeritem['_id'] )."'>".esc_html__( $headeritem['column_name'],'htmega-addons' ).'</th>';
                                }
                            ?>
                        </tr>
                    </thead>
                <?php endif;?>
                <tbody>
                    <?php for( $i = 0; $i < count( $table_tr ); $i++ ) : ?>
                        <tr>
                            <?php
                                for( $j = 0; $j < count( $table_td ); $j++ ):
                                    if( $table_tr[$i]['id'] == $table_td[$j]['row_id'] ):
                                        printf('<td class="elementor-repeater-item-%1$s" %2$s>%3$s</td>',
                                            esc_attr( $table_td[$j]['content_sal_id'] ),
                                            ( $table_td[$j]['colspan'] > 1 ) ? ' colspan="'.esc_attr( $table_td[$j]['colspan']).'"' : '',
                                            $table_td[$j]['title']
                                        );
                                    endif; 
                                endfor; 
                            ?>
                        </tr>
                    <?php endfor;?>
                </tbody>
            </table>
        </div>
        <?php if( $settings['show_datatable_sorting'] == 'yes' ): ?>
            <script>
                jQuery(document).ready(function($) {
                    'use strict';
                    $('.htmega-datatable-<?php echo esc_attr( $id ); ?>').DataTable({
                        paging: <?php echo esc_js(( $settings['show_datatable_paging'] == 'yes' ) ? 'true' : 'false'); ?>,
                        searching: <?php echo esc_js(( $settings['show_datatable_searching'] == 'yes' ) ? 'true' : 'false'); ?>,
                        ordering:  <?php echo esc_js(( $settings['show_datatable_ordering'] == 'yes' ) ? 'true' : 'false'); ?>,
                        "info": <?php echo esc_js(( $settings['show_datatable_info'] == 'yes' ) ? 'true' : 'false'); ?>,
                    });
                 });
            </script>
        <?php endif;
    }
}

