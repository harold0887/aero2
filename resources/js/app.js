import './bootstrap';

$(function () {
  showModalLoad();
  confirmDeleteInternal();
  confirmDeletePlantilla();
  confirmDeleteCase();
  confirmDeleteEmail();
  copy();
 

 
  

});

function copy() {
  var clipboard = new ClipboardJS('.btn');

  clipboard.on('success', function (e) {

    alertFloat("right", "¡Copiado al portapapeles!", "check")

    e.clearSelection();
  });
}



function alertFloat(align, message, icon) {
  const type = ["info", "danger", "success", "warning", "primary"];

  const color = Math.floor(Math.random() * 6 + 1);

  $.notify(
    {
      icon: icon,
      message: message,
    },
    {
      type: type[color],
      timer: 3000,
      placement: {
        from: "top",
        align: align,
      },
    }
  );
}




//activar modal al enviar, se cierra al retornar controlador
function showModalLoad() {
  $("#create-post-admin, #forgot-password,#forgot-password-reset").submit(() => {
    $("#modal-spinner").modal("show");
  });
}

function confirmDeleteInternal() {
  $(".show-alert-delete-internal").on("click", function (event) {
    var form = $(this).closest("form");
    var title = form.find("input:text").val();
    event.preventDefault();
    messageDelete(title, form)
  });
}

function confirmDeletePlantilla() {
  $(".show-alert-delete-plantilla").on("click", function (event) {
    var form = $(this).closest("form");
    var title = form.find("input:text").val();
    event.preventDefault();
    messageDelete(title, form)
  });
}

function confirmDeleteCase() {
  $(".show-alert-delete-case").on("click", function (event) {
    var form = $(this).closest("form");
    var title = form.find("input:text").val();
    event.preventDefault();
    messageDelete(title, form)
  });
}

function confirmDeleteEmail() {
  $(".show-alert-delete-email").on("click", function (event) {
    var form = $(this).closest("form");
    var title = form.find("input:text").val();
    event.preventDefault();
    messageDelete(title, form)
  });
}

function messageDelete(title, form) {
  swal({
    title: "¿Realmente quiere eliminar " + title + "  ? ",
    //type: "info",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, eliminar!",
  }).then(function (isConfirm) {
    if (isConfirm) {
      $("#modal-spinner").modal("show");
      form.submit();
    } else {
      console.log("no aceptp");
    }
  });
}




