<p><a href="/">Главная</a> / Калькулятор</p>
<div class="header">
  <h1><?=$title?></h1>
</div>
<h3>Вариант 1: </h3>
<form class="calc_1" action="" method="POST">
  <div>
    <label for="num1">Значение 1</label> <br>
    <input type="number" id="num1" name="num1" required value="<?=$num1?>">
  </div>
  <div>
    <label for="oper">Операция</label> <br>
    <select name="oper" id="oper" required>
      <option></option>
      <option value="plus" <?= ($oper == 'plus') ? 'selected':''?> >Сложение</option>
      <option value="minus" <?= ($oper == 'minus') ? 'selected':''?> >Вычитание</option>
      <option value="multiply" <?= ($oper == 'multiply') ? 'selected':''?> >Умножение</option>
      <option value="division" <?= ($oper == 'division') ? 'selected':''?> >Деление</option>
    </select>
  </div>
  <div>
    <label for="num2">Значение 2</label> <br>
    <input type="number" id="num2" name="num2" required value="<?=$num2?>">
  </div>
  <div>
    <button type="submit" name="btn"> = </button>
  </div>
  <div>
    <label for="result">Результат</label> <br>
    <input type="text" id="result" value="<?=$result?>">
  </div>
</form>

<div class="clear_float"></div>

<h3>Вариант 2: </h3>
<form class="calc_2" action="" method="POST">
  <div>
    <label for="num1">Значение 1</label> <br>
    <input type="number" id="num1" name="num1" required value="<?=$num1?>"> <br> <br>
     <label for="num2">Значение 2</label> <br>
    <input type="number" id="num2" name="num2" required value="<?=$num2?>">
  </div>
  <div>
    <label>Операция</label> <br>
    <button class= <?=$oper == 'plus' ? "select" : '' ?> type="submit" name="oper" value="plus">+</button> <br>
    <button class= <?=$oper == 'minus' ? "select" : '' ?> type="submit" name="oper" value="minus">-</button> <br>
    <button class= <?=$oper == 'multiply' ? "select" : '' ?> type="submit" name="oper" value="multiply">*</button> <br>
    <button class= <?=$oper == 'division' ? "select" : '' ?> type="submit" name="oper" value="division">/</button>
  </div>
  <div>
    <label for="result">Результат</label> <br>
    <input type="text" id="result" value="<?=$result?>">
  </div>
</form>