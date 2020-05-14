function getting() {
  $(document).ready(function () {
    $("#appstatus").load("load_appointment.php");
  });
}

function clock() {
  var status = document.getElementById("status");
  var h = new Date().getHours();
  var day = new Date().getDay();
  if (0 < day && day < 6) {
    if (3 <= h && h <= 17) {
      setInterval(getting(), 1000);
      status.innerHTML = "Next Appointment Number";
    } else {
      status.innerHTML = "Clinic is clos";
    }
  } else {
    status.innerHTML = "Clinic is cose";
  }
}

var interval = setInterval(clock, 1000);
