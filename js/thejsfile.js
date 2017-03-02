// Declare variables
var today = new Date();
var tomorrow = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
var anydate = new Date("4/1/12");

// Set values
$("#theDate").val(getFormattedDate(today));
$("#theDate1").val(getFormattedDate(today));
$("#theTomorrow").val(getFormattedDate(tomorrow));
$("#theAnyDate").val(getFormattedDate(anydate));

// Get date formatted as YYYY-MM-DD
function getFormattedDate (date) {
    return date.getFullYear()
        + "-"
        + ("0" + (date.getMonth() + 1)).slice(-2)
        + "-"
        + ("0" + date.getDate()).slice(-2);
}