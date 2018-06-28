<div class="container_card col-md-3 bg-dark ">
                    <?php
                    foreach ($datas as $data):
                        echo (new ReflectionClass($data))->getShortName();
                        echo '<div class="card">'
                        .'<img class="img_card" src="'. $data->getPhoto().'/>"'
                        . '<h3 class="titre_card">' . $data->getNom()
                        . '</h3></div>';
                    endforeach;
                    ?>
                </div>