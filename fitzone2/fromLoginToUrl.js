var form = document.createElement("form");
form.setAttribute("method", "post");
form.setAttribute("action", "login.php");
document.charset = "UTF-8";
var hiddenField = document.createElement("input");
hiddenField.setAttribute("type", "hidden");
hiddenField.setAttribute("name", "url");
var url = window.location.href
hiddenField.setAttribute("value", url);
form.appendChild(hiddenField);
document.body.appendChild(form);
form.submit();
