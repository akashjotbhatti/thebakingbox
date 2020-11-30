<section class="page_title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title_iner">
                    <h2>Cookies</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product_list section_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="product_sidebar">
                    <div class="single_sidebar">
                        <div class="select_option">
                            <h4>Filter by Dietary Restriction</h4>
                            <p><a href="index.php?action=dairyfree">Dairy Free</a></p>
                            <p><a href="index.php?action=glutenfree">Gluten Free</a></p>
                            <p><a href="index.php?action=nutfree">Nut Free</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="product_list">
                    <div class="row">
                    <?php
                    foreach($this->data as $oProduct) {
                    ?>
                        <div class="col-lg-6 col-sm-6">
                            <div class="single_product_item">
                                <img src="<?=$oProduct->image?>" class="img-fluid" alt="The Baking Box's Desserts">
                                <h3><?=$oProduct->name?></h3>
                                <p>$<?=$oProduct->price?></p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>          
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>