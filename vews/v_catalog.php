<p><a href="/">Главная</a> / Каталог</p>
<div class="header">
  <h1><?=$title?></h1>
</div>
<p>
  В Вашей <a href="./index.php?page=basket">КОРЗИНЕ</a> 
  <?=$quantityGoodsBasket?> товаров на сумму <?=$sumBasket?> рублей
</p>
<div class="catalog">
  <?php foreach ($goods as $product) : ?>
    <figure class="product">
      <a href="./index.php?page=product&id=<?=$product['id']?>">
        <img src="<?=$product['path_small'] ?>">
      </a>
      <figcaption>
        <span><?=$product['name']?></span> <br>
        <span>Цена: <?=$product['price']?> руб.</span> <br>
        <form action="./index.php?page=catalog&id=<?=$product['id']?>" method="POST">
          <button type="submit" name="btn_basket" >В корзину</button>
        </form>
      </figcaption>
    </figure>
  <?php endforeach; ?>
</div>
