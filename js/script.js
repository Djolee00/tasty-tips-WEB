// This JS file is primarily for AJAX

// Because my button is not part of any form, I am making AJAX POST request when button is clicked

$(document).ready(function () {
  $(".delete").click(function () {
    var el = this;

    var deleteid = $(this).data("id");

    console.log(deleteid);
    // AJAX Request
    $.ajax({
      url: "./handlers/delete_user.php",
      type: "POST",
      data: { id: deleteid },
      success: function (response) {
        if (response == "Success") {
          alert("Profile has been deleted successfully!");
          location.href = "./login.php";
        } else {
          alert(response);
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert("Status: " + textStatus);
        alert("Error: " + errorThrown);
      },
    });
  });
});
