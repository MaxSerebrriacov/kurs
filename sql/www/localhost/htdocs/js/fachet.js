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

	let res = request('fachet.php?god='+input.value);
	
	if(res != null && res.length != 0)
	{
		blk.innerHTML = "";
	
		let name = JSON.parse(res);
		for (let i = 0; i < name.length; i++)
		{
			let tr = document.createElement('tr');

			let td1 = document.createElement('td');
			td1.append(name[i].id);
			tr.appendChild(td1);

			let td2 = document.createElement('td');
			td2.append(name[i].name);
			tr.appendChild(td2);

			let td3 = document.createElement('td');
			td3.append(name[i].familia);
			tr.appendChild(td3);

			let td4 = document.createElement('td');
			td4.append(name[i].othestvo);
			tr.appendChild(td4);

			let td5 = document.createElement('td');
			td5.append(name[i].god_r);
			tr.appendChild(td5);

			blk.appendChild(tr);
		}
	}
	else
		blk.innerHTML = '<span class="note">FAILED!</span>';
}

function main()
{
	var btn = document.getElementById('select');
	btn.addEventListener('click',do_stuff,false);
	document.getElementById('table').style.display = 'none';
}

window.addEventListener('load', main, false);









