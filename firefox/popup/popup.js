
/*
If the user clicks on an element which has the class "ua-choice":
* fetch the element's textContent: for example, "IE 11"
* pass it into the background page's setUaString() function
*/
browser.tabs.executeScript( {
code: "window.getSelection().toString();"
}, 
function(selection) 
{
	var str = selection[0];
	var res = str.toLowerCase();
	document.getElementById("text").value = res;
});
