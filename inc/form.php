<div class="wptp_box">
    <p class="meta-options wptp_field">
        <label for="wptp_start_date"><?php _e( 'Start Date', 'wptp' ); ?></label>
        <input id="wptp_start_date" 
            type="date" 
            name="wptp_start_date" 
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'wptp_start_date', true ) ); ?>"
        >
    </p>
    <p class="meta-options wptp_field">
        <label for="wptp_due_date"><?php _e( 'Due Date', 'wptp' ); ?></label>
        <input id="wptp_due_date" 
            type="date" 
            name="wptp_due_date"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'wptp_due_date', true ) ); ?>"
        >
    </p>

    <?php $wptp_priority = esc_attr( get_post_meta( get_the_ID(), 'wptp_priority', true ) ); ?>
    <p class="meta-options wptp_field">
        <label for="wptp_priority"><?php _e( 'Priority', 'wptp' ); ?></label>
        <select name="wptp_priority" id="wptp_priority">
            <option <?php if ($wptp_priority == 'high' ) echo 'selected' ; ?> value="high"><?php _e( 'High', 'wptp' ); ?></option>
            <option <?php if ($wptp_priority == 'low' ) echo 'selected' ; ?> value="low"><?php _e( 'Low', 'wptp' ); ?></option>
            <option <?php if ($wptp_priority == 'normal' ) echo 'selected' ; ?> value="normal"><?php _e( 'Normal', 'wptp' ); ?></option>
        </select>
    </p>
</div>