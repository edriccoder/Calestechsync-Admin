$(document).ready(function() {
  $('#dataTable').DataTable({
      "pageLength": -1, // Show all entries
      "lengthMenu": [[-1], ["All"]], // Removes pagination
      "lengthChange": true, // Enable the option to change length
  });
});