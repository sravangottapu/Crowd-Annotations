chrome.tabs.executeScript( {
code: "window.getSelection().toString();"
}, 
function(selection) 
{
	var str = selection[0];
	var res = str.toLowerCase();
	document.getElementById("text").value = res;
});
chrome.tabs.getSelected(null, function(tab) {
    document.getElementById("url").value = tab.url;
});

