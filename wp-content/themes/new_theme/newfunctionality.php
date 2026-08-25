<?php

/*
|--------------------------------------------------------------------------
| 1. Create Contact Messages Table
|--------------------------------------------------------------------------
*/

function create_contact_table()
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'contact_form_7_messages';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(150) NOT NULL,
        subject VARCHAR(255) NOT NULL,
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
     * Contact Form 7 Form ID = 151
     */

    if ((int) $contact_form->id() !== 151) {
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

    $table_name = $wpdb->prefix . 'contact_form_7_messages';


    /*
     * Get Contact Form 7 field values
     */

    $name = isset($posted_data['text-555_user_name'])
        ? sanitize_text_field($posted_data['text-555_user_name'])
        : '';

    $email = isset($posted_data['email-217_user_email'])
        ? sanitize_email($posted_data['email-217_user_email'])
        : '';

    $subject = isset($posted_data['text-937_subject'])
        ? sanitize_text_field($posted_data['text-937_subject'])
        : '';

    $message = isset($posted_data['textarea-78_message'])
        ? sanitize_textarea_field($posted_data['textarea-78_message'])
        : '';


    /*
     * Debug individual values
     */

    error_log('========== CF7 Individual Values ==========');
    error_log('Name: ' . $name);
    error_log('Email: ' . $email);
    error_log('Subject: ' . $subject);
    error_log('Message: ' . $message);


    /*
     * Insert data into database
     */

    $result = $wpdb->insert(
        $table_name,
        array(
            'name'       => $name,
            'email'      => $email,
            'subject'    => $subject,
            'message'    => $message,
            'created_at' => current_time('mysql')
        ),
        array(
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