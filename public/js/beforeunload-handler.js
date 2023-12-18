window.addEventListener('beforeunload', function (event) {
    // Make an AJAX request to the server to trigger an action
    triggerDatabaseUpdate();
});
  
  function triggerDatabaseUpdate() {
    $.ajax({
        url: "unload",
        method: "POST",
        data: {
            index:"1"
        },
        success: function(response) {
            console.log(response);
            
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error("Error with the request. Status code:", xhr.status);
        }
    });
  }