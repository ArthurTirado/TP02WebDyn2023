<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
require_once __DIR__."/../src/database.php";
require_once __DIR__."/../src/Cart.php";
require_once __DIR__."/../src/ProductDAO.php";

class CartTest extends TestCase
{
    const RDM_SKU = "123456";
    const BD_SKU = "887414";
    const BD_SKU_PRICE = 19.99;
    const RDM_QTE = 3;

    public function testCanCreateCart(){
        //Arrange
        $expected = array();
        //Act
        $newCart = new Cart();
        //Assert
        $this->assertEquals($expected, $newCart->get_cart_items());
    }

    public function testCanAddItemToCart(){
        //Arrange
        $newCart = new Cart();
        $expected = array(Self::RDM_SKU => Self::RDM_QTE);
        //Act
        $newCart->add_item_to_cart(Self::RDM_SKU, Self::RDM_QTE);

        //Assert
        $this->assertEquals($expected, $newCart->get_cart_items());
    }

    public function testShouldDetectSkuInItems(){
        //Arrange
        $newCart = new Cart();
        $newCart->add_item_to_cart(Self::RDM_SKU, Self::RDM_QTE);
        //Act
        $actual = $newCart->is_item_already_in_cart(Self::RDM_SKU);
        //Assert
        $this->assertTrue($actual);
    }

    public function testCanGiveItemList(){
        //Arrange
        $newCart = new Cart();
        $newCart->add_item_to_cart(Self::RDM_SKU, Self::RDM_QTE);
        $expected = array(Self::RDM_SKU => Self::RDM_QTE);
        //Act
        $actual = $newCart->get_cart_items();
        //Assert
        $this->assertEquals($expected, $actual);
    }
    
    public function testCanGiveTotalPrice(){
        //Arrange
        $db = connect_db();
        $product_dao = new ProductDao($db);
        $newCart = new Cart();
        $newCart->add_item_to_cart(Self::BD_SKU, Self::RDM_QTE);
        $products = $product_dao->get_cart_products_skus($newCart->get_cart_items());
        $actual = Self::BD_SKU_PRICE * Self::RDM_QTE;
        //Act
        $expected = $newCart->get_total_price($products);
        //Assert
        $this->assertEquals($expected, $actual);
    }

    public function testCanRemoveItemFromCart(){
        $newCart = new Cart();
        $newCart->add_item_to_cart(Self::RDM_SKU, Self::RDM_QTE);

    }
}