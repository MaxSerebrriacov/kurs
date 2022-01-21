function request(url)
{
	let r = new XMLHttpRequest();
	r.open('GET', url, false);
	r.send();
	return r.responseText;
}
function do_stuff()
{
	let blk = document.getElementById('fio');
	let res = request('dt.php');
	
	if(res != null)
	{
	
		let name = JSON.parse(res); // now you can easily transport complex data structured
		for (let i = 0; i < name.length; i++){

			resulting_html += '<span class='+name[i]+'>'+name[i]+'</span>';
		}
		
		blk.innerHTML = resulting_html; // insert html into div block
	
	}
	else
		blk.innerHTML = '<span class="note">Faled!</span>';
}



function main()
{
	var btn = document.getElementById('select');
	btn.addEventListener('click',do_stuff,false);
}


window.addEventListener('load', main, false);


