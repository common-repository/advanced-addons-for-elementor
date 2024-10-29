<?php
$settings = $this->get_settings_for_display();
$this->add_render_attribute( 'datatable_attr', 'class', 'aae-table-style');
$id = $this->get_id();
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

        $table_td[] = [
            'row_id' => $table_tr[$last_key]['id'],
            'title' => $content_row['cell_text'],
            'colspan' => $content_row['row_colspan'],
        ];
    }

}
 ?>

    <div class="row">
        <div class="col-sm-12">
            <div <?php echo $this->get_render_attribute_string( 'datatable_attr' ); ?>>
                <table class="advaced_addons_table hoverable bg-white htb-table">
                <thead>
                    <tr>
                    <?php foreach ( $settings['header_column_list'] as $headeritem ) { ?>
                    <th scope="col">
                        <?php echo esc_html__( $headeritem['column_name'],'aa_elementor' );?>
                        </th>
                    <?php } ?>
                    </tr>
                </thead>
                <tbody>
                <?php for( $i = 0; $i < count( $table_tr ); $i++ ) : ?>
                        <tr>
                            <?php
                                for( $j = 0; $j < count( $table_td ); $j++ ):
                                    if( $table_tr[$i]['id'] == $table_td[$j]['row_id'] ):
                            ?>
                            <td scope="row" <?php echo $table_td[$j]['colspan'] > 1 ? ' colspan="'.$table_td[$j]['colspan'].'"' : ''; ?>><?php echo $table_td[$j]['title']; ?></td>
                            <?php endif; endfor; ?>
                        </tr>
                    <?php endfor;?>
                </tbody>
                </table>
            </div>
        </div>
    </div>