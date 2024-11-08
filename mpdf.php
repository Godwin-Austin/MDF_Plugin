<?php
//Plugin Name: GENERATE PDF USING MPDF
//Plugin URI: https://wwww.mpdf.com
//Author Name: DP

if (!defined('ABSPATH')) {
    exit();
}

define('MPDF_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));
define('MPDF_PLUGIN_DIR_URL', plugin_dir_url(__FILE__));

add_action('admin_menu', 'pdf_menu');
add_action('admin_enqueue_scripts', 'enqueue_scripts');

add_action('wp_ajax_generate_pdf', 'generate_pdf_and_save');
add_action('wp_nopriv_ajax_generate_pdf', 'generate_pdf_and_save');

function enqueue_scripts()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script(
        'mpdf-js',
        plugin_dir_url(__FILE__) . 'assets/js/js.js',
        array('jquery'),
        "1.0",
        true
    );
}
function pdf_menu()
{
    add_menu_page(
        'Download PDF',
        'Download PDF',
        'manage_options',
        'download-pdf',
        'download_pdf',
        '',
        28
    );
}


function download_pdf()
{
?>
    <div class="wrap">
        <div class="container">
            <h1>Download PDF</h1>
            <form method="post">
                <input type="button" class="button button-primary" value="Download PDF" id="download_pdf" />
            </form>
        </div>
    </div>
<?php
}


function generate_pdf_and_save()
{
    require_once __DIR__ . '/vendor/autoload.php';

    try {
        $mpdf = new \Mpdf\Mpdf([
            'margin_top' => 20,
            'margin_bottom' => 30,
            'margin_left' => 15,
            'margin_right' => 15,
        ]);


        $mpdf->SetWatermarkImage('https://www.abcb.gov.au/sites/default/files/styles/abcb_content/public/gallery/2022/02/WaterMark%20Logo_Colour%20large-01_0.png?itok=OFEiiMKY');



        $mpdf->showWatermarkImage = true;
        $stylesheet = file_get_contents(plugin_dir_url(__FILE__) . 'assets/css/style.css');

        $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);

        $html = '<h1>Your HTML Content Here</h1>';

        $html_content = '<h1>Hello world!</h1>';
        $html_content .= '<a href="https://www.w3schools.com">Visit W3Schools.com!</a>';
        $html_content .= "
                        <article>
                            <h2>Google Chrome</h2>
                            <p>Google Chrome is a web browser developed by Google, released in 2008. Chrome is the world's most popular web browser today!</p>
                        </article>

                        <article>
                            <h2>Mozilla Firefox</h2>
                            <p>Mozilla Firefox is an open-source web browser developed by Mozilla. Firefox has been the second most popular web browser since January, 2018.</p>
                        </article>

                        <article>
                            <h2>Microsoft Edge</h2>
                            <p>Microsoft Edge is a web browser developed by Microsoft, released in 2015. Microsoft Edge replaced Internet Explorer.</p>
                        </article>
                        
                        <blockquote cite='http://www.worldwildlife.org/who/index.html'>
                            For 50 years, WWF has been protecting the future of nature. The world's leading conservation organization, WWF works in 100 countries and is supported by 1.2 million members in the United States and close to 5 million globally.
                        </blockquote>
                        ";
        $mpdf->WriteHTML($html_content);
        $mpdf->SetFont('Arial', 'B', 20);
        $mpdf->CircularText(100, 80, 50, 'Hello World', 'top');
        $mpdf->SetFont('Arial', 'I', 15);
        $mpdf->CircularText(150, 150, 75, 'Welcome to Circular Text', 'bottom');
        $mpdf->Shaded_box(
            'This is a shaded box!',    // Title/text inside the box
            'Arial',                    // Font family
            'I',                        // Font style (Bold)
            12,                         // Font size (12 points)
            '50%',                      // Width of the box
            'DF',                       // Draw and fill the box
            5,                          // Radius of the rounded corners
            '#e0e0e0',                 // Background color (light gray)
            '#000000',                 // Text color (black)
            4                           // Padding (4 mm)
        );
        $mpdf->Annotation(
            "Text annotation example\nCharacters test:\xd1\x87\xd0\xb5 \xd0\xbf\xd1\x83\xd1\x85\xd1\x8a\xd1\x82",
            175,
            24,
            'Note',
            "Ian Back",
            "My Subject",
            0.7,
            array(255, 123, 122)
        );
        $mpdf->SetColumns(3);
        $mpdf->WriteHTML('<pagebreak orientation="landscape"/> Column 1');
        $mpdf->WriteHTML('
                         <table border="1" cellpadding="5" cellspacing="0" style="width: 100%; border-collapse: collapse; ">
                            <tr>
                                <th>Month</th>
                                <th>Savings</th>
                            </tr>
                            <tr>
                                <td>January</td>
                                <td>$100</td>
                            </tr>
                            <tr>
                                <td>February</td>
                                <td>$80</td>
                            </tr>
                            </table>
                            
                            <div class="level">
                       
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur similique tempore a consequuntur quis labore doloremque? At doloribus blanditiis fugit eum magni assumenda tempore suscipit beatae molestias, porro, eligendi quidem?
                            </div>
                          
                            ');
        $mpdf->Annotation("Text annotation example");
        $mpdf->writeBarcode('9781234567897');
        $mpdf->AddColumn();
        $mpdf->WriteHTML('Column 2');
        $html_content = '
                        <div class="level1 level">
                            <div class="level2 level">
                                <div class="level3 level">
                                    <p>Content inside the innermost div that forces a page break here due to its length
            
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio excepturi odit 
                                    </p>
                                </div>
                                 <p>Content inside the innermost div that forces a page break here due to its length...</p>
                            </div>
                             <p>Content inside the innermost div that forces a page break here due to its length...</p>
                        </div>
                            ';

        $mpdf->WriteHTML($html_content);

        $mpdf->AddColumn();
        $mpdf->WriteHTML('Column 3');

        $mpdf->writeBarcode('9781234567897');

        $file_path = MPDF_PLUGIN_DIR_PATH . 'pdf/hello_world.pdf';

        $mpdf->Output($file_path, 'F');

        $file_url = MPDF_PLUGIN_DIR_URL . 'pdf/hello_world.pdf';

        wp_send_json_success($file_url);
    } catch (Exception $e) {
        error_log('PDF Generation Error: ' . $e->getMessage());
        wp_send_json_error('PDF generation failed: ' . $e->getMessage());
    }
}

?>