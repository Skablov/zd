const url = 'server.php';
window.onload = read();

function modal_window()
{
  let name = document.getElementById('name').value; // получаем данные из наших полей ввода
  let born = document.getElementById('born').value;
  let opt = document.getElementById('option').value;
  if(!isEmpty(name) && !isEmpty(born))
  {
    let params = 'command=pas&&name='+name+'&&born='+born+'&&opt='+opt;
    ajaxPost(url, params).then(resolve =>
    {
      alert(resolve); // resolve - хранит ответ от сервера
      read();
    }).catch(reject =>
    {
      alert("Ошибка покупки билета");
      console.log(reject);
    });
  }
  else
  {
    alert("Вы не заполнили все поля!!");
    return;
  }
}


function read()
{
  let params = 'command=read';
  ajaxPost(url, params).then(resolve =>
  {
    resolve = JSON.parse(resolve);
    let tbody = document.getElementById('tbody');
    tbody.innerHTML = " ";
    let select = document.getElementById('option');
    select.innerHTML = " ";
    for(let i = 0; i < resolve.length / 8; i++)
    {
      let tr = document.createElement('tr');
      tr.innerHTML = '<th>' + resolve[(i * 8) + 1] + '</th><th>' + resolve[(i * 8) + 2] + '</th><th>' + resolve[(i * 8) + 3] + '</th><th>' + resolve[(i * 8) + 4] + '</th><th>' + resolve[(i * 8) + 5] + '</th><th>' + resolve[(i * 8) + 6] + '</th><th>' +resolve[(i * 8) + 7]+'</th>';
      let opt = document.createElement('option');
      opt.innerHTML = resolve[(i * 8) + 1];
      tbody.appendChild(tr);
      select.appendChild(opt);
    }
  }).catch(reject =>
  {
    alert("Ошибка работы сервера");
    console.log(reject);
  })
}


function ajaxPost(url, params)
{
	return new Promise(function(resolve, reject)
	{
		var request = new XMLHttpRequest;
		request.open('POST',url,true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=utf-8')
		request.addEventListener("load", function()
		{
			if(request.status < 400)
			{
				resolve(request.responseText);
			}
			else
			{
				reject(Error("Ошибка получения данных"));
			}
		});
		request.send(params);
	});
}

function isEmpty(str) // проверка на пустоту
{
  if (str.trim() == '')
    return true;
  return false;
}
