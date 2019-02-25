const url = 'server.php';
window.onload = read();

function second_read()
{
  let params = 'command=client';
  ajaxPost(url, params).then(resolve =>
  {
    resolve = JSON.parse(resolve);
    let main = document.getElementById('main');
    main.innerHTML = " ";
    for(let i = 0; i < resolve.length / 4; i++)
    {
      let tr = document.createElement('tr');
      tr.innerHTML = "<th>" + resolve[(i * 4) + 1] + '</th><th>' + resolve[(i * 4) + 2] + '</th><th>' + resolve[(i * 4) + 3] + '</th>';
      main.appendChild(tr); // Присоединяем к нашей второй таблицы наши строки
    }

  }).catch(reject =>
  {
    alert("Ошибка работы сервера");
    console.log(reject);
  });
}

function modal_window()
{
  let num = document.getElementById('num').value;
  let d_dep = document.getElementById('d_dep').value;
  let d_ari = document.getElementById('d_ari').value;
  let time = document.getElementById('time').value;
  let places = document.getElementById('places').value;
  let dep = document.getElementById('dep').value;
  let ari = document.getElementById('ari').value;

  if(!isEmpty(num) && !isEmpty(d_dep) && !isEmpty(d_ari) && !isEmpty(time) && !isEmpty(places) && !isEmpty(dep) && !isEmpty(ari) && !isNaN(num) && !isNaN(places))
  {
    let params = 'command=add&&num='+num+'&&d_dep='+d_dep+'&&d_ari='+d_ari+'&&time='+time+'&&places='+places+'&&dep='+dep+'&&ari='+ari;
    ajaxPost(url, params).then(resolve =>
    {
      alert(resolve);
      read();
    }).catch(reject =>
    {
      alert("Ошибка обновления БД");
      console.log(reject);
    });
  }
  else
  {
    alert('Некорректное заполнение формы');
    return;
  }
}

function read()
{
  let params = 'command=read';
  second_read();
  ajaxPost(url, params).then(resolve =>
  {
    resolve = JSON.parse(resolve);
    let tbody = document.getElementById('tbody');
    tbody.innerHTML = " "; // чистим таблицу, чтобы не накладывались данные друг на друга
    for(let i = 0; i < resolve.length / 8; i++)
    {
      let tr = document.createElement('tr');
      tr.innerHTML = '<th>' + resolve[(i * 8) + 1] + '</th><th>' + resolve[(i * 8) + 2] + '</th><th>' + resolve[(i * 8) + 3] + '</th><th>' + resolve[(i * 8) + 4] + '</th><th>' + resolve[(i * 8) + 5] + '</th><th>' + resolve[(i * 8) + 6] + '</th><th>' +resolve[(i * 8) + 7]+'</th>';
      tr.onclick = () =>
      {
        let answer = confirm("Вы желаете удалить выбранный рейс?");
        if(answer)
        {
          let params = 'command=del&&id=' + resolve[(i * 8)];
          ajaxPost(url, params).then(resolve =>   // then - обещание выполнено catch - обещание не выполнено!!
          {
            alert(resolve);
            read();
          }).catch(reject =>
          {
            alert("Ошибка обновления БД");
            console.log(reject);
          })
        }
        else
        {
          return;
        }
      }
      tbody.appendChild(tr);
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
