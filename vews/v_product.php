<p><a href="/">Главная</a> / <a href="./index.php?page=catalog">Каталог</a> / Товар</p>
<div class="content_product">
  <div class="header">
    <h1><?=$product['name']?></h1>
  </div>
  <p>
    В Вашей <a href="./index.php?page=basket">КОРЗИНЕ</a> 
    <?=$quantityGoodsBasket?> товаров на сумму <?=$sumBasket?> рублей
  </p>
  <figure class="product">
      <img src="<?=$product['path_big'] ?>">
    <figcaption>
      <span><b>Цена: <?=$product['price']?> руб.</b></span> <br>
      <form action="./index.php?page=product&id=<?=$product['id']?>" method="POST">
          <button type="submit" name="btn_basket" >В корзину</button>
        </form>
    </figcaption>
  </figure>
  <div class="about_product">
    <h2>Описание товара</h2>
    <hr>
    <ul>
      <li>Характеристика 1</li>
      <li>Характеристика 2</li>
      <li>Характеристика 3</li>
      <li>Характеристика 4</li>
      <li>Характеристика 5</li>
    </ul>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum asperiores accusamus ipsa alias quibusdam facilis omnis ut ducimus cumque aliquid voluptatem nobis libero sunt quas, amet! Tempore earum autem aut.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, ut! Ipsum culpa amet, numquam eveniet eos perferendis porro qui ex placeat, officia. Fugit facilis asperiores, maiores iusto odio dolore obcaecati.</p>
    <p>Esse expedita quo eligendi voluptate iste accusantium magnam itaque nesciunt impedit quas tempore ullam, quam placeat, modi, delectus eaque porro similique repellendus sint ipsam tempora alias molestiae inventore dolore nam!</p>
    <p>Placeat adipisci beatae magnam delectus iure pariatur ratione officiis dignissimos ea mollitia repellendus vel cupiditate quod distinctio animi minus dolore unde voluptatum ipsa enim similique illum molestiae, accusantium consectetur. Ducimus.</p>
    <p>Voluptatibus deleniti accusantium inventore fuga soluta totam, similique hic atque. Debitis illo neque quasi inventore hic, quia ducimus, eveniet accusamus et quas error sunt iure, soluta esse. Quisquam, quam, voluptate.</p>
    <p>Velit praesentium obcaecati dolore reiciendis debitis dignissimos repudiandae odit optio, quia, ad necessitatibus eum laborum. Libero ab molestiae adipisci, saepe nihil. Minima fugit consequatur, temporibus quas cum qui itaque ut?</p>
  </div>
</div>