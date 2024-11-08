Generate PDF using mPDF Plugin for WordPress
Overview
This plugin allows you to generate PDFs using the mPDF library in WordPress. The generated PDF can contain rich HTML content, including text, images, watermarks, tables, and more. It is ideal for scenarios where you need to create downloadable PDF documents directly from the WordPress admin dashboard.

Key Features:

Generate PDFs dynamically using mPDF.
Apply watermarks to the generated PDFs.
Add custom HTML content to the PDF (text, images, links, tables, etc.).
Add circular text and shaded boxes in the PDF.
Download PDF from the WordPress admin panel.
Installation
Download the Plugin:

Clone or download the repository from GitHub.
bash
Copy code
git clone https://github.com/Godwin-Austin/MDF_Plugin.git
Upload the Plugin to WordPress:

Navigate to your WordPress admin dashboard.
Go to Plugins > Add New and click on Upload Plugin.
Choose the downloaded .zip file (or cloned folder) and click Install Now.
After installation, click Activate to enable the plugin.
Plugin Features
1. Admin Menu for PDF Generation
Once the plugin is activated, you will see a new menu option in the WordPress admin panel called "Download PDF". This menu will allow you to generate and download a PDF.

2. Watermark Support
The plugin allows you to add a watermark to the generated PDF using the SetWatermarkImage method of the mPDF library. This watermark will be visible on the generated PDF file.

3. Circular Text & Shaded Box
The plugin can generate circular text and shaded boxes using mPDF's built-in methods. The circular text will display custom content in a circular path, and shaded boxes can be used to highlight important sections of the content.

4. HTML Content
You can add custom HTML content to the generated PDF, such as:

Headings, paragraphs, and lists.
Tables with custom styles.
Links and embedded media.
5. PDF File Storage & URL
The generated PDF will be saved on the server and can be downloaded via a URL provided by the plugin.

How to Use
Admin Dashboard
Navigate to the "Download PDF" menu: Go to WordPress Admin > Download PDF.
Generate the PDF: Click the Download PDF button, which will trigger the PDF generation.
Download the PDF: After the PDF is generated, you will be provided with a downloadable URL.
Example PDF Content
The PDF can include various elements like:

Text
Tables
Circular Text
Shaded boxes
Images (including watermarks)
Links
Customization
You can modify the content of the generated PDF by editing the HTML code in the generate_pdf_and_save function. You can also modify the stylesheet to customize the layout and styling of the PDF.

Plugin Files
/assets/css/style.css: This file contains the CSS styles that are applied to the PDF.
/assets/js/js.js: JavaScript file that handles the frontend PDF generation logic.
/vendor/autoload.php: The mPDF library autoloader. Ensure you have installed the mPDF library before using the plugin.
Hooks & Actions
admin_menu: Adds the Download PDF menu to the WordPress admin panel.
admin_enqueue_scripts: Enqueues the necessary JavaScript and CSS files.
wp_ajax_generate_pdf: AJAX action for generating and downloading the PDF.
wp_nopriv_ajax_generate_pdf: AJAX action for generating the PDF for users who are not logged in.
Requirements
WordPress 5.0 or higher.
PHP 7.0 or higher.
mPDF library (included via Composer autoload).
Troubleshooting
Error: "PDF Generation Error"
If you encounter errors during PDF generation, check the error logs for more details. The plugin will log errors using error_log().

Large File Issues
If the generated PDF file is too large, you may encounter upload limits or timeout issues. In such cases, you can:

Increase the PHP upload and execution limits (upload_max_filesize, post_max_size, max_execution_time).
Adjust the http.postBuffer size in Git to push large files.
Future Enhancements
Support for more advanced content like charts and graphs.
Option to customize watermark position and transparency.
Integration with other WordPress plugins like WooCommerce for generating invoices or receipts.
Improve the user interface for a better experience in the admin dashboard.
Contributing
If you would like to contribute to the plugin, feel free to fork the repository and submit pull requests with your improvements or bug fixes.

License
This plugin is open source and is licensed under the MIT License.

Author: Godwin-Austin
Version: 1.0
Last Updated: 2024-11-08

Feel free to update any sections that need additional details, like version updates or any specific configuration requirements.
