# Custom Due Date Addon for WHMCS

This addon module allows administrators to set custom invoice due dates for specific clients in WHMCS. The module is ideal for scenarios where certain clients have different payment terms than the default system settings, such as 30-day, 60-day, or 90-day due dates.

---

## Features

- Define custom due dates for specific client IDs.
- Automatically update invoice due dates based on client-specific terms when invoices are created.
- Simple configuration through the WHMCS admin interface.
- Fully logged actions for debugging and auditing.

---

## Requirements

- WHMCS 7.x or later.
- Access to the WHMCS root directory.
- Basic knowledge of WHMCS module installation.

---

## Installation

1. **Download or Clone the Repository**:
   Clone this repository or download the ZIP file.

2. **Upload the Module**:
   Upload the `CustomDueDate` directory to the `modules/addons/` directory of your WHMCS installation.

3. **Activate the Addon**:
   - Log in to your WHMCS admin area.
   - Navigate to **Setup > Addon Modules**.
   - Locate **Custom Due Date** and click **Activate**.

4. **Configure the Addon**:
   - Click **Configure** next to the activated addon.
   - Enter the client-specific due date settings in the following format:
     ```
     ClientID:Days
     ```
     Example:
     ```
     1:30
     2:60
     3:90
     ```

---

## Usage

- When an invoice is created, the addon checks if the client ID has a custom due date specified.
- If a match is found, the invoice due date is updated automatically based on the configured days.
- All updates are logged in WHMCS for transparency.

---

## Example Configuration

Here’s how you can configure the addon for various clients:

| Client ID | Due Days |
|-----------|----------|
| 1         | 30       |
| 2         | 60       |
| 3         | 90       |

To configure this, enter the following in the **Client Due Dates** field

