<?php
    class shop {
        // properties 
        private $name;
        private $itemList;
    
        // function __construct($name,$itemList) {
        //     $this->name = $name;
        //     $this->itemList = $itemList;
        // }

        function __construct($name) {
            $this->name = $name;
            
        }
        
        function getName(){
            return $this->name;
        }

        function addItemList($itemList){
            $this->itemList = $itemList;
        }

        function getItemListEcho(){
            
            foreach ($this-> itemList as $item) {
                echo "$item".", ";
            }
        }

        function getItemList(){
            return $this->itemList;
        }
    
        function boughtItem($itemArr){
            $this->itemList = array_diff($this->itemList, $itemArr);
        }

        function addItem($itemArr){
            $this->itemList = array_merge($this->itemList,$itemArr);
        }
    }

    class buyer {
        public $itemBought;
        private $name;

        function __construct($name) {
            $this->name = $name;
            
        }

        function buyItem($itemArr, $shopName){
            $this->itemBought = $itemArr;
            $shopName ->boughtItem($itemArr);
        }

        function getBoughtItemEcho(){
            echo $this->name.' has bought ';
            foreach ($this-> itemBought as $item) {
                echo "$item".", ";
            }
        }
        
    }




$newShop = new shop("onlineShop");
$newShop -> addItemList(["item1","item2","item3","item4","item5","item6","item7","item8","item9","item10"]);

echo 'The online shop has ';
$newShop->getItemListEcho();



$Kevin = new buyer("Kevin");
$Kevin -> buyItem(["item1","item2","item3"],$newShop);
echo "<br>";
$Kevin -> getBoughtItemEcho();
echo "<br>";
echo "After Kevin has bought the items, the shop now contains ";
$newShop->getItemListEcho();

$Fikri = new buyer("Fikri");
$Fikri -> buyItem(["item4","item5","item6"],$newShop);
echo "<br>";
$Fikri -> getBoughtItemEcho();
echo "<br>";
echo "After Fikri has bought the items, the shop now contains ";
$newShop->getItemListEcho();

// add items
echo "<br>";
echo "<br>";
echo "<br>";    
echo 'Now, the shop add more items to the shop due to low stock level';
$newShop -> addItem(["item11","item12","item13","item14","item15"]);
echo "<br>";
echo 'The online shop has ';
$newShop->getItemListEcho();

// now Arjun can shop also
echo "<br>";
echo "<br>";
echo "<br>";
$Arjun = new buyer("Arjun");
$Arjun -> buyItem(["item11","item13","item15"],$newShop);
echo "<br>";
$Arjun -> getBoughtItemEcho();
echo "<br>";
echo "After Arjun has bought the items, the shop now contains ";
$newShop->getItemListEcho();
 ?>