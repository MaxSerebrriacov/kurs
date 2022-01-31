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
	let table = document.getElementById('table');
	table.style.display = "table";
	let input = document.getElementsByTagName('input')[0];
		 
	let res = request('second.php?name='+input.value);
	
	if(res != null && res.length != 0)
	{
		blk.innerHTML = "";
	
		let name = JSON.parse(res); // now you can easily transport complex data structured
		for (let i = 0; i < name.length; i++)
		{
			let tr = document.createElement('tr');
			let td1 = document.createElement('td');
			td1.append(name[i].fio);
			tr.appendChild(td1);			
			blk.appendChild(tr);
		}	
	}
	else
		blk.innerHTML = '<span class="note">Failed!</span>';
}



function main()
{
	var btn = document.getElementById('select');
	btn.addEventListener('click',do_stuff,false);
	document.getElementById('table').style.display = 'none';
}


window.addEventListener('load', main, false);
