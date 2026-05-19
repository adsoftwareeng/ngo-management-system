function open_panel()
{
slideIt();
var a=document.getElementById("sidebar");
a.setAttribute("id","sidebar1");
a.setAttribute("onclick","close_panel()");
}

function slideIt()
{
	var slidingDiv = document.getElementById("pslider");
	var stopPosition = 0;
	
	if (parseInt(slidingDiv.style.right) < stopPosition )
	{
		slidingDiv.style.right = parseInt(slidingDiv.style.right) + 1 + "px";
		setTimeout(slideIt, 1);	
	}
}
	
function close_panel(){
slideIn();
a=document.getElementById("sidebar1");
a.setAttribute("id","sidebar");
a.setAttribute("onclick","open_panel()");
}

function slideIn()
{
	var slidingDiv = document.getElementById("pslider");
// 	var stopPosition = -340;
    var stopPosition = -285;
	
	if (parseInt(slidingDiv.style.right) > stopPosition )
	{
		slidingDiv.style.right = parseInt(slidingDiv.style.right) - 8 + "px";
		setTimeout(slideIn, 2);	
	}
}


    // Function to disable right click
    // document.addEventListener('contextmenu', function(event) {
    //     event.preventDefault();
    // });
    
    // // Function to disable keyboard input
    // document.addEventListener('keydown', function(event) {
    //     // To disable all keys
    //     event.preventDefault();
    
    //     // Uncomment below lines to selectively disable specific keys
    
    //     let blockedKeys = ['F12', 'Control', 'Shift', 'F5'];
    //     if (blockedKeys.includes(event.key)) {
    //         event.preventDefault();
    //     }
    
    //     // To disable specific key combinations (Ctrl+U, Ctrl+C, Ctrl+V)
    //     if (event.ctrlKey && (event.key === 'u' || event.key === 'c' || event.key === 'v')) {
    //         event.preventDefault();
    //     }
    // });
    
    // // Additional event listener for keypress if needed
    // document.addEventListener('keypress', function(event) {
    //     event.preventDefault();
    // });
   