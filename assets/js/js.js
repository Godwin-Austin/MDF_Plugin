jQuery(document).ready(function ($) {
  $("#download_pdf").on("click", function (e) {
    e.preventDefault();

    $.ajax({
      url: "admin-ajax.php",
      method: "POST",
      data: {
        action: "generate_pdf",
      },
      success: function (response) {
        if (response.success) {
          window.location.href = response.data;
        } else {
          alert("Error: " + response.data);
        }
      },
      error: function (xhr, status, error) {
        console.log("AJAX error: " + error);
        console.log("Response: ", xhr.responseText);
      },
    });
  });
});
