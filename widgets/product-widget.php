<?php
/**
 * 商品紹介用のウィジェット
 */
class Product_Widget extends WP_Widget {

    /**
     * ウィジェットを登録
     */
    function __construct() {
        parent::__construct(
            'product_widget', // ID
            '商品紹介', // 表示名
            [ 'description' => '商品紹介用ウィジェット', ] // 説明
        );
    }

    /**
     * ウィジェットの内容を出力.
     * 
     * @param array $args ウィジェットの引数.
     * @param array $instance データベースの保存値.
     */
    public function widget( $args, $instance ){
        // タイトルの出力
        if ( !empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        // 詳細の出力
        if ( !empty( $instance['description'] ) ) {
            echo '<p>'.$instance['description'].'</p>';
        }
    }

    /**
     * 商品登録ウィジェットで必要なフォーム
     * 
     * @param array $instance データベースからの前回保存された値.
     */
    public function form( $instance ) {
        // 先にデータが登録されているか
        $title = !empty( $instance['title'] ) ? esc_attr($instance['title']) : '';
        $description = !empty( $instance['description'] ) ? esc_attr($instance['description']) : '';
        // フィールドIDの取得
        $title_id = $this->get_field_id( 'title' );
        $title_name = $this->get_field_name( 'title' );
        // フィールドnameの取得
        $description_id = $this->get_field_id( 'description' );
        $description_name = $this->get_field_name( 'description' );

        // フォームの出力
        echo <<<___HTML___
        <p>
            <label for="{$title_id}">タイトル:</label> 
            <input class="widefat" id="{$title_id}" name="{$title_name}" type="text" value="{$title}">
        </p>
        <p>
            <label for="{$description_id}">商品説明:</label> 
            <input class="widefat" id="{$description_id}" name="{$description_name}" type="text" value="{$description}">
        </p>
___HTML___;
    }

    /**
     * 商品登録ウィジェットオプションの保存処理
     * 
     * @param array $new_instance 保存用に送信された値.
     * @param array $old_instance データベースからの以前保存された値.
     * 
     * @return array 保存される更新された安全な値.
     */
    public function update( $new_instance, $old_instance ) {
        // インスタンス変数の初期化
        $instance = [];
        // タイトルの格納
        $instance['title'] = !empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
        // 詳細の格納
        $instance['description'] = !empty( $new_instance['description'] ) ? strip_tags( $new_instance['description'] ) : '';        
        // 連想配列を返す
        return $instance;
    }
}

add_action( 'widgets_init', function() {
    register_widget( 'Product_Widget' );
});