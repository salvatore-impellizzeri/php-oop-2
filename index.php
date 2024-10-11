<?php

    class Category {
        public $name;
        public $icon;

        function __construct(string $name, string $icon) {
            $this->name = $name;
            $this->icon = $icon;
        }
    }

    class Product {
        public $title;
        public $price;
        public $img;
        protected $category;
        
        function __construct(string $title, float $price, string $img, Category|null $category) {
            $this->title = $title;
            $this->price = $price;
            $this->img = $img;
            $this->setCategory($category);
        }

        public function getCategory() {
            return $this->category;
        }

        public function setCategory(Category|null $category) {
            $this->category = $category;
        }
    }

    class Food extends Product {

        public $ingridients;

        function __construct(string $title, float $price, string $img, Category|null $category, string $ingridients) {
            parent::__construct($title, $price, $img, $category);

            $this->ingridients = $ingridients;
        }

    }

    class Toy extends Product {

        public $materials;

        function __construct(string $title, float $price, string $img, Category|null $category, string $materials) {
            parent::__construct($title, $price, $img, $category);

            $this->materials = $materials;
        }

    }

    class PetBed extends Product {

        public $size;

        function __construct(string $title, float $price, string $img, Category|null $category, string $size) {
            parent::__construct($title, $price, $img, $category);

            $this->size = $size;
        }

    }

    $cani = new Category('Cani', '🐶');
    $gatti = new Category('Gatti', '🐱');

    // GATTI

    $prodottoPerGatti = new Product(
        'Prodotto generico per gatti', 
        17.99, 
        'https://www.robinsonpetshop.it/news/cms2017/wp-content/uploads/2022/07/gatto-vita.jpg',
        $gatti,
    );

    $ciboPerGatti = new Food(
        'Cibo per gatti',
        22.99,
        'https://media.dm-static.com/images/f_auto,q_auto,c_fit,h_1200,w_1200/v1702034691/products/pim/8410650157542-010380/ultima-cibo-secco-per-gatti-con-pollo-per-un-tratto-urinario-sano',
        $gatti,
        'Manzo, piselli, carote, sale, olio, acqua'
    );

    $giocoPerGatti = new Toy(
        'Gioco per gatti',
        2.99,
        '',
        $gatti,
        'Plastica'
    );

    $cucciaPerGatti = new PetBed(
        'Cuccia per gatti',
        9.99,
        '',
        $gatti,
        'Big'
    );

    // CANI

    $prodottoPerCani = new Product(
        'Prodotto generico per cani', 
        17.99, 
        'https://www.b2x.it/rest/images/2023/11/15/1488336.jpg?imageFormat=@1x',
        $cani,
    );

    $ciboPerCani = new Food(
        'Cibo per cani',
        22.99,
        'https://static.ultima-affinity.com/catalog/8410650216416/3d-Pack/mediumImage',
        $cani,
        'Manzo, piselli, carote, sale, olio, acqua'
    );

    $giocoPerCani = new Toy(
        'Gioco per cani',
        2.99,
        'https://m.media-amazon.com/images/I/618NGaspCbL._AC_UF894,1000_QL80_.jpg',
        $cani,
        'Plastica'
    );

    $cucciaPerCani = new PetBed(
        'Cuccia per cani',
        9.99,
        'https://media.zooplus.com/bilder/1/400/74494_pla_cozy_kingdom_bett_fg_1931_1.jpg',
        $cani,
        'Big'
    );

    $products = [
        $prodottoPerGatti,
        $ciboPerGatti,
        $cucciaPerGatti,
        $cucciaPerGatti,
        $prodottoPerCani,
        $ciboPerCani,
        $cucciaPerCani,
        $cucciaPerCani
    ]
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Template PHP</title>

        <link rel="stylesheet" href="./style.css">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        
        <header class="py-4 mb-4">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h1>
                            SHOP
                        </h1>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <div class="container">
                <div class="row">
                    <?php
                        foreach ($products as $product) {
                    ?>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="card">
                                <img src="<?php $product->$img ?>" alt="">
                                <div class="card-body">
                                    <h2>
                                        <?php echo $product->$title; ?>
                                    </h2>
                                    <h6>
                                        <?php echo $product->getCategory()->$name?>
                                        <?php echo $product->getCategory()->$icon?>
                                    </h6>
                                    <hr>
                                    <h5>
                                        €<?php echo number_format($product->$price, 2, ',', '.'); ?>
                                    </h5>
                                    <h3>
                                        Tipo di articolo: <?php echo get_class($product);
                                        
                                        switch ($productClass) {
                                            case 'Prodotto':
                                                echo 'Generico';
                                            break;
                                            case 'Food':
                                                echo 'Cibo';
                                            break;
                                            case 'Toy':
                                                echo 'Giocattoli';
                                            break;
                                            case 'PetBed':
                                                echo 'Cuccia';
                                            break;
                                        }
                                        ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </main>

    </body>
</html>