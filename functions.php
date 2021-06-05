<?php

	function redirect_to($new_location) {
	  header("Location: " . $new_location);
	  exit;
	}

	function mysql_prep($string) {
		global $connection;
		
		$escaped_string = mysqli_real_escape_string($connection, $string);
		return $escaped_string;
	}
	
	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed.");
		}
	}

	function form_errors($errors=array()) {
		$output = "";
		if (!empty($errors)) {
		  $output .= "<div class=\"error\">";
		  $output .= "Please fix the following errors:";
		  $output .= "<ul>";
		  foreach ($errors as $key => $error) {
		    $output .= "<li>";
				$output .= htmlentities($error);
				$output .= "</li>";
		  }
		  $output .= "</ul>";
		  $output .= "</div>";
		}
		return $output;
	}
	

	
	function find_all_users() {
		global $connection;
		
		$query  = "SELECT * ";
		$query .= "FROM users ";
		$query .= "ORDER BY username ASC";
		$user_set = mysqli_query($connection, $query);
		confirm_query($user_set);
		return $user_set;
	}


	function find_all_events() {
		global $connection;
		
		$query  = "SELECT * ";
		$query .= "FROM events ";
		$query .= "ORDER BY tim_stp ASC";
		$event_set = mysqli_query($connection, $query);
		confirm_query($event_set);
		return $event_set;
	}

	function find_all_replies() {
		global $connection;
		
		$query  = "SELECT * ";
		$query .= "FROM replies ";
		$query .= "ORDER BY tim_stp ASC";
		$reply_set = mysqli_query($connection, $query);
		confirm_query($reply_set);
		return $reply_set;
	}
	
	
	
	function find_product_by_id($product_id) {
		global $connection;
		
		$safe_product_id = mysqli_real_escape_string($connection, $product_id);
		
		$query  = "SELECT * ";
		$query .= "FROM products ";
		$query .= "WHERE id = {$safe_product_id} ";
		$query .= "LIMIT 1";
		$product_set = mysqli_query($connection, $query);
		confirm_query($product_set);
		if($product = mysqli_fetch_assoc($product_set)) {
			return $product;
		} else {
			return null;
		}
	}

	function find_user_by_id($user_id) {
		global $connection;
				
		$query  = "SELECT * ";
		$query .= "FROM users ";
		$query .= "WHERE id = {$user_id} ";
		$query .= "LIMIT 1";
		$user_set = mysqli_query($connection, $query);
		confirm_query($user_set);
		if($user = mysqli_fetch_assoc($user_set)) {
			return $user;
		} else {
			return null;
		}
	}
	
	function find_user_by_username($username) {
		global $connection;
		
		$safe_username = mysqli_real_escape_string($connection, $username);
		
		$query  = "SELECT * ";
		$query .= "FROM users ";
		$query .= "WHERE username = '{$safe_username}' ";
		$query .= "LIMIT 1";
		$user_set = mysqli_query($connection, $query);
		confirm_query($user_set);
		if($user = mysqli_fetch_assoc($user_set)) {
			return $user;
		} else {
			return null;
		}
	}

	function find_most_viewed_products()
	{
		global $connection;
		
		$query  = "SELECT * ";
		$query .= "FROM products ";
		$query .= "ORDER BY view_count DESC ";
		$query .= "LIMIT 4";
		$product_set = mysqli_query($connection, $query);
		confirm_query($product_set);
		return $product_set;
	}
	
	function find_products_by_category($category)
	{
		global $connection;
		
		$query  = "SELECT * ";
		$query .= "FROM products ";
		$query .= "WHERE category = '{$category}' ";
		$product_set = mysqli_query($connection, $query);
		confirm_query($product_set);
		return $product_set;
	}	
	
	function find_products_by_category_subcategory($category,$subcategory)
	{
		global $connection;
		
		$query  = "SELECT * ";
		$query .= "FROM products ";
		$query .= "WHERE category = '{$category}' AND sub_category = '{$subcategory}' ";
		$product_set = mysqli_query($connection, $query);
		confirm_query($product_set);
		return $product_set;
	}	
	
	function find_orders_by_user_id($user_id) {
		global $connection;
				
		$query  = "SELECT * ";
		$query .= "FROM orders ";
		$query .= "WHERE user_id = {$user_id} ";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	}	
	
   function update_view_count($selected_product)
   {	
		/* View Count */
	   global $connection;
	   $product=find_product_by_id($selected_product);
	   $view_count=$product["view_count"];
	   $update_view_count=$view_count+1;
	   $query  = "UPDATE products SET ";
		$query .= "view_count = $update_view_count ";
		$query .= "WHERE id = {$selected_product} ";
		$query .="LIMIT 1";
		$result = mysqli_query($connection, $query);
   }
	

	function password_encrypt($password) {
	  $salt = md5('saltforpassword');
	  $hash = md5($salt.$password);
		return $hash;
	}

	
	function password_check($password, $existing_hash) {
 
          $salt = md5('saltforpassword');
	  $hash1 = md5($salt.$password);
	  if ($hash1 === $existing_hash) {
	    return true;
	  } else {
	    return false;
	  }
	}

	function attempt_login($username, $password) {
		$user = find_user_by_username($username);
		if ($user) {
			// found admin, now check password
			if (password_check($password, $user["password"])) {
				// password matches
				return $user;
			} else {
				echo "password does not match";
				return false;
			}
		} else {
			// admin not found
                        echo "user not found";
			return false;
		}
	}

	function logged_in() {
		return isset($_SESSION['user_id']);
	}
	
	function confirm_logged_in() {
		if (!logged_in()) {
			redirect_to("login.php");
		}
	}

?>

