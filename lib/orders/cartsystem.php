<?php
class cart
{
    /* private $carttotal; */
    public function addProduct($itemid, $qty)
    {
        $_SESSION['cart'][$itemid]['qty'] = $qty;
    }
    public function updateProduct($itemid, $qty)
    {
        $_SESSION['cart'][$itemid]['qty'] = $qty;
        if ($_SESSION['cart'][$itemid]['qty'] == 0) {
            removeProduct($itemid);
        }
    }
    public function removeProduct($itemid)
    {
        if (isset($_SESSION['cart'][$itemid])) {
            unset($_SESSION['cart'][$itemid]);
        }
    }
    public function emptycart()
    {
        unset($_SESSION['cart']);
    }
    public function totalItems()
    {
        if (isset($_SESSION['cart'])) {
            return count($_SESSION['cart']);
        } else {
            return 0;
        }
    }
    /* public function setCartTotal($total)
{
$this->$carttotal = $total;
}
public function getCartTotal()
{
return $carttotal;
} */
}
