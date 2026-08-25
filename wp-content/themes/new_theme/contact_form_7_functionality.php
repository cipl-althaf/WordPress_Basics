<?php

/*
|--------------------------------------------------------------------------
| 1. Create Contact Messages Table
|--------------------------------------------------------------------------
*/

function create_contact_table()
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'contact_form_7_table';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        first_name VARCHAR(100) NOT NULL,
        last_name VARCHAR(100) NOT NULL,
        email VARCHAR(150) NOT NULL,
        phone VARCHAR(150) NOT NULL,
        message TEXT NOT NULL,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';

    dbDelta($sql);
}


/*
|--------------------------------------------------------------------------
| 2. Create / Update Table
|--------------------------------------------------------------------------
*/

// For development, run table creation on every request.
// Later we can change this to a better activation-based approach.

create_contact_table();


/*
|--------------------------------------------------------------------------
| 3. Handle Contact Form 7 Submission
|--------------------------------------------------------------------------
*/

function save_contact_form_data_cf7($contact_form)
{
    /*
     * Contact Form 7 Form ID = 163
     */

    if ((int) $contact_form->id() !== 163) {
        return;
    }


    /*
     * Get submitted data
     */

    $submission = WPCF7_Submission::get_instance();

    if (!$submission) {
        error_log('========== CF7 Submission Error ==========');
        error_log('Could not get Contact Form 7 submission instance.');

        return;
    }


    /*
     * Get all submitted form fields
     */

    $posted_data = $submission->get_posted_data();


    /*
     * Debug submitted data
     */

    error_log('========== CF7 Submitted Data ==========');
    error_log(print_r($posted_data, true));


    /*
     * Access WordPress database
     */

    global $wpdb;

    $table_name = $wpdb->prefix . 'contact_form_7_table';


    /*
     * Get Contact Form 7 field values
     */

    $first_name = isset($posted_data['first-name'])
        ? sanitize_text_field($posted_data['first-name'])
        : '';

    $last_name = isset($posted_data['last-name'])
        ? sanitize_text_field($posted_data['last-name'])
        : '';

    $email = isset($posted_data['your-email'])
        ? sanitize_text_field($posted_data['your-email'])
        : '';

    $phone = isset($posted_data['phone-number'])
        ? sanitize_textarea_field($posted_data['phone-number'])
        : '';

    $message = isset($posted_data['your-message'])
        ? sanitize_textarea_field($posted_data['your-message'])
        : '';


    /*
     * Debug individual values
     */

    error_log('========== CF7 Individual Values ==========');
    error_log('First Name: ' . $first_name);
    error_log('Last Name: ' . $last_name);
    error_log('Email: ' . $email);
    error_log('Phone: ' . $phone);
    error_log('Message: ' . $message);


    /*
     * Insert data into database
     */

    $result = $wpdb->insert(
        $table_name,
        array(
            'first_name'       => $first_name,
            'last_name'       => $last_name,
            'email'      => $email,
            'phone'    => $phone,
            'message'    => $message,
            'created_at' => current_time('mysql')
        ),
        array(
            '%s',
            '%s',
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

        error_log('========== CF7 DATABASE ERROR ==========');
        error_log($wpdb->last_error);

    } else {

        error_log('========== CF7 SAVED SUCCESSFULLY ==========');
        error_log('Inserted ID: ' . $wpdb->insert_id);
    }
}


/*
|--------------------------------------------------------------------------
| 4. Connect Function to Contact Form 7
|--------------------------------------------------------------------------
*/

add_action(
    'wpcf7_before_send_mail',
    'save_contact_form_data_cf7',
    10,
    1
);

?>