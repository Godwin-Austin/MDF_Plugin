# Generate PDF using mPDF Plugin for WordPress

## Overview

This plugin allows you to generate PDFs using the mPDF library in WordPress. The generated PDF can contain rich HTML content, including text, images, watermarks, tables, and more. It is ideal for scenarios where you need to create downloadable PDF documents directly from the WordPress admin dashboard.

## Key Features

- **Generate PDFs dynamically** using mPDF.
- **Watermark support** for applying watermarks to the generated PDFs.
- **Custom HTML content** options for adding text, images, links, tables, and more.
- **Circular text and shaded boxes** in PDF for highlighting content.
- **Download PDF** directly from the WordPress admin panel.

## Installation

### Download the Plugin
1. **Clone or Download** the repository from GitHub:
    ```bash
    git clone https://github.com/Godwin-Austin/MDF_Plugin.git
    ```

### Upload the Plugin to WordPress
1. Navigate to your WordPress admin dashboard.
2. Go to **Plugins > Add New** and click on **Upload Plugin**.
3. Choose the downloaded `.zip` file (or cloned folder) and click **Install Now**.
4. After installation, click **Activate** to enable the plugin.

## Plugin Features

1. **Admin Menu for PDF Generation**  
   Once activated, a new menu option "Download PDF" appears in the WordPress admin panel. This menu lets you generate and download a PDF.

2. **Watermark Support**  
   Add a watermark to the PDF using the `SetWatermarkImage` method of the mPDF library. This watermark will appear on the generated PDF.

3. **Circular Text & Shaded Boxes**  
   Use mPDF’s methods to generate circular text and shaded boxes, displaying custom content in unique layouts to highlight key sections.

4. **Custom HTML Content**  
   Add rich HTML content to the PDF, including:
   - Headings, paragraphs, and lists
   - Styled tables
   - Links and embedded media

5. **PDF File Storage & URL**  
   Save the generated PDF on the server, and provide a downloadable URL through the plugin.

## How to Use

1. **Navigate to the Admin Dashboard**  
   Go to **WordPress Admin > Download PDF**.
   
2. **Generate the PDF**  
   Click the **Download PDF** button to create the PDF.
   
3. **Download the PDF**  
   Once generated, a downloadable URL will be available.

### Example PDF Content
The PDF can include various elements, such as:
- Text
- Tables
- Circular Text
- Shaded Boxes
- Images (including watermarks)
- Links

### Customization
Modify the PDF content by editing the HTML code in the `generate_pdf_and_save` function. Adjust the stylesheet to customize layout and styling.

## Plugin Files

- `/assets/css/style.css`: CSS styles for the PDF.
- `/assets/js/js.js`: JavaScript handling frontend PDF generation logic.
- `/vendor/autoload.php`: mPDF library autoloader. Make sure the mPDF library is installed before use.

## Hooks & Actions

- `admin_menu`: Adds the "Download PDF" menu to the WordPress admin panel.
- `admin_enqueue_scripts`: Enqueues necessary JavaScript and CSS files.
- `wp_ajax_generate_pdf`: AJAX action for generating and downloading the PDF.
- `wp_nopriv_ajax_generate_pdf`: AJAX action for generating PDFs for users who are not logged in.

## Requirements

- WordPress 5.0 or higher
- PHP 7.0 or higher
- mPDF library (included via Composer autoload)

## Troubleshooting

- **Error: "PDF Generation Error"**  
  Check error logs if there are errors during PDF generation. The plugin logs errors using `error_log()`.

- **Large File Issues**  
  If the PDF file is large, you may encounter upload limits or timeout issues. To resolve this:
  - Increase PHP upload and execution limits (`upload_max_filesize`, `post_max_size`, `max_execution_time`).
  - Adjust the `http.postBuffer` size in Git for pushing large files.

## Future Enhancements

- Support for advanced content, like charts and graphs.
- Option to customize watermark position and transparency.
- Integration with other WordPress plugins, such as WooCommerce, for invoices or receipts.
- Improved admin dashboard user interface.

## Contributing

To contribute, fork the repository and submit pull requests with improvements or bug fixes.

## License

This plugin is open-source and licensed under the MIT License.

---

**Author**: Godwin-Austin  
**Version**: 1.0  
**Last Updated**: 2024-11-08  
