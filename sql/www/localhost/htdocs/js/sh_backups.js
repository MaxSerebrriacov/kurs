/*

you have 2 options:
edit php file where you have echo($x)
and echo somthing better you can parse with JS code to make an array
pepople use JSON for this, but a simple array of strings will go as well

OR
process everything in PHP, and give out a full html page (or portion of it, that can be loaded inside one those div tags)
*/

async function request(url)
{
	let r = new XMLHttpRequest();
	r.open('GET', url, false);
	r.send();
	return r.responseText;
}
async function do_stuff()
{
	let blk = document.getElementById('block-ls');
	let res = await request('ls.php');
	// assuming res is a JSON string
	if(res != null)
	{
		let name = JSON.parse(res); // now you can easily transport complex data structured
		let resulting_html = '<form action="/delete_bc.php">';
		for (let i = 0; i < name.length; i++) // php may generate this instead of js
		{
			// make a list with links to files
			resulting_html += '<input type="checkbox" id=' + name[i] + ' name=' + name[i] + '>' + name[i] + ' <a href="backups/'+name[i]+'">D</a><br>';
			// really see lab23 with buttons
			// lets do it in JSON
		}
		resulting_html += "</form>";
		blk.innerHTML = resulting_html; // insert html into div block
		// use padding for better reading1
		// and install nano-syntax for colors :)
	}
	else
		blk.innerHTML = '<span class="note">Faled!</span>'
}

function create_bc()
{
	let blk = document.getElementById('block-log');
	let res = request('create_bc.php');
	if(res != null)
		do_stuff();
	else
		blk.innerHTML = '<span class="note">Faled!</span>'
}
function restore_bc()
{
	console.log('srestore');
}
function get_submit(form)
{
	console.log(form);
}

function main()
{
	var btn = document.getElementById('button-ls');
	btn.addEventListener('click',do_stuff,false);
	var btn2 = document.getElementById('button-bc');
	btn2.addEventListener('click',create_bc,false);
		
}

var timeElem = document.getElementById('time');
var time = 9;
window.addEventListener('load', main, false);
window.addEventListener('load', do_stuff, false);
setInterval(function(){
	if(time > 0){
		time--;
	}
	else{
		time = 9;
		do_stuff();
	}
	console.log(time);
//	timeElem.innerHTML = '<span class="note">'+time+'</span>'
;
}, 1000);
