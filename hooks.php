<?php
// Import the WHMCS Database Capsule namespace for database operations
use WHMCS\Database\Capsule;

/**
 * Hook: InvoiceCreation
 *
 * This hook triggers whenever an invoice is created in WHMCS.
 * It checks if the invoice belongs to a client with a custom due date setting
 * and updates the invoice due date accordingly.
 */
add_hook('InvoiceCreation', 1, function ($vars) {
    $invoiceId = $vars['invoiceid'];

    // Retrieve module settings
    $settings = Capsule::table('tbladdonmodules')->where('module', 'customduedate')->pluck('value', 'setting');
    $clientDueDates = $settings['clientDueDates'];

    // Parse the client-specific due dates
    $clientDueDatesArray = [];
    foreach (explode("\n", $clientDueDates) as $line) {
        $line = trim($line);
        if (strpos($line, ':') !== false) {
            list($clientId, $days) = explode(':', $line);
            $clientDueDatesArray[trim($clientId)] = (int)trim($days);
        }
    }

    // Get Invoice Details
    $invoice = localAPI('GetInvoice', ['invoiceid' => $invoiceId]);
    $clientId = $invoice['userid'];
    $invoiceDate = $invoice['date'];

    // Check if the client has a custom due date
    if (isset($clientDueDatesArray[$clientId])) {
        $days = $clientDueDatesArray[$clientId];
        $dueDate = date('Y-m-d', strtotime("$invoiceDate + $days days"));

        // Update Invoice Due Date
        localAPI('UpdateInvoice', [
            'invoiceid' => $invoiceId,
            'duedate' => $dueDate,
        ]);

        // Log the action for debugging purposes
        logActivity("Custom Due Date Hook: Updated invoice $invoiceId for client $clientId with $days-day due date.");
    }
});

