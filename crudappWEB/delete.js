$(document).ready(function () {
  $('.delete_student').click(function (e) {
    e.preventDefault();
    var studentid = $(this).attr('data-student-id');
    var parent = $(this).parent("td").parent("tr");
    bootbox.dialog({
      message: "Are you sure you want to Delete ?",
      title: "",
      buttons: {
        success: {
          label: "No",
          className: "btn-success",
          callback: function () {
            $('.bootbox').modal('hide');
          }
        },
        danger: {
          label: "Delete!",
          className: "btn-danger",
          callback: function () {
            jQuery.ajax({
              type: 'DELETE',
              url: 'delete.php',
              data: 'id=' + studentid
            })
              .done(function (response) {
                parent.fadeOut('slow');
              })
          }
        }
      }
    });
  });
});