<?php
// Prevent direct access to the file
if (!defined("WHMCS")) {
    die("This file cannot be accessed directly.");
}

/**
 * Module configuration for the Custom Due Date addon
 *
 * This function defines the metadata and configurable settings
 * for the addon module.
 *
 * @return array Configuration settings for the addon module.
 */
function customduedate_config() {
    return [
        'name' => 'Custom Due Date',
        'description' => 'Customizes the due date for invoices based on client-specific payment terms.',
        'version' => '1.1',
        'author' => 'Star Dot Hosting Inc',
        'fields' => [
            'clientDueDates' => [
                'FriendlyName' => 'Client Due Dates',
                'Type' => 'textarea',
                'Rows' => '10',
                'Cols' => '50',
                'Description' => 'Enter client-specific due dates in the format: <code>ClientID:Days</code>, one per line. Example:<br>1:30<br>2:90<br>3:60',
            ],
        ],
    ];
}

/**
 * Activation function for the addon
 *
 * This function is called when the module is activated in the WHMCS Admin Panel.
 *
 * @return array Status and description of the activation process.
 */
function customduedate_activate() {
    return ['status' => 'success', 'description' => 'Custom Due Date Module Activated'];
}

/**
 * Deactivation function for the addon
 *
 * This function is called when the module is deactivated in the WHMCS Admin Panel.
 *
 * @return array Status and description of the deactivation process.
 */
function customduedate_deactivate() {
    return ['status' => 'success', 'description' => 'Custom Due Date Module Deactivated'];
}

