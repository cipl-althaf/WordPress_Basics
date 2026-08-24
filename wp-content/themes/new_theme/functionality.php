<?php

/*
|--------------------------------------------------------------------------
| 1. Create Contact Messages Table
|--------------------------------------------------------------------------
*/

function create_contact_table()
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'contact_messages';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(150) NOT NULL,
        message TEXT NOT NULL,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';

    dbDelta($sql);
}


/*
|--------------------------------------------------------------------------
| 2. Run Table Creation When Theme Is Activated
|--------------------------------------------------------------------------
*/

// add_action('after_switch_theme', 'create_contact_table');

create_contact_table();
/*
|--------------------------------------------------------------------------
| 3. Handle WPForms Submission
|--------------------------------------------------------------------------
*/

function save_contact_form_data($fields, $entry, $form_data, $entry_id)
{
    /*
     * Only process our Contact Form.
     *
     * WPForms Form ID = 127
     */
    if ($form_data['id'] != 127) {
        return;
    }


    /*
     * Debug submitted fields
     */
    error_log('========== WPForms Submitted ==========');
    error_log(print_r($fields, true));

    error_log('========== Form Data ==========');
    error_log(print_r($form_data, true));


    /*
     * Access WordPress database
     */
    global $wpdb;

    $table_name = $wpdb->prefix . 'contact_messages';


    /*
     * Get field values
     *
     * Name    = Field ID 1
     * Email   = Field ID 2
     * Message = Field ID 5
     */
    $name    = $fields[1]['value'];
    $email   = $fields[2]['value'];
    $message = $fields[5]['value'];


    /*
     * Insert data into database
     */
    $result = $wpdb->insert(
        $table_name,
        array(
            'name'       => $name,
            'email'      => $email,
            'message'    => $message,
            'created_at' => current_time('mysql')
        ),
        array(
            '%s',
            '%s',
            '%s',
            '%s'
        )
    );




    /*
     * Debug database result
     */
    if ($result === false) {

        error_log('========== Contact Form DB ERROR ==========');
        error_log($wpdb->last_error);

    } else {

        error_log('========== Contact Form Saved Successfully ==========');
        error_log('Inserted ID: ' . $wpdb->insert_id);

    }
}


/*
|--------------------------------------------------------------------------
| 4. Connect Function to WPForms
|--------------------------------------------------------------------------
*/

add_action(
    'wpforms_process_complete',
    'save_contact_form_data',
    10,
    4
);

?>