<?php
if(!empty($_GET["action"])) 
{
$productId = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
$quantity = isset($_POST['quantity']) ? htmlspecialchars($_POST['quantity']) : '';
$color = isset($_POST['color']) ? htmlspecialchars($_POST['color']) : '';
$brand = isset($_POST['brand']) ? htmlspecialchars($_POST['brand']) : '';

switch($_GET["action"])
 {
	case "add":
		if(!empty($quantity)) {
								$stmt = $db->prepare("SELECT * FROM products where d_id= ?");
								$stmt->bind_param('i',$productId);
								$stmt->execute();
								$productDetails = $stmt->get_result()->fetch_object();
                                $itemArray = array($productDetails->d_id=>array('title'=>$productDetails->title, 'd_id'=>$productDetails->d_id, 'quantity'=>$quantity, 'price'=>$productDetails->price, "color"=>$color, "brand"=>$brand));
					if(!empty($_SESSION["cart_item"])) 
					{
						if(in_array($productDetails->d_id,array_keys($_SESSION["cart_item"]))) 
						{
							foreach($_SESSION["cart_item"] as $k => $v) 
							{
								if($productDetails->d_id == $k) 
								{
									if(empty($_SESSION["cart_item"][$k]["quantity"])) 
									{
									$_SESSION["cart_item"][$k]["quantity"] = 0;
									}
									$_SESSION["cart_item"][$k]["quantity"] += $quantity;
								}
							}
						}
						else 
						{
								$_SESSION["cart_item"] = $_SESSION["cart_item"] + $itemArray;
						}
					} 
					else 
					{
						$_SESSION["cart_item"] = $itemArray;
					}
			}
			break;
			
	case "remove":
		if(!empty($_SESSION["cart_item"]))
			{
				foreach($_SESSION["cart_item"] as $k => $v) 
				{
					if($productId == $v['d_id'])
						unset($_SESSION["cart_item"][$k]);
				}
			}
			break;
			
	case "empty":
			unset($_SESSION["cart_item"]);
			break;
			
	case "check":
			header("location:checkout.php");
			break;
	}
}