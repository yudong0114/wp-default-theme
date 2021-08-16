<?php
/**
 * 商品紹介用のウィジェット
 */
class Product_Widget extends WP_Widget {
    /**
     * ウィジェット名などを設定
     */
    function __construct() {
        parent::__construct(
            'product_widget', // ID
            __( '商品紹介' ),  // 表示名
            [ 'description' => __( '商品紹介用ウィジェット' ), ] // 説明
        );
    }

    // ↓↓↓ 次にこちらを修正 ↓↓↓
    /**
     * ウィジェットの内容を出力.
     * 
     * @param array $args ウィジェットの引数.
     * @param array $instance データベースの保存値.
     */
    public function widget( $args, $instance ){
        echo $args['before_widget'];

        if ( !empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        $dest_html = !empty( $instance['setting_html'] ) ? $instance['setting_html'] : '';
        echo $dest_html;

        echo $args['after_widget'];
    }

    /**
     * 管理用のオプションのフォームを出力.
     * 
     * @param array $instance データベースからの前回保存された値.
     */
    public function form( $instance ) {
        $title = !empty( $instance['title'] ) ? $instance['title'] : '';
        $current_html = !empty( $instance['setting_html'] ) ? $instance['setting_html'] : '';
        ?>
        <p>
            <label for="<?= $this->get_field_id( 'title' ); ?>"><?php _e( 'タイトル:' ); ?></label> 
            <input class="widefat" id="<?= $this->get_field_id( 'title' ); ?>" name="<?= $this->get_field_name( 'title' ); ?>" type="text" value="<?= esc_attr( $title ); ?>">
            <label for="<?= $this->get_field_id( 'setting_html' ); ?>"><?php _e( '表示するHTML:' ); ?></label>
            <input id="<?= $this->get_field_id( 'setting_html' ); ?>" name="<?= $this->get_field_name( 'setting_html' ); ?>" type="text" value="<?= esc_attr( $current_html ); ?>">
        </p>
        <?php
    }

    /**
     * ウィジェットオプションの保存処理.
     * 
     * @param array $new_instance 保存用に送信された値.
     * @param array $old_instance データベースからの以前保存された値.
     * 
     * @return array 保存される更新された安全な値.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = !empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['setting_html'] = !empty( $new_instance['setting_html'] ) ? $new_instance['setting_html'] : '';

        return $instance;
    }
}

add_action( 'widgets_init', function() {
    register_widget( 'Product_Widget' );
} );