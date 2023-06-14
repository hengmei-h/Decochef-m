CREATE VIEW products_view AS SELECT p.*,b.brand, c.category, cr.color FROM products p JOIN brand b ON p.brand_sid=b.sid JOIN category c ON p.category_sid=c.sid JOIN color cr ON p.color_sid=cr.sid


            <?php foreach ($products as $r) :
                $img = explode(',',$r['pictures'])[0]
                ?>
             
             <div class="products-list-item">
                    <div class="img_cover">
                        <img src="imgs/products-imgs/<?= $img?>" alt="">
                    </div>
                        <div class="save-btn"><i class="fa-regular fa-heart"></i></div>
                    <h6><?= $r['brand']?><?= $r['pdName']?><?= $r['color']?></h6>
                    <p><?= $r['price']?></p>
                </div>
             <?php endforeach ?>






             <?php foreach ($products as $r) :
                $img = explode(',',$r['pictures'])[0]
                ?>
                        <div class="item">
                            <div class="remove"><i class="fa-solid fa-xmark"></i></div>
                            <div class="img-wrap">
                               <img src="imgs/products-imgs/<?= $img?>" alt="">
                            </div>
                            <div class="item-function">
                                <div class="row spc-between">
                                    <div class="item-info">
                                        <p class="pm"><?= $r['brand']?><?= $r['pdName']?><?= $r['color']?></p>
                                        <p class="ps"><?= $r['price']?></p>
                                    </div>
                                    <div class="cart">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php endforeach ?>  