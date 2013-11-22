<?php

class MainMenu extends CWidget
    {
        public function run()
        {
           $items = Menu::model()->cache(1000)->findByPK(1)->getCMenuArray();
           $this->render('mainMenu', array('items' => $items));
        }

    }
?>