
<html>
<head>
  <meta charset="utf-8">
  <title>Главная страница</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Покупка жд билетов</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="/index.php">Главная</a>
  </nav>
  <a class="btn btn-outline-primary" href="/sign_up.php">Sign up</a>
</div>
  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-12">
        <h1>Рейсы</h1>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th>№ поезда</th>
              <th>Дата отправления</th>
              <th>Дата прибытия</th>
              <th>Кол-во мест</th>
              <th>Время отправления</th>
              <th>Место отправления</th>
              <th>Место прибытия</th>
            </tr>
          </thead>
          <tbody id="tbody">
          </tbody>
        </table>
      </div>
    </div>
    <p id="btn">
      <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
        Купить билет
      </button>
    </p>
<div id="myModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Покупка билета</h4>
            </div>
            <div class="modal-body">
                <form>
                  <div class="form-group" style="text-align:left">
                    <label >ФИО</label>
                    <input type="text" id="name" placeholder="Иван Иванов Иванович" class="form-control">
                    <label>Дата рождения</label>
                    <input type="date" id="born" class="form-control">
                    <label>№ поезда</label><br>
                      <select class="form-control" id="option">
                      </select>
                  </div>
                </form>
            </div>
            <div class="modal-footer">
              <button class="btn btn-success" onclick='modal_window()'>Купить</button>
              <button class="btn btn-default" type="button" data-dismiss="modal">Закрыть</button></div>
        </div>
      </div>
      <script src="index.js">

      </script>
      </html>
