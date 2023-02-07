<?php
class My_Simple_Search_Widget extends WP_Widget {

function __construct() {
  parent::__construct(
    'my_simple_search_widget', // Base ID
    __( 'My Simple Search Widget', 'envision-next' ), // Name
    array( 'description' => __( 'A simple search widget for WordPress with a search bar that has a left-side search icon and a right-side search title.', 'envision-next' ), ) // Args
  );
}

public function widget( $args, $instance ) {
  echo $args['before_widget'];
  // if ( ! empty( $instance['title'] ) ) {
  //   echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
  // }
  ?>
  <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="search-container">
      <i class="fa fa-search search-icon"></i>
      <input type="text" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'envision-next' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </div>
  </form>
  <style>
    .search-container {
      display: flex;
      align-items: center;
      border-radius: 7px;
    }
    .search-container input[type=text] {
      background: #F5F5F5;
      padding: 12px 42px;
      border-radius: 7px;
    }
    input.search-field:hover {
    box-shadow: 0 0 0 3px rgb(33 185 115 / 16%);
    }
    input.search-field:focus {
      border-color: #68cb98;
      box-shadow: 0 0 0 3px rgb(33 185 115 / 16%);
    }
    .search-icon {
      margin-right: -30px;
      color: #26B98D;
      z-index: 1;
    }
    .search-field {
      border: none;
      background-color: transparent;
      font-size: 14px;
      flex-grow: 1;
    }
  </style>
  <?php
  echo $args['after_widget'];
}

public function form( $instance ) {
  $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Search', 'envision-next' );
  ?>
  <p>
    <!-- <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>  -->
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
  </p>
  <?php 
}

public function update( $new_instance, $old_instance ) {
  $instance = array();   
  $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
  return $instance;
}
}

function my_simple_search_widget_register() {
register_widget( 'My_Simple_Search_Widget' );
}
add_action( 'widgets_init', 'my_simple_search_widget_register' );
