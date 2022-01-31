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

	let res = request('fatwo.php');
	
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
			td2.append(name[i].firm);
			tr.appendChild(td2);

			let td3 = document.createElement('td');
			td3.append(name[i].adrec);
			tr.appendChild(td3);

			let td4 = document.createElement('td');
			td4.append(name[i].dolgnost);
			tr.appendChild(td4);

			let td5 = document.createElement('td');
			td5.append(name[i].name);
			tr.appendChild(td5);

			let td6 = document.createElement('td');
			td6.append(name[i].familia);
			tr.appendChild(td6);

			let td7 = document.createElement('td');
			td7.append(name[i].otchestvo);
			tr.appendChild(td7);

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









